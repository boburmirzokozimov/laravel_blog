<?php

namespace Database\Seeders;

use App\Modules\User\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(3)->create();
        DB::table('users')->insert([
            [
                'name' => 'John',
                'surname' => 'Doe',
                'nickname' => 'johny',
                'email' => 'john@example.com',
                'banner' => fake()->image('public/storage/banner', fullPath: false),
                'avatar' => fake()->image('public/storage/user', fullPath: false),
                'role' => 'admin',
                'password' => bcrypt('test'),
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Boburmirzo',
                'surname' => 'Kozimov',
                'avatar' => fake()->image('public/storage/user', fullPath: false),
                'banner' => fake()->image('public/storage/banner', fullPath: false),
                'nickname' => 'bob',
                'email' => 'bobur.kozimov@gmail.com',
                'password' => bcrypt('test'),
            ],
        ]);
    }
}
