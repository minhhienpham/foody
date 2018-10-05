<?php

namespace Tests\Browser\Admin\Stores;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use Tests\Browser\Pages\Admin\Store\ListStores;
use App\Models\Store;
use App\Models\ShopOpeningStatus;

class DeleteStoreTest extends AdminTestCase
{
    use DatabaseMigrations;
    
    const NUMBER_RECORD = 7;
    const ROW_LIMIT = 5;
    /**
     * Override function setUp() for make user login
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory(Store::class, self::NUMBER_RECORD)->create();
        for ($i = 1; $i <= self::NUMBER_RECORD; $i++) {
            factory(ShopOpeningStatus::class,1)->create([
                'store_id' => $i
            ]);
        }
    }

    /**
     * Test button delete category in List Categories
     *
     * @return void
     */
    public function test_cancel_delele()
    {
        $store = Store::find(1);
        $this->browse(function (Browser $browser) use ($store){
            $browser->loginAs($this->user)
                ->visit(new ListStores($store))
                ->click('#delete-'. $store->id)
                ->assertDialogOpened(__('store.admin.message.msg_del'))
                ->dismissDialog();
            $this->assertDatabaseHas('stores', ['deleted_at' => null]);
        });
    }

    /**
     * Test click button Delete
     *
     * @return void
     */
    public function test_confirm_delete()
    {
        $store = Store::find(1);
        $this->browse(function (Browser $browser) use ($store){
            $browser->loginAs($this->user)
                ->visit(new ListStores($store))
                ->click('#delete-'. $store->id)
                ->assertDialogOpened(__('store.admin.message.msg_del'))
                ->acceptDialog()
                ->assertSee(__('store.admin.message.del'));
        $this->assertSoftDeleted('stores', [
            'id' => $store->id, 
            'name' => $store->name, 
            'address' => $store->address, 
            'phone' => $store->phone,  
            'describe' => $store->describe,
            'image' => $store->image
            ]);
        });
    }
}
