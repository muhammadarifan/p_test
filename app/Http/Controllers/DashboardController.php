<?php

namespace App\Http\Controllers;

use App\Repositories\TransactionCategoryRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function index()
    {
        $transactionIns = $this->transactionRepository->getByConfirmedTransactionType('in');
        $transactionOuts = $this->transactionRepository->getByConfirmedTransactionType('out');

        $transactionUnconfirmedIns = $this->transactionRepository->getByUnconfirmedTransactionType('in');
        $transactionUnconfirmedOuts = $this->transactionRepository->getByUnconfirmedTransactionType('out');

        $transactionIns = $this->transactionRepository->getByConfirmedTransactionType('in');
        $transactionOuts = $this->transactionRepository->getByConfirmedTransactionType('out');

        $thisYearTransactionIns = $this->transactionRepository->getByConfirmedTransactionTypeThisYear('in', date('Y'));
        $thisYearTransactionOuts = $this->transactionRepository->getByConfirmedTransactionTypeThisYear('out' ,date('Y'));

        $balance = $transactionIns->sum('nominal') - $transactionOuts->sum('nominal');
        $balanceThisYear = $thisYearTransactionIns->sum('nominal') - $thisYearTransactionOuts->sum('nominal');

        return view('dashboard', compact('transactionUnconfirmedIns', 'transactionUnconfirmedOuts', 'balance', 'balanceThisYear'));
    }
}
