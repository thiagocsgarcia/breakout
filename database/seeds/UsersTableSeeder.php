<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\breakout\User::class, 1)
            ->states('admin')
            ->create([
                'name' => 'Thiago Garcia',
                'email' => 'admin@user.com'
            ]);

        factory(\breakout\User::class, 1)            
            ->create([
                'name' => 'cliente da Silva',
                'email' => 'cliente@cliente.com'
            ]);
    }
}
