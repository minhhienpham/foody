<?php

namespace Tests\Browser\Admin\Products;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use Tests\Browser\Pages\Admin\Product\UpdateProduct;
use App\Models\Product;
use App\Models\Store;
use App\Models\Category;

class UpdateProductTest extends AdminTestCase
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
        factory(Store::class)->create();
        factory(Category::class, 1)->create();
        factory(Category::class, 1)->states('parent')->create();
        factory(Product::class)->create();
    }

     /**
     * Test update product url
     *
     * @return void
     */
    public function test_update_product_url()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateProduct);
        });
    }

    /**
     * List case for test validate for input
     *
     * @return array
     */
    public function list_test_case_update_product_validate()
    {
        return [
            ['name', '', 'The name field is required.'],
            ['describe', '', 'The describe field is required.'],
            ['price', 'abc', 'The price must be an integer.'],
        ];
    }

    /**
     * Dusk test validate for input
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message show when validate
     *
     * @dataProvider list_test_case_update_product_validate
     *
     * @return void
     */
    public function test_update_product_validate($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateProduct)
                    ->type($name, $content)
                    ->press(__('product.admin.edit.update_product'))
                    ->assertSee($message);
        });
    }

    /**
     * Dusk test update product success.
     *
     * @return void
     */
    public function test_update_product_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit(new UpdateProduct)
                ->assertSee(__('product.admin.edit.title'))
                ->type('name', 'Milk Tea')
                ->attach('image[]', __DIR__.'/test/image1.jpg')
                ->type('describe', 'Sale off')
                ->type('price', '20000')
                ->press(__('product.admin.edit.update_product'))
                ->assertPathIs('/admin/products')
                ->assertSee(__('product.admin.edit.update_success'));
            $this->assertDatabaseHas('products', [
                'name' => 'Milk Tea',
                'describe' => 'Sale Off',
                'price' => '20000',
            ]);
        });
    }
}
