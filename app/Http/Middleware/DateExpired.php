<?php namespace App\Http\Middleware;

use Closure;

class DateExpired {


	public function handle($request, Closure $next){

		$date_ex = date('2015-04-01');
		if ($date_ex > date('Y-m-d')) {
			return response('Belum boleh yah.', 401);
		}
		return $next($request);
	}

}
