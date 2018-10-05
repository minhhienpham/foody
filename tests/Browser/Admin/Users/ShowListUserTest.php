<?php

namespace Tests\Browser\Admin\Users;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \Tests\Browser\Pages\Admin\User\ShowListUser;
use \App\Models\User;
use \Tests\Browser\Admin\AdminTestCase;

class ShowListUserTest extends AdminTestCase
{
    use DatabaseMigrations;

    const NUMBER_RECORD = 14;
    const ROW_LIMIT = 5;

    /**
    * Override function setUp() for make user login
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        factory(User::class, self::NUMBER_RECORD)->create();
    }

    /**
     * A Dusk test show list user.
     *
     * @return void
     */
    public function test_show_list_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ShowListUser);
        });
    }

    /**
     * A Dusk test show record with table has data.
     *
     * @return void
     */
    public function test_show_record()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ShowListUser);
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(self::ROW_LIMIT, $elements);
        });
    }

    /**
     * Test view Admin List Users with pagination
     *
     * @return void
     */
    public function test_list_users_pagination()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ShowListUser);
            $number_page = count($browser->elements('.pagination li')) - 2;
            $this->assertEquals($number_page, ceil((self::NUMBER_RECORD) / (self::ROW_LIMIT)));
        });
    }
}
