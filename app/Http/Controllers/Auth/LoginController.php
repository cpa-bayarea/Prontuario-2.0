<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Permission;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        
           
        $this->middleware('guest')->except('logout');
    }

    /**
     * Return the nu_matricula from user.
     *
     * @return string $nu_matricula
     */
    public function username()
    {    
        return 'username';
    }

    protected function credentials(Request $request) {
            
            $user = User::with('roles')->where('username',$request->username)->first();
            $tipo_user = $user->roles[0]->id;
            
            $permissions = Permission::with('roles')->get();
            foreach($permissions as $permission){
                
                $roles = $permission->roles;
               foreach($roles as $role){
                   
                   if($role->id == $tipo_user){
                       
                      $array_permission[] =  $permission->nome;
                      
                   }
                   
               }
               
               
            }
            
            //session() = 'asdasdasdasd';
            dd( auth()->user() );
            dd($array_permission);
        
        return array_merge($request->only($this->username(), 'password'), ['status' => 'A']);
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        $user = User::where($this->username(), $request->{$this->username()})->first();

        if ($user && \Hash::check($request->password, $user->password) && $user->status == 'P') {
            $errors = [$this->username()
            => trans('Seu cadastro encontra-se pendente, Por Favor, comunique ao seu Supervisor!')];
        }
        if ($user && \Hash::check($request->password, $user->password) && $user->status == 'I') {
            $errors = [$this->username() => trans("Você não possui mais acesso ao sistema!")];
        }
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}
