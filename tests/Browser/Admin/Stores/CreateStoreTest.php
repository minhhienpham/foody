<?php

namespace Tests\Browser\Admin\Stores;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Store\CreateStore;
use Tests\Browser\Admin\AdminTestCase;
use App\Models\User;

class CreateStoreTest extends AdminTestCase
{
    use DatabaseMigrations;
    protected $manager;

    const NUMBER_RECORD = 7;
    const ROW_LIMIT = 5;
    /**
     * Override function setUp() for make user login
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->manager = factory(User::class)->create([
            'role_id' => '3',
            'full_name' => 'Hien Pham'
        ]);
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_create_store_url()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new CreateStore());
        });
    }

    /**
     * List case for Test validate for input Create Store
     *
     * @return array
     */
    public function list_test_case_validate_for_input()
    {
        return [
            ['name', '', 'The name field is required.'],
            ['address', '', 'The address field is required.'],
            ['phone', '', 'The phone field is required.'],
            ['time_open', '', 'The time open field is required.'],
            ['time_close', '', 'The time close field is required.'],
            ['name', 'Moriah KuhnMoriah KuhnMoriah KuhnMoriah KuhnMoriah KuhnMoriah KuhnMoriah Moriah KuhnMoriah KuhnMoriah KuhnMoriah KuhnMoriah KuhnMoriah KuhnMoriah ', 'The name may not be greater than 100 characters.'],
            ['phone', '3156556645', 'The phone format is invalid.'],
            ['time_open', 'asdfdfg', 'The time open does not match the format H:i:s.'],
            ['time_close', 'fsdgfdgf', 'The time close does not match the format H:i:s.'],
        ];
    }
 
     /**
      * List case for Test validate for input Create Store
      *
      * @param string $name name of field
      * @param string $content content
      * @param string $message message show when validate
      *
      * @dataProvider list_test_case_validate_for_input
      *
      * @return void
      */
    public function test_store_validate_for_input($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->loginAs($this->user)
                    ->visit(new CreateStore())
                    ->type($name, $content);
            $browser->press('Create')
                    ->assertSee($message);
        });
    }
 
    /**
     * Dusk test create store success.
     *
     * @return void
     */
    public function test_create_store_success()
    {
        factory(User::class, 1)->create([
            'role_id' => '2'
        ]);
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new CreateStore())
                    ->type('name', 'Riley Runolfsdottir Sr.')
                    ->select('manager_id', User::find(1)->id)
                    ->type('address', '982 Fisher Shoal Schummhaven, NJ 98391')
                    ->type('phone', '0123456789')
                    ->type('describe', 'Eos impedit amet provident tempora')
                    ->attach('image', __DIR__.'/testing/store1.jpg')
                    ->type('time_open', '07:00:00')
                    ->type('time_close', '17:00:00');
            $browser->press('Create')
                    ->assertSee(__('store.admin.message.add'));
            $this->assertDatabaseHas('stores', [
                'id' => 1,
                'name' => 'Riley Runolfsdottir Sr.',
                'address' => '982 Fisher Shoal Schummhaven, NJ 98391',
                'phone' => '0123456789',
                'describe' => 'Eos impedit amet provident tempora',
            ]);
            $this->assertDatabaseHas('shop_opening_statuses', [
                'id' => 1,
                'store_id' => 1,
                'time_open' => '07:00:00',
                'time_close' => '17:00:00',
            ]);
        });
    }
}
