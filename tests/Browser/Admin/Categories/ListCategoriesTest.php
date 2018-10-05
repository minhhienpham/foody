<?php

namespace Tests\Browser\Admin\Categories;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \Tests\Browser\Admin\Categories\ListCategoriesTest;
use Tests\Browser\Admin\AdminTestCase;
use Tests\Browser\Pages\Admin\Category\ListCategories;
use App\Models\Category;

class ListCategoriesTest extends AdminTestCase
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
        factory(Category::class, 7)->create();
        factory(Category::class, 10)->states('parent')->create();
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_list_categories_parent()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListCategories());
        });
    }

    /**
     * Test data empty.
     *
     * @return void
     */
    public function test_count_records()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListCategories());
            $elements = $browser->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == config('paginate.number_categories'));
        });
    }
}
