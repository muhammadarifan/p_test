<?php

namespace App\Http\Controllers;

use App\Repositories\TransactionCategoryRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CashInController extends Controller
{
    public $transactionCategoryRepository;
    public $transactionRepository;

    public function __construct(TransactionCategoryRepository $transactionCategoryRepository, TransactionRepository $transactionRepository)
    {
        $this->transactionCategoryRepository = $transactionCategoryRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function index(Request $request)
    {
        $transactions = $this->transactionRepository->getByTransactionType('in');

        return view('cash-in', compact('transactions'));
    }

    public function add(Request $request)
    {
        $dateNow = date('Y-m-d');
        $transactionCategories = $this->transactionCategoryRepository->getByTransactionType('in');

        return view('cash-in-add', compact('dateNow', 'transactionCategories'));
    }

    public function edit(Request $request, $id)
    {
        $dateNow = date('Y-m-d');
        $transactionCategories = $this->transactionCategoryRepository->getByTransactionType('in');
        $transaction = $this->transactionRepository->getById($id);

        return view('cash-in-edit', compact('dateNow', 'transactionCategories', 'transaction'));
    }

    public function delete(Request $request, $id)
    {
        return view('cash-in-delete', compact('id'));
    }

    public function confirm(Request $request, $id)
    {
        return view('cash-in-confirm', compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'category' => 'required',
            'nominal' => 'required',
            'description' => 'required',
        ]);

        $this->transactionRepository->create([
            'type' => 'in',
            'date' => $request->date,
            'transaction_category_id' => $request->category,
            'nominal' => $request->nominal,
            'description' => $request->description,
        ]);

        Alert::success('Success', 'Transaksi pemasukan berhasil disimpan');

        return redirect()->route('cash-in');
    }

    public function update(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'category' => 'required',
            'nominal' => 'required',
            'description' => 'required',
        ]);

        $this->transactionRepository->update($request->id, [
            'type' => 'in',
            'date' => $request->date,
            'transaction_category_id' => $request->category,
            'nominal' => $request->nominal,
            'description' => $request->description,
        ]);

        Alert::success('Success', 'Transaksi pemasukan berhasil diubah');

        return redirect()->route('cash-in');
    }

    public function destroy(Request $request)
    {

        $this->transactionRepository->delete($request->id);

        Alert::success('Success', 'Transaksi pemasukan berhasil dihapus');

        return redirect()->route('cash-in');
    }

    public function confirmProcess(Request $request)
    {
        $this->transactionRepository->confirm($request->id);

        Alert::success('Success', 'Transaksi pemasukan berhasil dikonfirmasi');

        return redirect()->route('cash-in');
    }
}
