<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lib\AHelper;
use App\Lib\Statistik;
use Illuminate\Http\Request;

class HubungiCtrl extends Controller {

	public function __construct($value=''){
		$this->middleware('auth');
	}

	public function getIndex(){
		$pesan = \App\Hubungi::orderBy('idhubungi','ASC')->get();
		return view('master.hubungiList')->withPesan($pesan);
	}

	public function getTambah(){
		return view('master.hubungiAddEdit');
	}

	
	public function postProses(Request $request){
		try{
			$rules = [
				'name' => 'required|min:3|max:80',
				'email' => 'required|unique:users',
			];
			$messages = [
				'name.required' => 'Nama harus diisi!',
				'email.required' => 'Email harus di isi',
			];
			$validator = \Validator::make($request->all(), $rules,$messages);
			if(!$validator->passes()) {
				return redirect('modul-add')
				->with('message', \AHelper::format_message('Error,Coba lagi','cancel'))
				->withErrors($validator)
				->withInput();
			}

			$hubungi = new \App\Hubungi();
			$hubungi->name = $request->name;
			$hubungi->email = $request->email;
			$hubungi->subjek = $request->subjek;
			$hubungi->pesan = $request->pesan;
			$hubungi->tanggal = Carbon::now();
			$hubungi->jam = Carbon::now()->toTimeString();;
			$hubungi->dibaca = 0;
			$hubungi->ip = Statistik::ip_user();
			$hubungi->save();


		} catch (Exception $e) {
			\DB::rollback();
		    throw $e;
		}
		return redirect('admin/hubungi');
	}


	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
