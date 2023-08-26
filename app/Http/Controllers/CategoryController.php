<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function store(CategoryRequest $request){
       
       
        $categ = Category::create(['libelle'=>$request->libelle]);
        return response()->json(['ok'=>true,'data'=>$categ,'message'=>"Record added successfully"]);
    }

    public function index(){
        $categs = Category::paginate(0);
        return response()->json(['ok'=>true,'data'=>['categories'=>$categs->items(), 'last_page'=>$categs->lastPage()], 'message'=>'Record sent successfully']);

    }

    public function update($id,Request $request){
        $cat= Category::find($id);
        if($cat && $cat->libelle==$request->libelle){
            return response()->json(['ok'=>false, 'data'=>$cat, 'message'=>'record unchanged']);

        }
        else if($cat->libelle!=$request->libelle){
             
            $cat = $cat->update(['libelle'=>$request->libelle]);
            return response()->json(['ok'=>true,'data'=>$cat,'message'=>'record updated successfully']);

        }
        return response()->json(['error'=>'Not Found']);

    }

    public function find(Request $request){
        $categ = Category::where('libelle',$request->libelle)->first();

        return response()->json(['ok'=>true,'data'=>$categ, 'message'=>'found']);

    }

    public function delete(Request $request){
       $deleted = Category::whereIn('id',$request->ids)->delete();
       return response()->json(['ok'=>true,'data'=>$deleted,'message'=>'Records deleted successfully']);
    }

    public function all(){
        $categs= Category::all();
        return response()->json(['ok'=>true,'data'=>$categs,'message'=>'Records deleted successfully']);

    }

 


}

