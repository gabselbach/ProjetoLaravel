<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\User;
use App\Imagens;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

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
        $temEmail = DB::table('users')->where('users.email', '=', "$usuario->email")->count();
        if($temEmail){
            return redirect()->route('user.create')->with('Error','Email já cadastrado .');
        }else{
            $usuario->descricao = $request->descricao;
            if($request->hasFile('imagem')){
                $extension = $request->imagem->extension();
                $nome = uniqid(date('hisYmd'));
                $nomearquivo = "{$nome} .{$extension}";
                $upload = $request->imagem->storeAs('users',$nomearquivo);
                $usuario->imagem = $upload;
            }else{
                $usuario->imagem ='0';
            }
            $usuario->password =Hash::make(0);
            $usuario->save();
            return view('home');
        }
       
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
          $imagens = DB::table('users')
            ->join('imagens', 'users.id', '=', 'imagens.user_id')
            ->select('imagens.imagem')
            ->where('users.id', '=', $id)
            ->get();
            $img = [];
             foreach ($imagens as $i){
               
                $img[] = $i->imagem;
             }
        return view('show',compact('usuario','img'));
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
        $usuario->password = $usuario->password ;
        if($request->hasFile('imagem')){
            Storage::delete($usuario->imagem);
            $nome = uniqid(date('hisYmd'));
            $extension = $request->imagem->extension();
            $nomearquivo = "{$nome} .{$extension}";
            $upload = $request->imagem->storeAs('users',$nomearquivo);
            $usuario->imagem = $upload;
        }
        $usuario->update();
        return redirect()->route('user.index')->with('successMsg','Usuário Alterado com sucesso .');  
    }
    public function editPassword(Request $request){
        $id = $request->id;
        $email = $request->email;
        $resp =  DB::table('users')->where([
                ['id', '=', $id],
                ['email', '=', "$email"],
            ])->count();
        if($resp){
             DB::table('users')
            ->where([
                ['id', '=', $id],
                ['email', '=', "$email"],
            ])
            ->update(['password' => Hash::make($request->password)]);
             return redirect('home')->with('successMsg','Senha Alterada .');  
            
        }else{

        }
       
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
         if($usuario->imagem!=null){
            Storage::delete($usuario->imagem);
        }
         $imagens = DB::table('users')
            ->join('imagens', 'users.id', '=', 'imagens.user_id')
            ->select('imagens.imagem')
            ->where('users.id', '=', $id)
            ->get();
             foreach ($imagens as $i){
               Storage::delete($i->imagem);
             }
        $usuario->delete();
        return redirect()->route('user.index')->with('successMsg','Usuário removido .');  

    }
    public function imagemPerfil(Request $request)
    {
        $id = $request->id;
        $usuario = User::findOrFail($id);
        if($usuario->imagem!='0'){
            Storage::delete($usuario->imagem);
        }
        if($request->hasFile('imagem')){
            $nome = uniqid(date('hisYmd'));
            $extension = $request->imagem->extension();
            $nomearquivo = "{$nome} .{$extension}";
            $upload = $request->imagem->storeAs('users',$nomearquivo);
            $usuario->imagem = $upload;
            DB::table('users')
                ->where('id', '=', $id)
                ->update(['imagem' => $usuario->imagem]);

        }
        return redirect()->route('user.index')->with('successMsg','Foto Alterado com sucesso.');
    }
}
