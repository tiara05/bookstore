<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'      => 'Tiara',
                'email'	=> 'tiara@user.com',
                'password'  => '12345',
                'telepon'=> '081332496224',
		'alamat' => 'Sidoarjo',
		'foto'	=> 'User.png',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
