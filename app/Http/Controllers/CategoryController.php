<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view("dashboard", compact('categories'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Category::create($data); 

        return redirect()->route('dashboard')->with('success', 'Category added successfully');
    }

    public function update(Category $category, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $category->update($data);

        return redirect()->route('dashboard')->with('success', 'Category edited successfully');
    }

    public function delete(Category $category){
        $category->delete();
        // dd($route);
        return redirect()->route('homepage')->with('success','Category moved to bin');
    }
    public function restore(Category $category){
        $category->restore();
        return redirect()->route('dashboard')->with('success', 'Category restored successfully');

    }

    public function destroy(Category $category){
        $category->forceDelete();
        // dd($category);
        return redirect()->route('homepage')->with('success','Category deleted permanently');
    }

}
