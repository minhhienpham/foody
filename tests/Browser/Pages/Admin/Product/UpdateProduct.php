<?php

namespace Tests\Browser\Pages\Admin\Product;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class UpdateProduct extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/products/1/edit';
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
                ->assertSee(__('product.admin.edit.title'))
                ->assertSee(__('product.admin.show.name'))
                ->assertSee(__('product.admin.show.describe'))
                ->assertSee(__('product.admin.show.price'))
                ->assertSee(__('product.admin.show.store'))
                ->assertSee(__('product.admin.show.category'))
                ->assertSee(__('product.admin.show.image'))
                ->assertSee(__('product.admin.edit.form_title'))
                ->assertSee(__('product.admin.edit.update_product'))
                ->assertSee(__('product.admin.edit.cancel'));
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
