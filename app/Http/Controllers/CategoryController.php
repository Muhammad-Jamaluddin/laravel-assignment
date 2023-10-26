<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ParentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add()
    {
       return view('test.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
        ]);
        // dd($request);
        $create = new Category();
        $create->category = $request->category;
        $create->save();
        return redirect('category/show')->with('success','Category has been Successfully Added..!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $categories = Category::get();
        return view('test.category.view',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category,$id)
    {
        $edit = Category::find($id);
        return view('test.category.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category,$id)
    {
        $request->validate([
            'category' => 'required',
        ]);
        // dd($request);
        $create = Category::find($id);
        $create->category = $request->category;
        $create->update();
        return redirect('category/show')->with('success','Category has been Successfully Updated..!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category,$id)
    {
        $delete = Category::find($id);
        $delete->delete();
        return redirect('category/show')->with('success','Deleted Successfully...');
    }
}
