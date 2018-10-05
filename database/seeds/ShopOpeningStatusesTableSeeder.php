<?php

use Illuminate\Database\Seeder;
use App\Models\Store;
use Faker\Generator as Faker;
use App\Models\ShopOpeningStatus;

class ShopOpeningStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $inputId = Store::doesntHave('shopOpenStatus')->pluck('id')->toArray();
        $inputCount = count($inputId);
        for ($i = 1; $i <= $inputCount; $i++) {
            factory(App\Models\ShopOpeningStatus::class,1)->create([
                'store_id' => $i
            ]);
        }
    }
}
