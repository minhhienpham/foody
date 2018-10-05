<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Http\Requests\Admin\EditCategoryRequest;
use Mockery\Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response Response
     */
    public function index()
    {
        $categoriesParent = Category::where('parent_id', 0)->sortable()->orderBy('created_at', 'desc')->paginate(config('paginate.number_categories'));
        return view('admin.pages.categories.index', compact('categoriesParent'));
    }

    /**
     * Show all sub categories of Parent Category
     *
     * @param Category $category Category
     *
     * @return \Illuminate\Http\Response Response
     */
    public function showChild(Category $category)
    {
        $categoriesChild = $category->children()->sortable()->orderBy('created_at', 'desc')->paginate(config('paginate.number_categories'));
        $categoriesParent = $category;
        return view('admin.pages.categories.showChild', compact('categoriesChild', 'categoriesParent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesParent = Category::where('parent_id', 0)->get();
        return view('admin.pages.categories.create', compact('categoriesParent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Admin\CreateCategoryRequest $request CreateCategoryRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        try {
            $data = $request->all();
            $category = Category::create($data);
            if ($category) {
                if ($request->parent_id == 0) {
                    return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.add'));
                } else {
                    return redirect()->route('admin.categories.showChild', $request->parent_id)->with('message', __('category.admin.message.add'));
                }
            } else {
                return redirect()->route('admin.categories.create')->with('message', __('category.admin.message.add_fail'));
            }
        } catch (Exception $ex) {
            return redirect()->route('admin.categories.create')->with('message', __('category.admin.message.add_fail'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category Category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categoriesParent = Category::where('parent_id', 0)->get();
        return view('admin.pages.categories.edit', compact('categoriesParent', 'category'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param EditCategoryRequest $request  EditCategoryRequest
     * @param Category            $category Category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, Category $category)
    {
        try {
            $category->name = $request->name;
            $category->parent_id = $request->parent_id != null ? $request->parent_id : 0;
            $category->save();
            if ($category) {
                if ($request->parent_id == 0) {
                    return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.edit'));
                } else {
                    return redirect()->route('admin.categories.showChild', $request->parent_id)->with('message', __('category.admin.message.edit'));
                }
            } else {
                return redirect()->route('admin.categories.edit')->with('message', __('category.admin.message.edit_fail'));
            }
        } catch (Exception $ex) {
            return redirect()->route('admin.categories.edit')->with('message', __('category.admin.message.edit_fail'));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category Category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            if ($category->parent_id != 0) {
                if (count($category->products)) {
                    return redirect()->route('admin.categories.index')->with('alert', __('category.admin.message.del_no_permit'));
                } else {
                    $category->delete();
                    if (Category::countChild($category->parent_id)>0) {
                        return redirect()->route('admin.categories.showChild', $category->parent_id)->with('message', __('category.admin.message.del'));
                    } else {
                        return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.del'));
                    }
                }
            } else {
                if (Category::countChild($category->id)>0) {
                    return redirect()->route('admin.categories.index')->with('alert', __('category.admin.message.del_no_permit'));
                } else {
                    $category->delete();
                    return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.del'));
                }
            }
        } catch (Exception $ex) {
            return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.del_fail'));
        }
    }
}
