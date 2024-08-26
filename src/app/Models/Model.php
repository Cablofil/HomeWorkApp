<?php

abstract class Model
{
    protected PDO $db;
    protected SQLQueryBuilder $queryBuilder;

    public function __construct(PDO $db, SQLQueryBuilder $queryBuilder)
    {
        $this->db = $db;
        $this->queryBuilder = $queryBuilder;
    }

    abstract protected function getTable(): string;

    abstract protected function create(array $dat): bool;

    public function find(int $id): ?object
    {
        $sql = $this->queryBuilder
            ->select($this->getTable(), ['*'])
            ->where('id', $id)
            ->limit(1)
            ->getSql();
        $stmt = $this->db->prepare($sql);
        $stmt->execute($this->queryBuilder->getValues());
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result ?: null;
    }
}