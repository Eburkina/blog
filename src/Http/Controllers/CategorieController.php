<?php

namespace Eburkina\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Eservice\Blog\Http\Requests\StoreCategorieRequest;
use Eservice\Blog\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategorieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categorie = Category::paginate(4);
        return view('Blog::pages.backend.categories.index', compact('categorie'));
    }
    
    public function create(){
        return view('Blog::pages.backend.categories.create',[    "categorie" => new Category(), 'button'=>'Ajouter' ]);
    }
    
    public function store(StoreCategorieRequest $request){
        // dd($request->all());
        Category::create($request->all());
        return redirect()->route('categorie-list')->with('success','Catégorie créée avec success.');
    }

    public function edit($uuid){
        return view('Blog::pages.backend.categories.create', [ "categorie" => Category::where('uuid', $uuid)->first(), 'button'=>'Modifier']);
    }

    public function update(Request $request, $uuid){
                
        Category::where('uuid', $uuid)->update(['titre'=> $request->titre]);
        return redirect()->route('categorie-list')->with('success','Catégorie modifiée avec success.');
    }
    
    public function delete($uuid){  
        Category::where('uuid', $uuid)->delete();
        return redirect()->route('categorie-list')->with('success','Catégorie supprimée avec success.');
       
    }
}