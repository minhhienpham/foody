<?php

namespace Tests\Browser\Pages\Admin\Category;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class UpdateChildCategory extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/categories';
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
                ->click('#show-1')
                ->assertPathIs('/admin/categories/1/show-child')
                ->click('#edit-2')
                ->assertSee('Edit Category')
                ->assertSee('Name')
                ->assertSee('Edit');
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
