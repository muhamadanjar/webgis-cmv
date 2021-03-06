<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Services\AnjarService;
//use App\Lib\AHelper;
use Carbon\Carbon;
use Session;
use App\User;

class CAuthController extends Controller {

    protected $redirectTo = 'map';
    protected $redirect = 'home';
    
    protected $loginPath = 'admin/login';
    public function __construct(Guard $auth){
        $this->auth = $auth;
        
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin() {

        return view('cauth.login')->withStatus_login(1); //or just use the default login page
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
            'username' => 'required', 
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        
        $checkuser = User::where('username',$request->username)->first();
        if ($checkuser->isactive == 1) {
            if (Auth::attempt($credentials,$request->has('remember'))){   
                $user = User::find(Auth::user()->id);
                $user->latestlogin = Carbon::now();
                $user->isonline = 1;
                $user->save();
                //$this->_s->updateSessionMenu();
                //dd(redirect()->intended());
                //exit();
                return redirect()->intended($this->redirectPath());
            }
        }

        return redirect($this->loginPath())
            ->withInput($request->only('username', 'remember'))
            ->withErrors([
                'username' => $this->getFailedLoginMessage(),
            ]);
    }

    public function getLogout(){
        $user = User::find($this->auth->user()->id);
        $user->isonline = 0;
        if($user->save()){
            $this->auth->logout();
        }else{
            $this->auth->logout();
        }
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    protected function getFailedLoginMessage(){
        return 'Username dan password yang anda masukan salah.';
    }

    public function redirectPath(){
        if (property_exists($this, 'redirect')){
            return $this->redirect;
        }

        return property_exists($this, 'redirect') ? $this->redirect : '/home';
    }

    public function loginPath(){
        return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
    }

    
}
