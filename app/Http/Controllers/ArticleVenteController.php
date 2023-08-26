<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\ArticleVente;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleVenteRequest;

class ArticleVenteController extends Controller
{
    public function store(ArticleVenteRequest $request){
        $article=ArticleVente::create($request->except('confection'));
        // $article->confections()->sync(array_map('intval',json_decode($request->confection)));
        //$article->confections()->sync($request->confection);
        if ($request->hasFile('image')) {
            $filePath = ImageHelper::handleImageUpload($request->image);
            $article->image=$filePath;
            $article->save();
        }

        return response()->json(['ok'=>true,'data'=>$article,'message'=>'Record added successfully']);
    }

    public function index(){
        $articles=ArticleVente::all();
        return response()->json(['ok'=>true, 'data'=>$articles, 'message'=>'All records']);
    }

    public function delete($id){
        $article=ArticleVente::findOrfail($id);
        $article->confections()->detach();
        $deleted = ArticleVente::where('id',$id)->delete();
       return response()->json(['ok'=>true,'data'=>$deleted,'message'=>'Record deleted successfully']);
    }

    public function update($id,Request $request){
        $article = ArticleVente::findOrfail($id);        

        if ($article) {
            $article->update($request->except(['confection','image']));
            if($article->confection){
                $article->confections()->sync($request->confection);

            }
            if($request->image){
                $path = ImageHelper::handleImageUpload($request->image);
                $article->image=$path;
                $article->save();
            }
    
            return response()->json(['ok' => true, 'data' => $article, 'message' => 'record updated successfully']);
        } else {
            return response()->json(['ok' => false, 'message' => 'Article not found'], 404);
        }
    }
}
