<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class insert_records_into_user_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
                [
                    'name'=>'eckys',
                    'email'=>'eckys@gmail.com',
                    'password'=>bcrypt('123456')
                ],
                [
                    'name'=>'amits',
                    'email'=>'amits@youremail.com',
                    'password'=>bcrypt('123456')
                ],
        ];
        User::insert($users);
    }
}
