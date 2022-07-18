<?php

namespace App\Repositories;

interface TransactionCategoryRepository
{
    public function getAll();
    public function getById($id);
    public function getByTransactionType($transactionType);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
