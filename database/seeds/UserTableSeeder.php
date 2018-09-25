<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'cuongle',
            'email' => 'cuongle.dev@gmail.com',
            'password' => bcrypt('123123'),
            'remember_token' => str_random(10),
        ]);
        factory(User::class, 50)->create();
    }
}
