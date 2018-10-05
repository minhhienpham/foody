<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Models\Category;
use App\Models\Image;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use File;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['images','category'])->sortable()->orderBy('created_at', 'desc')->paginate(config('paginate.number_products'));
        return view('admin.pages.products.index', compact('products'));
    }

    /**
    * Display the specified resource.
    *
    * @param int $id id

    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $product = Product::with(['images','category','store'])->find($id);
        return view('admin.pages.products.show', compact('product'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $userLogin = Auth::user();
        if ($userLogin->role_id == 2) {
            $stores = Store::where('manager_id', $userLogin->id)->pluck('name', 'id');
        } else {
            $stores = Store::pluck('name', 'id');
        }
        // $categories = Category::pluck('name', 'id');
        return view('admin.pages.products.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Http\Requests\CreateProductRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        try {
            $product = Product::create($request->all());
            if (is_array(request()->file('image'))) {
                foreach (request()->file('image') as $image) {
                    $newImage = $image->getClientOriginalName();
                    $image->move(public_path(config('define.product.images_path_products')), $newImage);
                    $imagesData[] = [
                        'product_id' => $product->id,
                        'path' => $newImage
                    ];
                }
                $product->images()->createMany($imagesData);
            }
            return redirect()->route('admin.products.index')->with('message', __('product.admin.create.create_success'));
        } catch (Exception $ex) {
            return redirect()->route('admin.products.index')->with('alert', __('product.admin.create.create_fali'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\Product $product product
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $stores = Store::pluck('name', 'id');
         // $categories = Category::pluck('name', 'id');
        $images = $product->images;
        return view('admin.pages.products.edit', compact('product', 'stores', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param App\Models\Product       $product product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $product->update($request->all());
            if (is_array(request()->file('image'))) {
                foreach (request()->file('image') as $image) {
                    $newImage = $image->getClientOriginalName();
                    $image->move(public_path(config('define.product.images_path_products')), $newImage);
                    $imagesData[] = [
                        'product_id' => $product->id,
                        'path' => $newImage
                    ];
                }
                $product->images()->createMany($imagesData);
            }
            return redirect()->route('admin.products.index')->with('message', __('product.admin.edit.update_success'));
        } catch (Exception $e) {
            return redirect()->route('admin.products.index')->with('alert', __('product.admin.edit.update_fail'));
        }
    }

    /**
      * Remove the specified resource from storage.
      *
      * @param App\Models\Product $product product
      *
      * @return \Illuminate\Http\Response
      */
    public function destroy(Product $product)
    {
        try {
            foreach ($product->images as $image) {
                if ($image->path&&File::exists(public_path('/images/products/' . $image->path))) {
                    File::delete(public_path('/images/products/' . $image->path));
                }
            }
            $product->delete();
            return redirect()->route('admin.products.index')->with('message', __('product.admin.show.delete_success'));
        } catch (Exception $e) {
            return redirect()->route('admin.products.index')->with('alert', __('product.admin.show.delete_fail'));
        }
    }
}
