<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Product;
use App\Models\Store;
use App\Models\Image;
use App\Models\Category;

class ShowNewestProductsSlideTest extends TestCase
{
    use DatabaseMigrations;
    
    public function setUp()
    {
        parent::setUp();
        factory(Store::class)->create();
        factory(Category::class)->create();
        factory(Product::class)->create();
        factory(Image::class)->create();
    }

    /**
     * Test status code
     *
     * @return void
     */
    public function test_status_code()
    {
        $response = $this->json('GET', '/api/products?newest_products=8');
        $response->assertStatus(200);
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureListProducts()
    { 
        return [
            [
                'url' => '/api/products?newest_products=8',
                'structure' => [
                    'result' => [
                        [
                            "id",
                            "name",
                            "describe",
                            "price",
                            "store_id",
                            "category_id",
                            "created_at",
                            "updated_at",
                            "deleted_at",
                            "store" => [
                                "id",
                                "name",
                                "address",
                                "phone",
                                "describe",
                                "image",
                                "is_active",
                                "created_at",
                                "updated_at",
                                "deleted_at"
                            ],
                            "images" => [
                                [
                                    "id",
                                    "path",
                                    "product_id",
                                    "created_at",
                                    "updated_at",
                                    "deleted_at"
                                ]
                            ]
                        ]
                    ],
                    'code'
                ]
            ]
        ];      
    }
    /**
     * @dataProvider jsonStructureListProducts
     *
     * @param string $url url of api caterogy 
     * @param array  $structure structure of json 
     *
     * Test api structure
     *
     * @return void
     */
    public function test_json_structure($url, $structure)
    {
        $response = $this->json('GET', $url);
        $response->assertJsonStructure($structure);
    }

    /**
     * Test check some object compare database.
     *
     * @return void
     */
    public function test_compare_with_database()
    {
        $response = $this->json('GET', '/api/products?newest_products=8');
        $data = json_decode($response->getContent())->result;
        foreach ($data as $product) {
            $arrayCompare = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'store_id' => $product->store_id,
                'category_id' => $product->category_id,
            ];
            $this->assertDatabaseHas('products', $arrayCompare);
        }
    }
}
