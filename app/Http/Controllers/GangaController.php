<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Ganga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $gangas = Ganga::orderBy('title', 'ASC')->paginate(5);
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
    public function store(Request $request){
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
        move_uploaded_file($_FILES['image']['tmp_name'], "./uploads/{$request->get('image')}");
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
