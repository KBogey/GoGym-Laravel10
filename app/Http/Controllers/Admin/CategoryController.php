<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    public function create()
    {
        $category = new Category();
        $category->fill([
            'label' => "News",
        ]);
        return view('admin.categories.form', [
            'category' => $category
        ]);
    }

    public function store(CategoryFormRequest $request)
    {
        $category = Category::create($request->validated());
        return to_route('admin.category.index')->with('success', 'La catégorie a été ajoutée');
    }

    public function edit(Category $category)
    {

        return view('admin.categories.form', [
            'category' => $category
        ]);
    }

    public function update(CategoryFormRequest $request, Category $category)
    {
        $category->update($request->validated());
        return to_route('admin.category.index')->with('success', 'La catégorie a été modifiée');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.category.index')->with('success', 'La catégorie a été supprimée');
    }
}
