<?php
namespace Nitseditor\Plugins\Excel\Databases\seeds;

use Illuminate\Database\Seeder;

class InstallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MenuSeeder::class);
        $this->call(AppSettingsSeeder::class);
    }
}
