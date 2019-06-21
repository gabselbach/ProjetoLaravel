<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
         return view('list',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new User;
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->descricao = $request->descricao;
        $extension = $request->imagem->extension();
        $nome = uniqid(date('hisYmd'));
        $nomearquivo = "{$nome} .{$extension}";
        $upload = $request->imagem->storeAs('users',$nomearquivo);
        $usuario->imagem = $upload;
        $usuario->password =0;
        $usuario->save();
        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $usuario = User::findOrFail($id);
        return view('show',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario= User::findOrFail($id);
        return view('edit',compact('usuario'));

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
        $usuario = User::findOrFail($id);
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->descricao = $request->descricao;
        $usuario->password =0;
        if($request->hasFile('imagem')){
            Storage::delete($usuario->imagem);
            $nome = uniqid(date('hisYmd'));
            $extension = $request->imagem->extension();
            $nomearquivo = "{$nome} .{$extension}";
            $upload = $request->imagem->storeAs('users',$nomearquivo);
            $usuario->imagem = $upload;
        }
        $usuario->update();
        return view('home');
    }
    public function editPassword(Request $request, $id){
        DB::table('users')
            ->where('id', $id)
            ->update(['password' => $request->password]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "ola";
        $usuario = User::findOrFail($id);
        Storage::delete($usuario->imagem);
        $usuario->delete();
        return redirect()->route('user.index');  
    }
}
