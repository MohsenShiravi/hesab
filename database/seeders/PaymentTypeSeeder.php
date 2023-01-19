<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_types')->insert([
            ['title' => 'واریز به حساب (کارت به کارت، پایا)','created_at' => now(), 'updated_at' => now()],
            ['title' => 'کارت خوان (pos)','created_at' => now(), 'updated_at' => now()],
            ['title' => 'چک','created_at' => now(), 'updated_at' => now()],
            ['title' => 'درگاه آنلاین','created_at' => now(), 'updated_at' => now()],
            ['title' => 'وجه نقد','created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
