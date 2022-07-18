<?php

namespace Database\Seeders;

use App\Models\TransactionCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            (object) [
                'transaction_type' => 'in',
                'name' => 'Gaji',
            ],
            (object) [
                'transaction_type' => 'in',
                'name' => 'Sampingan',
            ],
            (object) [
                'transaction_type' => 'out',
                'name' => 'Makan',
            ],
            (object) [
                'transaction_type' => 'out',
                'name' => 'Kendaraan',
            ],
            (object) [
                'transaction_type' => 'out',
                'name' => 'Hiburan',
            ],
        ];

        TransactionCategory::truncate();

        foreach ($categories as $data) {
            TransactionCategory::create([
                'transaction_type' => $data->transaction_type,
                'name' => $data->name,
            ]);
        }
    }
}
