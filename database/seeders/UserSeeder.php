<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@pedulidonasi.com',
                'password' => Hash::make('admin'),
                'role_id' => 1
            ],
            [
                'name' => 'Yayasan 1',
                'email' => 'yayasan1@pedulidonasi.com',
                'password' => Hash::make('yayasan'),
                'role_id' => 3
            ],
            [
                'name' => 'Yayasan 2',
                'email' => 'yayasan2@pedulidonasi.com',
                'password' => Hash::make('yayasan'),
                'role_id' => 3
            ],
            [
                'name' => 'Yayasan 3',
                'email' => 'yayasan3@pedulidonasi.com',
                'password' => Hash::make('yayasan'),
                'role_id' => 3
            ],
            [
                'name' => 'Yayasan 4',
                'email' => 'yayasan4@pedulidonasi.com',
                'password' => Hash::make('yayasan'),
                'role_id' => 3
            ],
            [
                'name' => 'Yayasan 5',
                'email' => 'yayasan5@pedulidonasi.com',
                'password' => Hash::make('yayasan'),
                'role_id' => 3
            ],
            [
                'name' => 'Yayasan 6',
                'email' => 'yayasan6@pedulidonasi.com',
                'password' => Hash::make('yayasan'),
                'role_id' => 3
            ],
            [
                'name' => 'Yayasan 7',
                'email' => 'yayasan7@pedulidonasi.com',
                'password' => Hash::make('yayasan'),
                'role_id' => 3
            ],
            [
                'name' => 'Yayasan 8',
                'email' => 'yayasan8@pedulidonasi.com',
                'password' => Hash::make('yayasan'),
                'role_id' => 3
            ],
            [
                'name' => 'Yayasan 9',
                'email' => 'yayasan9@pedulidonasi.com',
                'password' => Hash::make('yayasan'),
                'role_id' => 3
            ],
            [
                'name' => 'Yayasan 10',
                'email' => 'yayasan10@pedulidonasi.com',
                'password' => Hash::make('yayasan'),
                'role_id' => 3
            ],
            [
                'name' => 'Yayasan 11',
                'email' => 'yayasan11@pedulidonasi.com',
                'password' => Hash::make('yayasan'),
                'role_id' => 3
            ],
            [
                'name' => 'Yayasan 12',
                'email' => 'yayasan12@pedulidonasi.com',
                'password' => Hash::make('yayasan'),
                'role_id' => 3
            ],
            [
                'name' => 'Donatur 1',
                'email' => 'donatur@pedulidonasi.com',
                'password' => Hash::make('donatur'),
                'role_id' => 2
            ],
        ]);
    }
}
