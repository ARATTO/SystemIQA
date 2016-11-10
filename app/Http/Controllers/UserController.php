<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use App\User;
use App\Rol;
use Laracasts\Flash\Flash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
     public function __construct()
   	{
   		$this->middleware('auth');
   	}

    public function index(Request $request)
    {
          $users = User::carnet($request->carnet)->orderBy('id','DESC')->paginate(6);
          $rols = Rol::all();
          //flash()->overlay('Modal Message', 'Modal Title');
          return view('users.index')->with(['users'=>$users,'rols'=>$rols]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rols = Rol::all();

        //Flash::success("se ha registrado de forma exitosa");

        return view('users.create')->with(['rols'=>$rols]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        //Imagen
        if($request->file('foto'))
        {
          $Foto = $request->file('foto');
          $nombreFoto = 'systemiqa' . time() . '.' . $Foto->getClientOriginalExtension();
          $path = public_path() . "/dist/img/systemiqa/fotosPerfil";
          $Foto->move($path, $nombreFoto);
        }else{
          //Foto por Default
          $nombreFoto = 'eternoslimpio.jpg';
        }

        $user = new User($request->all());

        //Fin Imagen

        $user->password = bcrypt($request->password);
        $user->foto = $nombreFoto;
        $user->save();

        Flash::info("se ha registrado ".$user->nombre." de forma exitosa");
        //flash('Welcome Aboard!');
        //flash()->overlay('Modal Message', 'Modal Title');
        return redirect()->route('users.index');

        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $user = User::find($id);
      //$user->password = $user->bycrypt($);
      $rols = Rol::all();
      //Flash::success("se ha registrado de forma exitosa");

      return view('users.edit')->with(['user'=>$user,'rols'=>$rols]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::find($id);
        $Fvieja = $user->foto;

        $user->fill($request->all());

        if($request->file('foto') != null)
        {
          $Foto = $request->file('foto');
          $nombreFoto = 'systemiqa' . time() . '.' . $Foto->getClientOriginalExtension();
          $path = public_path() . "/dist/img/systemiqa/fotosPerfil";
          $Foto->move($path, $nombreFoto);

          $rutaF = $path."/".$Fvieja; //Borra archivo viejo
          if(file_exists($rutaF) & $Fvieja != "eternoslimpio.jpg"){
              unlink($rutaF); //Borra archivo de foto
          }

          $user->foto = $nombreFoto;
        }else{
          $user->foto = $Fvieja; //Guarda vieja foto
        }
        $user->save();

        Flash::success("Se ha EDITADO ".$user->nombre." de forma exitosa");
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);

        $path = public_path() . "/dist/img/systemiqa/fotosPerfil";

        $rutaF = $path."/".$user->foto;
        if(file_exists($rutaF) & $user->foto != "eternoslimpio.jpg"){
            unlink($rutaF); //Borra archivo de foto
        }

        $user->delete();

        Flash::error("Se ha ELIMINADO usuario ".$user->nombre." de forma exitosa");
        return redirect()->route('users.index');

        //dd($id);
    }
}
