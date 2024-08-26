<?php

interface SQLQueryBuilder
{
    public function select(string $table, array $fields): SQLQueryBuilder;

    public function insert(string $table, array $data): SQLQueryBuilder;

    public function where(string $field, string|float|int|null $value, string $operator = '='): SQLQueryBuilder;

    public function update(string $table, array $data): SQLQueryBuilder;

    public function limit(int $start, int $offset): SQLQueryBuilder;

    public function getSql(): string;

    public function getValues(): array;

}