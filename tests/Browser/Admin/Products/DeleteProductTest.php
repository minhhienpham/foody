<?php

namespace Tests\Browser\Admin\Products;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use Tests\Browser\Pages\Admin\Product\DeleteProduct;
use App\Models\Product;
use App\Models\Store;
use App\Models\Category;

class DeleteProductTest extends AdminTestCase
{
    use DatabaseMigrations;

    protected $product;

    /**
    * Override function setUp() database
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        factory(Store::class)->create();
        factory(Category::class)->create();
        $this->product = factory(Product::class)->create();
    }

    /**
     * Test button delete product
     *
     * @return void
     */
    public function test_cancel_confirm_delete()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit(new DeleteProduct)
                ->click('#deleteProduct-'. $this->product->id)
                ->assertDialogOpened(__('product.admin.show.delete_confirm'))
                ->dismissDialog();
            $this->assertDatabaseHas('products', ['deleted_at' => null]);
        });
    }

    /**
     * Test click button Delete
     *
     * @return void
     */
    public function test_confirm_delete()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit(new DeleteProduct)
                ->click('#deleteProduct-'. $this->product->id)
                ->assertDialogOpened(__('product.admin.show.delete_confirm'))
                ->acceptDialog()
                ->assertSee(__('product.admin.show.delete_success'));
            $this->assertDatabaseMissing('products', ['id' => 1, 'deleted_at' => null]);
        });
    }
}
