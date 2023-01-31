<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ganga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GangaController extends Controller {
    public function __construct() {
        $this->middleware('auth:sanctum',['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $gangas = Ganga::get();
        return $gangas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $ganga = new Ganga();
        $ganga->title = $request->title;
        $ganga->description = $request->description;
        $ganga->url = $request->url;
        $ganga->category = $request->category;
        $ganga->likes = 0;
        $ganga->dislikes = 0;
        $ganga->price = $request->price;
        $ganga->price_sale = $request->price_sale;
        $ganga->available = 1;
        $ganga->user_id = 6;
        $ganga->save();
        return response()->json($ganga, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function show(Ganga $ganga){
        return response()->json($ganga, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ganga $ganga){
        $ganga->title = $request->title;
        $ganga->description = $request->description;
        $ganga->url = $request->url;
        $ganga->likes = $request->likes;
        $ganga->dislikes = $request->dislikes;
        $ganga->price = $request->price;
        $ganga->price_sale = $request->price_sale;
        $ganga->save();
        return response()->json($ganga);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ganga $ganga){
        $ganga->delete();
        return response()->json(null, 204);
    }
}
