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
                    'name'=>'ecky',
                    'email'=>'ecky@gmail.com',
                    'password'=>bcrypt('123456')
                ],
                [
                    'name'=>'amit',
                    'email'=>'amit@youremail.com',
                    'password'=>bcrypt('123456')
                ],
        ];
        User::insert($users);
    }
}
