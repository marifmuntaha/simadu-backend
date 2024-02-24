<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('institutions')->insert([
            'name' => 'DARUL HIKMAH MENGANTI',
            'alias' => 'MADH',
            'nsm' => '121233200005',
            'npsn' => '20364236',
            'ladder' => 3,
            'foundation' => 'YAYASAN DARUL HIKMAH',
            'address' => 'Jalan Bugel - Jepara Km.7 Menganti',
            'phone' => '6282229366506',
            'email' => 'ma@darul-hikmah.sch.id',
            'website' => 'https://ma.darul-hikmah.sch.id',
            'head' => 'Faiz Noor, S.Pd.',
        ]);
    }
}
