<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Category;

class CategoryComposer
{
  /**
   * Bind data to the view.
   *
   * @param View $view vategory
   *
   * @return void
  */
    public function compose(View $view)
    {
        $categories = Category::where('parent_id', '!=', 0)->get();
        $view->with('categories', $categories);
    }
}
