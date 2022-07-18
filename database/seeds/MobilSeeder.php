<?php

use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mobil= [
        ['fotomobil'=>'sampel1.png', 'merk'=>'Daihatsu Sigra', 'plat_no'=>'D 123 SPL', 'spesifikasi'=>'Warna Merah, Kapasitas penumpang 7 orang, Bahan Bakar Bensin, Sistem Bahan Bakar : EFI','harga_sewamobil'=>'140000', 'status'=>'Tidak'],
        ['fotomobil'=>'sampel2.png', 'merk'=>'Xenia', 'plat_no'=>'D 123 DD', 'spesifikasi'=>'4 Buah Speaker, AC Dual Blower, Kursi Baris 3 Dilengkapi Head rest, Seatbelt Pada Baris ketiga, Kapasitas Penumpang 6 Orang','harga_sewamobil'=>'150000', 'status'=>'Tidak'],
        ['fotomobil'=>'sampel3.png', 'merk'=>'Avanza', 'plat_no'=>'D 123 DAC', 'spesifikasi'=>'Kapasitas penumpang 7 Orang, Dilengkapi Kantong Udara, Power Stearing, Kapasitas Mesin 1329cc','harga_sewamobil'=>'160000', 'status'=>'Tidak'],
        ['fotomobil'=>'sampel4.png', 'merk'=>'Avanza ', 'plat_no'=>'D 123 GAC', 'spesifikasi'=>'max penumpang 5, dual AC','harga_sewamobil'=>'150000', 'status'=>'Tidak'],
        ['fotomobil'=>'sampel5.png', 'merk'=>'Hiace', 'plat_no'=>'D 444 HHA', 'spesifikasi'=>'max penumpang 10 orang, dual AC','harga_sewamobil'=>'200000', 'status'=>'Tidak'],
        ['fotomobil'=>'sampel6.png', 'merk'=>'Suzuki Ertiga', 'plat_no'=>'D 909 BFF', 'spesifikasi'=>'max penumpang 7, dual AC','harga_sewamobil'=>'200000', 'status'=>'Tidak'],
        ];

        DB::table('mobils')->insert($mobil);
    }
}
