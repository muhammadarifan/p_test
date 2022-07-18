<?php

namespace App\Repositories\Impl;

use App\Models\TransactionCategory;
use App\Repositories\TransactionCategoryRepository;

class TransactionCategoryRepositoryImpl implements TransactionCategoryRepository {
    public function getAll() {
        return TransactionCategory::all();
    }

    public function getById($id) {
        return TransactionCategory::find($id);
    }

    public function getByTransactionType($transactionType)
    {
        return TransactionCategory::where('transaction_type', $transactionType)->get();
    }

    public function create(array $data) {
        $transactionCategory = TransactionCategory::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        return $transactionCategory;
    }

    public function update($id, array $data) {
        $transactionCategory = TransactionCategory::find($id);
        $transactionCategory->update($data);
        return $transactionCategory;
    }

    public function delete($id) {
        $transactionCategory = TransactionCategory::find($id);
        $transactionCategory->delete();
        return $transactionCategory;
    }
}


