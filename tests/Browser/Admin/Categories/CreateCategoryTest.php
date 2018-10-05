<?php

namespace Tests\Browser\Admin\Categories;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use Tests\Browser\Pages\Admin\Category\CreateCategory;

class CreateCategoryTest extends AdminTestCase
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
     * A Dusk test example.
     *
     * @return void
     */
    public function test_create_category_url()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new CreateCategory());
        });
    }

    /**
     * List case for Test validate for input Create Category
     *
     * @return array
     */
    public function list_test_case_validate_for_input()
    {
        return [
            ['name', '', 'The name field is required.'],
            ['name', '    ', 'The name field is required.'],
            ['name', 'Mì Quảng', 'The name has already been taken.'],
        ];
    }

    /**
     * List case for Test validate for input Create Category Exist
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message show when validate
     *
     * @dataProvider list_test_case_validate_for_input
     *
     * @return array
     */
    public function test_category_validate_for_input($name, $content, $message)
    {
        factory('App\Models\Category')->create([
            'name' => 'Mì Quảng'
        ]);
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->loginAs($this->user)
                    ->visit(new CreateCategory())
                    ->type($name, $content);
            $browser->press('Create')
                    ->assertSee($message);
        });
    }

    /**
     * Dusk test create parent category success.
     *
     * @return void
     */
    public function test_creates_parent_category_success()
    {
        $testContent = 'Trà Sữa';
        $this->browse(function (Browser $browser) use ($testContent) {
            $browser->loginAs($this->user)
                    ->visit(new CreateCategory())
                    ->type('name', $testContent);
            $browser->press('Create')
                    ->assertSee(__('category.admin.message.add'));
            $this->assertDatabaseHas('categories', [
                'id' => 1,
                'name' => $testContent,
                'parent_id' => 0,
            ]);
        });
    }
    /**
     * Dusk test create child category success.
     *
     * @return void
     */
    public function test_creates_child_category_success()
    {
        $testContent = 'Trà Sửa Thái Xanh';
        $category = factory('App\Models\Category')->create();
        $this->browse(function (Browser $browser) use ($testContent, $category) {
            $browser->loginAs($this->user)
                    ->visit(new CreateCategory())
                    ->type('name', $testContent)
                    ->select('parent_id', $category->id);
            $browser->press('Create')
                    ->assertSee(__('category.admin.message.add'));
            $this->assertDatabaseHas('categories', [
                'id' => 2,
                'name' => $testContent,
                'parent_id' => $category->id,
            ]);
        });
    }
}
