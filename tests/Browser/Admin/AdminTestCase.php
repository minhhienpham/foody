<?php

namespace Tests\Browser\Admin;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\CreatesApplication;

class AdminTestCase extends DuskTestCase
{
    use CreatesApplication;
    use DatabaseMigrations;

    protected $user;
    /**
     * Override function setUp() for make user login
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->user = factory('App\Models\User')->create([
            'email' => 'johnathan.mckenzie@example.com',
            'password' => bcrypt('12345'),
            'username' => 'test',
            'full_name' => 'Le Ba Vy',
            'birthday' => '1996-07-05',
            'gender' => '1',
            'phone' => '01265265656',
            'role_id' => '1',
            'is_active' => '1',
            'remember_token' => str_random(10)
        ]);
    }
}
