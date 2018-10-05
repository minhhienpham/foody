<?php

namespace Tests\Browser\Pages\Admin\Store;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;
use App\Models\Store;

class ShowStores extends Page
{
    protected $store;

    public function __construct(Store $store)
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
        return '/admin/stores/' . $this->store->id;
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
                ->assertSee('Name')
                ->assertSee('Address')
                ->assertSee('Phone')
                ->assertSee('Uptime')
                ->assertSee('Describe')
                ->assertSee('Image')
                ->assertSee('Edit')
                ->assertSee($this->store->name)
                ->assertSee($this->store->phone)
                ->assertSee($this->store->shopOpenStatus->time_open)
                ->assertSee($this->store->shopOpenStatus->time_close)
                ->assertSee($this->store->describe);
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
