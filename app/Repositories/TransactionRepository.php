<?php

namespace App\Repositories;

interface TransactionRepository
{
    public function getAll();
    public function getById($id);
    public function getByTransactionType($transactionType);
    public function getByTransactionTypeThisYear($transactionType, $year);
    public function getByConfirmedTransactionType($transactionType);
    public function getByUnconfirmedTransactionType($transactionType);
    public function getByConfirmedTransactionTypeThisYear($transactionType, $year);
    public function getByConfirmedTrancationCategoryThisYear($transactionCategoryId, $year);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function confirm($id);
}
