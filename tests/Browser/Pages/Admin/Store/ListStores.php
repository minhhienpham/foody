<?php

namespace Tests\Browser\Pages\Admin\Store;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;
use Tests\Browser\Admin\Stores\DeleteStoreTest;
use App\Models\Store;

class ListStores extends Page
{
    protected $store;

    public function __construct(Store $store = null)
    {
        $this->store = $store;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        if($this->store){
            if($this->store->id > DeleteStoreTest::ROW_LIMIT) {
                return '/admin/stores?page=' .ceil(($this->store->id) / (DeleteStoreTest::ROW_LIMIT));
            } else {
                return '/admin/stores';
            }
        } else {
            return '/admin/stores';
        }
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
                ->assertSee('Store')
                ->assertSee('Create')
                ->assertSee('ID')
                ->assertSee('Name')
                ->assertSee('Address')
                ->assertSee('Show')
                ->assertSee('Edit')
                ->assertSee('Delete');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
