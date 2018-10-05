<?php

namespace Tests\Browser\Pages\Admin\Category;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class ListCategories extends Page
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
                ->assertSee('Category')
                ->assertSee('Create Category')
                ->assertSee('ID')
                ->assertSee('Name')
                ->assertSee('View sub Categories')
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
