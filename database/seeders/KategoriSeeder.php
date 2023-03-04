<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kstegori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'nama_kategori'      => 'Alat Tulis',
            ],
            [
                'nama_kategori'      => 'Novel',
            ],
        ];

        foreach ($kategori as $key => $value) {
            Kstegori::create($value);
        }
    }
}
