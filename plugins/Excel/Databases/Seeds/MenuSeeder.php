<?php
namespace Nitseditor\Plugins\Excel\Databases\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'menu_location' => 'main_menu',
                'parent_id' => null,
                'name' => 'Dashboard',
                'link' => '/dashboard',
                'icon' => 'flaticon2-dashboard',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
