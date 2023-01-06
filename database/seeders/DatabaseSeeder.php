<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\ItemOrder;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(15)->create();
        Item::factory(15)->create();
        Stock::factory(15)->create();
        ItemOrder::factory(15)->create();
    }
}
