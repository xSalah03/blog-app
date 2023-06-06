<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories()
    {
        $categories = Category::all();
        return view('pages.categories.list-categories', compact('categories'));
    }

    public function createCategoryPage()
    {
        return view('pages.categories.create-category');
    }

    public function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
        ]);
        $cat = new Category();
        $cat->name = $request->name;
        $cat->save();
        flashy()->success('Category saved successfully');
        return redirect()->route('allCategories');
    }

    public function updateCategoryPage(Category $category)
    {
        return view('pages.categories.update-category', compact('category'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:4',
        ]);
        $category->name = $request->name;
        $category->save();
        flashy()->success('Category updated successfully');
        return redirect()->route('allCategories');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        flashy()->success('Category deleted successfully');
        return redirect()->route('allCategories');
    }
}
