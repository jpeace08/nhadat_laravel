<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            ['name' => 'Bán nhà', 'slug' => 'ban-nha', ],
            ['name' => 'Bán căn hộ chung cư', 'slug' => 'ban-can-ho-chung-cu', ],
            ['name' => 'Bán đất', 'slug' => 'ban-dat', ],
            ['name' => 'Sang nhượng cửa hàng', 'slug' => 'sang-huong-cua-hang', ],
            ['name' => 'Cho thuê nhà đất', 'slug' => 'cho-thue-nha-dat', ],

        );
    }
}
