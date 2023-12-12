<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $password=Hash::make("123");
        $records=[
            [
                 "id"=>1,
                 "email"=>"admin@gmail.com",
                 "name"=>"admin",
                 "type"=>"admin",
                 "mobile"=>"99999999",
                 "password"=>$password,
                 "image"=>"",
                 "status"=>1
                           ]
            ];
            Admin::insert($records);    
    }
}
