<?php

namespace Tests\Browser\Pages\Admin\User;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class UpdateUser extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/users/2/edit';
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
                ->assertSee(__('user.admin.edit.title'))
                ->assertSee(__('user.admin.edit.update_user'));
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
