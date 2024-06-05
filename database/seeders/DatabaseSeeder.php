<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Todo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $status1 = Status::create(['name' => '未着手']);
        $status2 = Status::create(['name' => '進行中']);
        $status3 = Status::create(['name' => '完了']);

        Todo::create([
            'title' => 'Test ToDo 1',
            'body' => 'Test ToDo body 1',
            'due_date' => '2024-12-31',
            'status_id' => $status1->id,
            'user_id' => 1,
        ]);
    }
}
