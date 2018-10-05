<?php

namespace Tests\Browser\Pages\Admin\Store;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class CreateStore extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/stores/create';
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
                ->assertSee(__('store.admin.add.create'))
                ->assertSee(__('store.admin.name'))
                ->assertSee(__('store.admin.address'))
                ->assertSee(__('store.admin.phone'))
                ->assertSee(__('store.admin.describe'))
                ->assertSee(__('store.admin.image'))
                ->assertSee(__('store.admin.add.time_open'))
                ->assertSee(__('store.admin.add.time_close'));
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
