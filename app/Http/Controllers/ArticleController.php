<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Article;
use App\Models\ArticleFournisseur;
use App\Models\Category;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function store(Request $request){        
        $article = Article::create(['libelle'=>$request->libelle,
        'prix'=>$request->prix,'stock'=>$request->stock,'categorie_id'=>$request->categorie_id, 'ref'=>$request->ref]);
        $fournisseurs = json_decode($request->fournisseurs);
        $fournisseurs = array_map('intval', $fournisseurs);
        $returned_four=[];
        foreach($fournisseurs as $four){

            $four_article = ArticleFournisseur::create(['article_id'=>$article->id,'fournisseur_id'=>$four]);
            $returned_four[]=$four_article;
        }
        if ($request->hasFile('image')) {
            // $fileName = time() . '.' . $request->image->extension();
            // $request->image->storeAs('public/images', $fileName);
    
            // Save the image path in your article record
            $filePath = ImageHelper::handleImageUpload($request->image);
            $article->image=$filePath;
            $article->save();
        }
        
        return response()->json(['ok' => true, 'data' => $article, 'message' => 'Record added successfully']);
    }
        //return $returned_four;

        function countArticles($id){
            $total = Article::where('categorie_id',$id)->count();
            return response()->json(['ok'=>true,'data'=>$total,'message'=>'Counted successfully ']);
    
    
    
        }

   

    function all(Request $request){
        //$perPage = $request->has('limit') ? $request->limit : null;
    
        $all = Article::with([
            'categorie' => function ($query) {
                $query->whereNull('deleted_at')->select('id', 'libelle');
            },
            'fournisseurs:id'
        ])->orderByDesc('id')->get();
    
        // if ($perPage !== null) {
        //     $all = $query->paginate($perPage);
        //     $last_page= $all->lastPage();
        // } else {
        //     $all = $query->get();
        //     $last_page=null;
        // }
        //return $all;
    
        //$categs=Category::all();
        return response()->json(['ok'=>true,'data'=>['articles'=>$all,'categories'=>CategoryResource::collection(Category::all()), 'fournisseurs'=>Fournisseur::all()],
        'message'=>'operation was successfull']);




        // $all = Article::with(['categorie' => function ($query) {
        //     $query->whereNull('deleted_at')
        //     ->select('id', 'libelle'); // Select only the id and libelle columns
        // }])->paginate(2);
        //         return response()->json(['ok'=>true,'data'=>['articles'=>$all->items(), 'last_page'=>$all->lastPage()],'message'=>'Counted successfully ']);

    }

    function delete($id){
        $article=Article::findOrfail($id);
        $article->fournisseurs()->detach();
        $deleted = Article::where('id',$id)->delete();
       return response()->json(['ok'=>true,'data'=>$deleted,'message'=>'Record deleted successfully']);
    }

    function update(Request $request,$id){
       $article = Article::findOrfail($id);        

        if ($article) {
            $article->update($request->except(['fournisseurs','image']));
            if($article->fournisseurs){
                $article->fournisseurs()->sync($request->fournisseurs);

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
