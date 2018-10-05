<?php

namespace Tests\Browser\Admin\Categories;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use Tests\Browser\Pages\Admin\Category\UpdateCategory;
use Tests\Browser\Pages\Admin\Category\ListCategories;
use Tests\Browser\Pages\Admin\Category\UpdateChildCategory;

class UpdateCategoryTest extends AdminTestCase
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
        factory('App\Models\Category')->create([
            'name' => 'Trà Sửa',
        ]);
        factory('App\Models\Category')->create([
            'name' => 'Trà Sửa Thái Xanh',
            'parent_id' => 1,
        ]);
        factory('App\Models\Category')->create([
            'name' => 'Cà Phê',
        ]);
    }
    
    /**
     * A Dusk test edit parent category success
     *
     * @return void
     */
    public function test_edit_parent_category_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateCategory)
                    ->type('name', 'Trà Sửa Ngon')
                    ->press('Edit')
                    ->assertPathIs('/admin/categories')
                    ->assertSee(__('category.admin.message.edit'));
            $this->assertDatabaseHas('categories', ['id' => '1', 'name' => 'Trà Sửa Ngon', 'parent_id' => '0']);
        });
    }

    /**
     * A Dusk test edit parent category success
     *
     * @return void
     */
    public function test_edit_child_category_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateChildCategory)
                    ->type('name', 'Trà Sửa Thái Đỏ')
                    ->press('Edit')
                    ->assertPathIs('/admin/categories/1/show-child')
                    ->assertSee(__('category.admin.message.edit'));
        $this->assertDatabaseHas('categories', ['id' => '2', 'name' => 'Trà Sửa Thái Đỏ', 'parent_id' => '1']);
        });
    }
}
