<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //$this->call(UsersTableSeeder::class);
        App\role::create([
            'id'=>'1',
            'name'=>'student',
        ]);
        App\role::create([
            'id'=>'2',
            'name'=>'teacher',
        ]);
        App\role::create([
            'id'=>'3',
            'name'=>'admin',
        ]);
        App\User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('12345678'),
            'role_id'=>'3',
        ]);
    }
}
