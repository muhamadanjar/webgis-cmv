<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class LevelAdmin {
	protected $auth;
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function handle($request, Closure $next){
		if ($this->auth->guest()){
			if ($request->ajax()){
				return response('Unauthorized.', 401);
			}else{
				return redirect()->guest('admin/login');
			}
		}else{
			if ($this->auth->user()->level != 1) {
				return redirect()->guest('admin/login');
			}
		}

		return $next($request);
	}

}
