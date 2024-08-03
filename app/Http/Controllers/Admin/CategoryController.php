<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW= 'admin.categories.';
    public function index()
    {
        $data= Category::query()->latest('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {  
        $data = $request->except('image');
        // dd($request);
        if($request->hasFile('image')){
            $data['image']= Storage::put('categories', $request->file('image'));
        }else{
            $data['image']="";
        }
       Category::query()->create($data);
       return redirect()->route(self::PATH_VIEW.'index')->with('message', 'Thêm danh mục thành công');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        dd($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view(self::PATH_VIEW.__FUNCTION__, compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->except('image');
        if($request->hasFile('image')){
            $data['image']= Storage::put('categories', $request->file('image'));
        }else{
            $data['image']= $category->image;  
      }
       $category->update($data);
       return redirect()->route(self::PATH_VIEW.'index')->with('message', 'Sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route(self::PATH_VIEW.'index')->with('message', 'Xóa danh mục thành công');

    }
}
