<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert( array (
            0 => array (
                'name' => 'Wahyu Syahputra',
                'email' => 'syahputrawahyu61@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$wDFkhH5matqnQIlFu5/Yqus0Sx1guiuIUzhPLbNUcyLeufxwdtEIG',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => array (
                'name' => 'Degen Scientist',
                'email' => 'degenscientist@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$wDFkhH5matqnQIlFu5/Yqus0Sx1guiuIUzhPLbNUcyLeufxwdtEIG',
                'created_at' => now(),
                'updated_at' => now(),
            )
        ));
    }
}
