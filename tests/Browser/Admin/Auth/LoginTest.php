<?php

namespace Tests\Browser\Pages\Admin\Auth;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;
use \Tests\Browser\Admin\AdminTestCase;

class LoginTest extends AdminTestCase
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
     * A Dusk test for Login Admin.
     *
     * @return void
     */
    public function test_success_login_admin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->type('email', $this->user->email)
                    ->type('password', '12345')
                    ->press('Login')
                    ->assertPathIs('/admin/dashboard');
                    
        });
    }

    /**
     * A Dusk test for Logout Admin account.
     *
     * @return void
     */
    public function test_logout_admin()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/dashboard')
                    ->click('#logout-button')
                    ->assertVisible('#link-click-me')
                    ->visit(
                        $browser->attribute('#link-click-me', 'href')
                    )
                    ->assertPathIs('/admin/login');
        });
    }

    /**
     * A Dusk test for Login Admin.
     *
     * @return void
     */
     public function test_fail_login_admin()
     {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->type('email', 'loginfail@gamil.com')
                    ->type('password', '12345')
                    ->press('Login')
                    ->assertSee('These credentials do not match our records.');
                    
        });
    }

    /**
     * A Dusk test for Login Not be Admin.
     *
     * @return void
     */
    public function test_login_admin_by_user()
    {
        $user = factory('App\Models\User')->create([
            'email' => 'lebavy@gmail.com',
            'password' => bcrypt('12345'),
            'username' => 'testuser',
            'full_name' => 'Le Ba Vy',
            'birthday' => '1996-07-05',
            'gender' => '1',
            'phone' => '01265265656',
            'role_id' => '3',
            'is_active' => '1',
            'remember_token' => str_random(10)
        ]);
        $this->browse(function (Browser $browser) use ($user) {
             $browser->visit('/admin/login')
                     ->type('email', $user->email)
                     ->type('password', '12345')
                     ->press('Login')
                     ->assertPathIs('/');
        });
    }
}
