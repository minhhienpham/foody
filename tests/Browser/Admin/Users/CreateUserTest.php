<?php

namespace Tests\Browser\Admin\Users;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use Tests\Browser\Pages\Admin\User\CreateUser;

class CreateUserTest extends AdminTestCase
{
    use DatabaseMigrations;

    /**
    * Override function setUp() for make user login
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * A Dusk test create user.
     *
     * @return void
     */
    public function test_create_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new CreateUser);
        });
    }

    /**
     * List case for test validate for input
     *
     * @return array
     */
    public function list_test_case_validate()
    {
        return [
            ['username', '', 'The username field is required.'],
            ['full_name', '', 'The full name must be a string.'],
            ['birthday', '', 'The birthday field is required.'],
            ['phone', '', 'The phone format is invalid.'],
            ['email', '', 'The email field is required.'],
            ['password', '', 'The password field is required.'],
        ];
    }

    /**
     * Dusk test validate for input
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message show when validate
     *
     * @dataProvider list_test_case_validate
     *
     * @return void
     */
    public function test_validate($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->loginAs($this->user)
                    ->visit(new CreateUser)
                    ->type($name, $content)
                    ->press(__('user.admin.create.create_user'))
                    ->assertSee($message);
        });
    }
}
