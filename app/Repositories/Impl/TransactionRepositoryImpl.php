<?php

namespace App\Repositories\Impl;

use App\Models\Transaction;
use App\Repositories\TransactionRepository;

class TransactionRepositoryImpl implements TransactionRepository {

        public function getAll() {
            return Transaction::with('transactionCategory')->get();
        }

        public function getById($id) {
            return Transaction::find($id);
        }

        public function getByTransactionType($transactionType) {
            return Transaction::with('transactionCategory')->where('type', $transactionType)->get();
        }

        public function getByTransactionTypeThisYear($transactionType, $year) {
            return Transaction::with('transactionCategory')->where('type', $transactionType)->whereYear('date', $year)->get();
        }

        public function getByConfirmedTransactionType($transactionType) {
            return Transaction::with('transactionCategory')->where('type', $transactionType)->where('confirmed', true)->get();
        }

        public function getByUnconfirmedTransactionType($transactionType) {
            return Transaction::with('transactionCategory')->where('type', $transactionType)->where('confirmed', false)->get();
        }

        public function getByConfirmedTransactionTypeThisYear($transactionType, $year) {
            return Transaction::with('transactionCategory')->where('type', $transactionType)->where('confirmed', true)->whereYear('date', $year)->get();
        }

        public function getByConfirmedTrancationCategoryThisYear($transactionCategoryId, $year) {
            return Transaction::with('transactionCategory')->where('transaction_category_id', $transactionCategoryId)->where('confirmed', true)->whereYear('date', $year)->get();
        }

        public function create(array $data) {
            return Transaction::create($data);
        }

        public function update($id, array $data) {
            $transaction = Transaction::find($id);
            $transaction->update($data);
            return $transaction;
        }

        public function delete($id) {
            $transaction = Transaction::find($id);
            $transaction->delete();
            return $transaction;
        }


        public function confirm($id) {
            $transaction = Transaction::find($id);
            $transaction->confirmed = true;
            $transaction->save();
            return $transaction;
        }

}


