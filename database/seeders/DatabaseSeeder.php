<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

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
                'name'      => 'admin',
                'username'  => 'admin@admin.com',
                'password'  => '12345',
                'role'      => '0',
            ],
            [
                'name'      => 'kasir',
                'username'  => 'kasir@kasir.com',
                'password'  => 'kasir',
                'role'      => '1',
            ],
            [
                'name'      => 'staff',
                'username'  => 'staff@staff.com',
                'password'  => 'staff',
                'role'      => '2',
            ],
        ];

        foreach ($user as $key => $value) {
            Admin::create($value);
        }
    }
}
