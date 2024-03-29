<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        if(Gate::allows('doAdvanced')) abort(401);
    }

    public function index()
    {
        $rules = Rule::paginate(rulesPerPage());
        return view('rules.index', compact('rules'));
    }


    public function create($category_id)
    {
        $categories = Category::get();
        return view('rules.create', compact('categories', 'category_id'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'category_id' => 'required|integer',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                'fr' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
                'ar' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
                'ng' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'
            ]
        );
        $rule = new Rule();
        $rule->category_id = $request->category_id;
        $rule->description = $request->description;
        $rule->image = uploadFile($request, 'image','rule_image');
        $rule->fr = uploadFile($request, 'fr','rule_fr');
        $rule->ar = uploadFile($request, 'ar','rule_ar');
        $rule->ng = uploadFile($request, 'ng', 'rule_ng');

        $rule->save();

        return redirect()->route('categories.show', [$request->category_id])->with('success', 'Règle ajouté à la catégorie!');
    }


    public function show(Rule $rule)
    {
        $category = $rule->category;
        $sameCategoryRules = Rule::where('category_id', $category->id)->paginate(rulesShowPerPage());
        return view('rules.show', compact('rule','sameCategoryRules'));
    }


    public function edit(Rule $rule)
    {
        $categories = Category::where('id','!=',$rule->category_id)->get();
        return view('rules.edit', compact('rule', 'categories'));
    }


    public function update(Request $request, Rule $rule)
    {
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif']);
            if (file_exists(public_path($rule->image)) and !empty($rule->image)) {
                unlink(public_path($rule->image));
            }
            $rule->image = uploadFile($request, 'image','rule_image');
        }
        if ($request->hasFile('fr')) {
            $request->validate(['fr' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
            if (file_exists(public_path($rule->fr)) and !empty($rule->fr)) {
                unlink(public_path($rule->fr));
            }
            $rule->fr = uploadFile($request, 'fr','rule_fr');
        }
        if ($request->hasFile('ar')) {
            $request->validate(['ar' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
            if (file_exists(public_path($rule->ar)) and !empty($rule->ar)) {
                unlink(public_path($rule->ar));
            }
            $rule->ar = uploadFile($request, 'ar','rule_ar');
        }
        if ($request->hasFile('ng')) {
            $request->validate(['ng' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
            if (file_exists(public_path($rule->ng)) and !empty($rule->ng)) {
                unlink(public_path($rule->ng));
            }
            $rule->ng = uploadFile($request, 'ng','rule_ng');
        }

        $request->validate(
            [
                'category_id' => 'required|integer',
                'description' => 'required'
            ]
        );

        $rule->category_id = $request->category_id;
        $rule->description = $request->description;

        $rule->update();
        return redirect()->route('categories.show', [$request->category_id])->with('success', 'Règle modifiée !');
    }


    public function destroy(Rule $rule)
    {
        $category = $rule->category;
        $rule->delete();
        return redirect()->route('categories.show', $category)->with('success', "Règle supprimé !");
    }
}
