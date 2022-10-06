<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRecords = [
            ['id'=>1,'name'=>'Super Admin','type'=>'superadmin', 'vendor_id'=>0,'mobile'=>'9877606316','email'=>'enyato98@gmail.com', 'password'=>'$2a$12$trUFkJhKaDBaGr7vKurAUemIxSiSX./N.A2wzwoWlg9XW4AxIBH9S
            ','image'=>'','status'=>1 ]
        ];
        Admin::insert($adminRecords);
    }
}
