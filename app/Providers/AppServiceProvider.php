<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('*',function($view) {
            
            if(\Auth::check()){
				$namafoto = (\Auth::user()->image == null) ? 'no_photo.png': \Auth::user()->image;
				$namafoto_300 = (\Auth::user()->image == null) ? 'no_photo_300.png': \Auth::user()->image;
				$foto = asset('/images/users/'.$namafoto);
				$foto_300 = asset('/images/users/'.$namafoto_300);
				
				$view->with('foto', $foto);
				$view->with('foto_300', $foto_300);

			}
				
				
		
        });
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
