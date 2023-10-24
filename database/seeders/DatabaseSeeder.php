<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Barang;
use App\Models\User;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table("jenis_barangs")->insert(['jenis_barang' => 'Accesories']);
        DB::table("jenis_barangs")->insert(['jenis_barang' => 'Handphone']);
        DB::table("jenis_barangs")->insert(['jenis_barang' => 'Laptop']);
        DB::table("jenis_barangs")->insert(['jenis_barang' => 'Computer Parts']);
        DB::table("jenis_barangs")->insert(['jenis_barang' => 'Console']);
        DB::table("jenis_barangs")->insert(['jenis_barang' => 'Headphone']);
        DB::table("jenis_barangs")->insert(['jenis_barang' => 'Sound System']);
        DB::table("jenis_barangs")->insert(['jenis_barang' => 'TV/Monitor']);

        DB::table("kondisi_barangs")->insert(['kondisi_barang' => 'Baik']);
        DB::table("kondisi_barangs")->insert(['kondisi_barang' => 'Layak']);
        DB::table("kondisi_barangs")->insert(['kondisi_barang' => 'Rusak']);

        User::factory(10)->create();
        Barang::factory(3)->create();
    }
}
