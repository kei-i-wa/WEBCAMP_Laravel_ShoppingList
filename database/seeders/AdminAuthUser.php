<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//DB ハッシュ使用のため以下追記
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuthUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            'login_id'=>'hogemin',
            'password'=>Hash::make('pass'),
            ]);
        //
    }
}
