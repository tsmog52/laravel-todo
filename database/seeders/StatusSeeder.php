<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => '未着手'],
            ['name' => '進行中'],
            ['name' => '完了'],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }

}
