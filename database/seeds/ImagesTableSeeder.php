<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Product;
use App\Models\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $inputId = Product::doesntHave('images')->pluck('id')->toArray();
        $inputCount = count($inputId);
        for ($i = 1; $i <= $inputCount; $i++) {
            factory(App\Models\Image::class,2)->create([
                'path' => 'img'.$i.'.jpg',
                'product_id' => $faker->unique()->randomElement($inputId),
            ]);
        }
    }
}
    