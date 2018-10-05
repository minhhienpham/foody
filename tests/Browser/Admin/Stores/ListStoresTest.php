<?php

namespace Tests\Browser\Admin\Stores;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use App\Models\Store;
use Tests\Browser\Pages\Admin\Store\ListStores;
use App\Models\ShopOpeningStatus;
use Tests\Browser\Pages\Admin\Store\ShowStores;

class ListStoresTest extends AdminTestCase
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
     * A Dusk test example.
     *
     * @return void
     */
    public function test_list_stores_url()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListStores());
        });
    }

    /**
     * Test data empty.
     *
     * @return void
     */
    public function test_count_records()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListStores());
            $elements = $browser->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == self::ROW_LIMIT);
        });
    }

    /**
     * Test view List Stores with pagination
     *
     * @return void
     */
    public function test_list_stores_pagination()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListStores());
            $number_page = count($browser->elements('.pagination li')) - 2;
            $this->assertEquals($number_page, ceil((self::NUMBER_RECORD) / (self::ROW_LIMIT)));
        });
    }
    /**
     * Test detail store.
     *
     * @return void
     */
    public function test_detail_store()
    {
        $store = Store::all()->random();
        $this->browse(function (Browser $browser) use ($store) {
            $browser->loginAs($this->user)
                    ->visit(new ShowStores($store));
        });
    }
}
