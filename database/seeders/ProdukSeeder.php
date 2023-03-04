<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
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
                'nama_produk'      => 'Pensil Warna',
                'stok_produk'      => '24',
                'harga_produk'     => '25500',
                'foto_produk'      => 'WhatsApp-Image-2019-11-27-at-17.05.59.jpeg',
                'detail_produk'    => 'Pensil warna merk faber castel dengan pewarnaan ya..',
                'status'           => 'Ada',
                'id_kategori'      => '1',
            ],
            [
                'nama_produk'      => 'Novel Narasi',
                'stok_produk'      => '4',
                'harga_produk'     => '54000',
                'foto_produk'      => '63e82141-7e79-4a57-81ad-22053c71ef76.jpg',
                'detail_produk'    => 'Novel dibuat oleh penulis terkenal',
                'status'           => 'Ada',
                'id_kategori'      => '2',
            ],
        ];

        foreach ($kategori as $key => $value) {
            Kstegori::create($value);
        }
    }
}
