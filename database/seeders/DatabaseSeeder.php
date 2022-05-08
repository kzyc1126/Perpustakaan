<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'username' =>'admin',
                'name'=>'Loid',
                'email'=>'admin@perpustakaan.com',
                'address'=>'Orchard rd. 20',
                'password' => bcrypt('123456'), // password
                'is_admin' => true,
                     
            ] );
       User::factory(20)->create();
       Book::factory(100)->create();
    }
}
