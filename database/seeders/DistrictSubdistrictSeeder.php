<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictSubdistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $districts = [
            'Bunaken',
            'Bunaken Kepulauan',
            'Malalayang',
            'Mapanget',
            'Paal Dua',
            'Tikala',
            'Tuminting',
            'Wanea',
            'Wenang',
            'Singkil',
            'Sario',
        ];

        $districtIds = [];
        foreach ($districts as $name) {
            $id = DB::table('districts')->insertGetId([
                'name' => $name,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $districtIds[$name] = $id;
        }

        $subdistricts = [
            'Bunaken' => ['Bailang', 'Meras', 'Molas', 'Pandu', 'Tongkaina'],
            'Bunaken Kepulauan' => ['Alung Banua', 'Bunaken', 'Manado Tua I', 'Manado Tua II'],
            'Malalayang' => ['Bahu', 'Batu Kota', 'Kleak', 'Malalayang I', 'Malalayang I Barat', 'Malalayang I Timur', 'Malalayang II', 'Winangun I', 'Winangun II'],
            'Mapanget' => ['Bengkol', 'Buha', 'Kairagi I', 'Kairagi II', 'Kima Atas', 'Lapangan', 'Mapanget Barat', 'Paniki Bawah', 'Paniki I', 'Paniki II'],
            'Paal Dua' => ['Dendengan Dalam', 'Dendengan Luar', 'Kairagi Weru', 'Malendeng', 'Paal Dua', 'Perkamil', 'Ranomuut'],
            'Tikala' => ['Banjer', 'Paal IV', 'Taas', 'Tikala Ares', 'Tikala Baru'],
            'Tuminting' => ['Maasing', 'Bitung Karangria', 'Kampung Islam', 'Mahawu', 'Sindulang I', 'Sindulang II', 'Sumompo', 'Tuminting', 'Tumumpa I', 'Tumumpa II'],
            'Wanea' => ['Bumi Nyiur', 'Karombasan Selatan', 'Karombasan Utara', 'Tanjung Batu', 'Tingkulu', 'Tingkulu Atas', 'Wanea', 'Ranotana Weru', 'Pakowa', 'Teling Atas'],
            'Wenang' => ['Wenang Selatan', 'Wenang Utara', 'Mahakeret Barat', 'Mahakeret Timur', 'Bumi Beringin', 'Teling Bawah', 'Calaca', 'Istiqlal', 'Komo Luar', 'Pinaesaan', 'Lawang Irung', 'Tikala Kumaraka'],
            'Singkil' => ['Karame', 'Ketang Baru', 'Wawonasa', 'Ternate Baru', 'Kombos Barat', 'Kombos Timur', 'Singkil I', 'Singkil II', 'Ternate Tanjung'],
            'Sario' => ['Sario Kota Baru', 'Titiwungen Selatan', 'Titiwungen Utara', 'Sario', 'Sario Tumpaan', 'Sario Utara', 'Ranotana'],
        ];

        foreach ($subdistricts as $districtName => $kelurahans) {
            $district_id = $districtIds[$districtName] ?? null;
            if ($district_id) {
                foreach ($kelurahans as $subname) {
                    DB::table('subdistricts')->insert([
                        'district_id' => $district_id,
                        'name' => $subname,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                }
            }
        }
    }
}
