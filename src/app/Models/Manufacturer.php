<?php

//namespace Models;

class Manufacturer extends Model
{
    public array $fields = [
        'full_name',
        'short_name',
    ];

    public function getTable(): string
    {
        return 'manufacturers';
    }

    public function create(array $data): bool
    {
        $keys = array_keys($data);
        if (array_diff($keys, $this->fields)) {
            throw new Exception('Required fields missing');
        }

        $sql = $this->queryBuilder->insert($this->getTable(), $data)->getSql();
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute($this->queryBuilder->getValues());
        return $result;
    }
}