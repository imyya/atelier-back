<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Helpers\JsonResponse;
use App\Models\ArticleVente;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleVenteRequest;
use App\Http\Resources\ArticleVenteResource;
use App\Http\Resources\ResponseResource;

class ArticleVenteController extends Controller
{
    public function store(ArticleVenteRequest $request){
       // return response()->json($request);
        $article=ArticleVente::create($request->except(['confection','image']));
        // $article->confections()->sync(array_map('intval',json_decode($request->confection)));
        $article->confections()->sync($request->confection);
        if ($request->hasFile('image')) {
            $filePath = ImageHelper::handleImageUpload($request->image);
            $article->image=$filePath;
            $article->save();

        }
        //return response()->json($article);

        //return new ArticleVenteResource($article);
        return  ResponseResource::makeResponse(true,new ArticleVenteResource($article),'Record added');
        // return JsonResponse::response(true,ArticleVenteResource::collection($article),'Record added successfully');

        //return response()->json(['ok'=>true,'data'=>$article,'message'=>'Record added successfully']);
    }

    public function index(){
        $articles=ArticleVente::all();
       // return $articles;
        return  ResponseResource::makeResponse(true, ArticleVenteResource::collection($articles),'Record added');
    }

    public function delete($id){
        $article=ArticleVente::findOrfail($id);
        $article->confections()->detach();
        $deleted = ArticleVente::where('id',$id)->delete();
       // return response()->json($deleted);
       return  ResponseResource::makeResponse(true,new ArticleVenteResource($article),'Record deleted successfully');
    }

    public function update(Request $request,$id){
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
    
            return  ResponseResource::makeResponse(true,new ArticleVenteResource($article),'Record updated successfully');
        } else {
            return  ResponseResource::makeResponse(false,new ArticleVenteResource($article),'Record doesnt exist');
        }
    }
}
