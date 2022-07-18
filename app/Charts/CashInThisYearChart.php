<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Repositories\TransactionCategoryRepository;
use App\Repositories\TransactionRepository;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class CashInThisYearChart extends BaseChart
{

    public $transactionCategoryRepository;
    public $transactionRepository;

    public function __construct(TransactionCategoryRepository $transactionCategoryRepository, TransactionRepository $transactionRepository)
    {
        $this->transactionCategoryRepository = $transactionCategoryRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function handler(Request $request): Chartisan
    {
        $transactionCategories = $this->transactionCategoryRepository->getByTransactionType('in');
        $labels = [];
        $dataset = [];
        foreach ($transactionCategories as $transactionCategory) {
            $data = $this->transactionRepository->getByConfirmedTrancationCategoryThisYear($transactionCategory->id, date('Y'));
            $labels[] = $transactionCategory->name;
            $dataset[] = $data->sum('nominal');
        }

        return Chartisan::build()
            ->labels($labels)
            ->dataset('Sample', $dataset);
    }
}
