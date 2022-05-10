<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rules = Rule::paginate(5);
        return view('rules.index', compact('rules'));
    }


    public function create()
    {
        $categories = Category::get();
        return view('rules.create', compact('categories'));
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

        return redirect()->route('rules.index')->with('success', 'Règle ajouté !');
    }


    public function show(Rule $rule)
    {
        return view('rules.show', compact('rule'));
    }


    public function edit(Rule $rule)
    {
        return view('rules.edit', compact('rule'));
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
        return redirect()->route('rules.index')->with('success', 'Règle modifiée !');
    }


    public function destroy(Rule $rule)
    {
        $rule->delete();
        return redirect()->back()->with('success', "Règle supprimé !");
    }
}
