<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
<<<<<<< HEAD

=======
    protected $redirectTo = '/';
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */



//login

       protected function getLogin()
    {
        return view("login");
    }




        public function postLogin(Request $request)
   {
<<<<<<< HEAD

=======
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452
    $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
    ]);

<<<<<<< HEAD
/*
=======

>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452

    $credentials = $request->only('email', 'password');

    if ($this->auth->attempt($credentials, $request->has('remember')))
<<<<<<< HEAD
    {
        return view("home");
    }

    //return view()->with("msjerror","credenciales incorrectas");
    return view("login");
    //return view("home");
*/
    $user = User::find("email");

    if($user->password == $request->password){
        return view("home");
    }else{
      return view("login");
    }


    }


//login

 //registro


        protected function getRegister()
    {
        return view("registro");
    }


=======
    {
        return view("home");
    }

    return view("login")->with("msjerror","credenciales incorrectas");
    //return view("home");

    }


//login

 //registro


        protected function getRegister()
    {
        return view("registro");
    }


>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452


        protected function postRegister(Request $request)

   {
    $this->validate($request, [
<<<<<<< HEAD
        'carnet' => 'required',
        'nombre' => 'required',
=======
        'name' => 'required',
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452
        'email' => 'required',
        'password' => 'required',
    ]);


    $data = $request;


    $user=new User;
<<<<<<< HEAD
    $user->carnet=$data['carnet'];
    $user->nombre=$data['nombre'];
    $user->email=$data['email'];
    //$user->password=bcrypt($data['password']);
    $user->password=$data['password'];
=======
    $user->name=$data['name'];
    $user->email=$data['email'];
    $user->password=bcrypt($data['password']);
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452


    if($user->save()){

         return "se ha registrado correctamente el usuario";

    }




}

//registro

protected function getLogout()
    {
        $this->auth->logout();

        Session::flush();

<<<<<<< HEAD
        return redirect('login');
=======
        return redirect()->route('login');;
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452
    }






}
