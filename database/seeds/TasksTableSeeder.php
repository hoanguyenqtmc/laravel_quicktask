<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Task;
class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Task::truncate();
        for ($i=0; $i < 10; $i++) { 
            Task::create([
                'name' => $faker->name,
            ]);
        }
    }
}
