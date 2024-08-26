<?php

class MySqlQueryBuilder implements SQLQueryBuilder
{
    private stdClass $query;

    private function reset(): void
    {
        $this->query = new stdClass();
    }

    public function select(string $table, array $fields): SQLQueryBuilder
    {
        $this->reset();
        $fields = implode(',', $fields);
//        $this->query->type = new QueryType::SELECT;                   // TODO: add ENUM query type
        $this->query->type = 'select';
        $this->query->base = "SELECT $fields FROM $table";

        return $this;
    }

    public function insert(string $table, array $data): SQLQueryBuilder
    {
        $this->reset();
        $keys = array_keys($data);
//        $this->query->type = QueryType::INSERT;                       // TODO: add ENUM query type
        $this->query->type = 'insert';
        $this->query->base = "INSERT INTO $table (" . implode(',', $keys) . ") VALUES (:" . implode(', :', $keys) . ")";
        $this->query->values = $data;

        return $this;
    }

    public function where(string $field, float|int|string|null $value, string $operator = '='): SQLQueryBuilder
    {
        if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
            throw new Exception('WHERE can only be added to SELECT, UPDATE, DELETE');
        }

        $this->query->where[] = " $field $operator :$field"; // id = :id
        $this->query->values[$field] = $value;

        return $this;
    }

    public function limit(int $start, ?int $offset = null): SQLQueryBuilder
    {
        if ($this->query->type !== 'select') {
            throw new Exception('LIMIT can only be added to SELECT');
        }

        $limit = " LIMIT $start";
        if (isset($offset)) {
            $limit .= ", $offset";
        }
        $this->query->limit = $limit;

        return $this;
    }

    public function getSql(): string
    {
        $sql = $this->query->base;

        if (!empty($this->query->where)) {
            $sql .= " WHERE " . implode(' AND ', $this->query->where);
        }

        if (isset($query->limit)) {
            $sql .= " LIMIT " . $query->limit;
        }
        $sql .= ";";

        return $sql;
    }

    public function getValues(): array
    {
        return $this->query->values ?? [];
    }

    public function update(string $table, array $data): SQLQueryBuilder
    {
        // TODO: Implement update() method.
    }


}