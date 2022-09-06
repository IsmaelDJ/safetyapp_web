<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rule;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $categories = Category::orderBy('position')->paginate(categoriesPerPage());
        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $category = new Category();

        $path = uploadFile($request,'image');
        $category->image = $path;
        $category->name = $request->name;
        $category->position = $request->position;

        $category->save();
        return redirect()->route('categories.index')->with('success', "Catégorie ajouté");
    }


    public function show(Category $category)
    {
        $rules = Rule::where('category_id', $category->id)->paginate(rulesPerPage());
        return view('categories.show', compact('category', 'rules'));
    }


    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        if ($request->hasFile('image')){
            $request->validate(
                ['image' => 'image|mimes:jpeg,png,jpeg,gif']
            );

            if (file_exists(public_path($category->image)) AND !empty($category->image)){
                unlink(public_path($category->image));
            }
            $path = uploadFile($request,'image');
            $category->image = $path;
        }

        $request->validate(
            [
                'name' => 'required',
                'position'=> 'required'
            ]
        );
        $category->name = $request->name;
        $category->position = $request->position;
        $category->update();
        return redirect()->route('categories.index')->with('success', "Catégorie modifiée");
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', "Catégorie supprimé !");
    }
}
