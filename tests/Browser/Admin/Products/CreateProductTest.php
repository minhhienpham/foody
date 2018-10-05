<?php

namespace Tests\Browser\Admin\Products;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use Tests\Browser\Pages\Admin\Product\CreateProduct;
use App\Models\Category;
use App\Models\Store;

class CreateProductTest extends AdminTestCase
{
    use DatabaseMigrations;

    /**
    * Override function setUp() for make user login
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * A Dusk test create product
     *
     * @return void
     */
    public function test_create_product()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new CreateProduct);
        });
    }

    /**
     * List case for test validate for input
     *
     * @return array
     */
    public function list_test_case_validate()
    {
        return [
            ['name', '', 'The name field is required.'],
            ['describe', '', 'The describe field is required.'],
            ['price', '', 'The price field is required.'],
        ];
    }

    /**
     * Dusk test validate for input
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message show when validate
     *
     * @dataProvider list_test_case_validate
     *
     * @return void
     */
    public function test_validate($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->loginAs($this->user)
                    ->visit(new CreateProduct)
                    ->type($name, $content)
                    ->press(__('product.admin.create.create_product'))
                    ->assertSee($message);
        });
    }

    /**
     * A Dusk test create product success.
     *
     * @return void
     */
    public function test_create_product_success()
    {
        $this->browse(function (Browser $browser) {
            factory('App\Models\Store', 5)->create();
            factory(Category::class, 1)->create();
            factory(Category::class, 2)->states('parent')->create();
            $browser->loginAs($this->user)
                    ->visit(new CreateProduct)
                    ->type('name', 'Milk Tea')
                    ->attach('image[]', __DIR__.'/test/image1.jpg')
                    ->type('describe', 'Delicious')
                    ->type('price', '40000')
                    ->select('store_id', Store::find(1)->id)
                    ->select('category_id', Category::find(2)->id)
                    ->press(__('product.admin.create.create_product'))
                    ->assertSee(__('product.admin.create.create_success'))
                    ->assertPathIs('/admin/products');
            $this->assertDatabaseHas(
                'products', [
                    'name' => 'Milk Tea',
                    'describe' => 'Delicious',
                    'price' => '40000',
                    'store_id' => '1',
                    'category_id' => '2',
                ]);
        });
    }

    /**
     * A Dusk test input invalid value.
     *
     * @return void
     */
    public function test_invalid_value()
    {
        $this->browse(function (Browser $browser) {
            factory('App\Models\Category', 5)->create();
            factory('App\Models\Store', 5)->create();
            $browser->loginAs($this->user)
                    ->visit(new CreateProduct)
                    ->type('name', 'Milk Tea')
                    ->attach('image[]', __DIR__.'/test/image1.jpg')
                    ->type('describe', 'Delicious')
                    ->type('price', 'abc')
                    ->select('store_id', Store::find(1)->id)
                    ->select('category_id', Category::find(1)->id)
                    ->press(__('product.admin.create.create_product'))
                    ->assertDontSee(__('product.admin.create.create_success'))
                    ->assertPathIs('/admin/products/create');
        });
    }
}
