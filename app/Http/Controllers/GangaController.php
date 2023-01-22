<?php

namespace App\Http\Controllers;

use App\Http\Requests\GangaEdit;
use App\Http\Requests\GangaPost;
use App\Models\Categoria;
use App\Models\Ganga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GangaController extends Controller
{
    public function __construct() {
        $this->middleware('auth',['only' => ['create', 'store', 'edit', 'update', 'destroy', 'addLike', 'addDislike']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $gangas = Ganga::orderBy('title', 'ASC')->paginate(5);
        return view('layouts/gangas.index', compact("gangas"));
    }

    public function gangasDestacadas() {
        $gangas = Ganga::orderBy('likes', 'DESC')->paginate(5);
        return view('layouts/gangas.index', compact("gangas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categorias = Categoria::get();
        return view('layouts/gangas.create', compact("categorias"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GangaPost $request){
        $ganga = new Ganga();
        $ganga->title = $request->get('title');
        $ganga->description = $request->get('description');
        $ganga->url = $request->get('url');
        $ganga->category = $request->get('category');
        $ganga->likes = 0;
        $ganga->dislikes = 0;
        $ganga->price = $request->get('price');
        $ganga->price_sale = $request->get('price_sale');
        $ganga->available = 1;
        $ganga->user_id = Auth::id();
        $ganga->save();
        $imagen_ganga = "$ganga->id-ganga-severa.jpg";
        $request->file('image')->storeAs('public/img', $imagen_ganga);
        return view('layouts/gangas.detalle', compact("ganga"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $ganga = Ganga::find($id);
        return view('layouts/gangas.detalle', compact("ganga"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $ganga = Ganga::findOrFail($id);
        $categorias = Categoria::get();
        return view('layouts/gangas.edit', compact("ganga", "categorias"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GangaEdit $request, $id){
        $ganga = Ganga::findOrFail($id);
        $ganga->title = $request->get('title');
        $ganga->description = $request->get('description');
        $ganga->url = $request->get('url');
        $ganga->category = $request->get('category');
        $ganga->price = $request->get('price');
        $ganga->price_sale = $request->get('price_sale');
        $ganga->save();
        $imagen_ganga = "$ganga->id-ganga-severa.jpg";
        if ($request->file('image')) {
            $request->file('image')->storeAs('public/img', $imagen_ganga);
        }
        return view('layouts/gangas.detalle', compact("ganga"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Ganga::findOrFail($id)->delete();
        $gangas = Ganga::orderBy('title', 'ASC')->paginate(5);
        return view('layouts/gangas.index', compact("gangas"));
    }

    public function profile(){
        $idUser = Auth::id();
        $user = User::findOrFail($idUser);
        $gangas = Ganga::get();
        $gangasUser = array();
        foreach ($gangas as $ganga) {
            if ($ganga->user_id == $idUser) {
                $gangasUser[] = $ganga;
            }
        }
        return view('layouts/gangas.profile', compact("gangasUser", "user"));
    }

    public function addLike($idGanga) {
        $ganga = Ganga::findOrFail($idGanga);
        $ganga->likes = $ganga->likes + 1;
        $ganga->save();
        return view('layouts/gangas.detalle', compact("ganga"));
    }

    public function addDislike($idGanga) {
        $ganga = Ganga::findOrFail($idGanga);
        $ganga->dislikes = $ganga->dislikes + 1;
        $ganga->save();
        return view('layouts/gangas.detalle', compact("ganga"));
    }
}
