<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WebCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug){
		$post = \App\Post::join(DB::raw("(SELECT post.postid,string_agg(terms.name,',') as categorypost, 
				array_to_string(array_agg(terms.termid),';') as kategoripostid
			FROM post
			INNER JOIN term_relation ON post.postid = term_relation.postid
			INNER JOIN term_taxonomy ON term_relation.termtaxonomyid = term_taxonomy.termtaxonomyid
			INNER JOIN terms ON term_taxonomy.termid = terms.termid 
			WHERE term_taxonomy.taxonomy = 'post_category'
			GROUP BY post.postid
		) as postcategory"),
		function($join){
			$join->on('post.postid', '=', 'postcategory.postid');
		})
		->leftjoin(DB::raw("(SELECT post.postid,string_agg(terms.name,',') as tagpost,
			array_to_string(array_agg(terms.termid),';') as tagpostid 
			FROM post
			INNER JOIN term_relation ON post.postid = term_relation.postid
			INNER JOIN term_taxonomy ON term_relation.termtaxonomyid = term_taxonomy.termtaxonomyid
			INNER JOIN terms ON term_taxonomy.termid = terms.termid 
				WHERE term_taxonomy.taxonomy = 'post_tag'
				GROUP BY post.postid) as posttag"),
		function($join){
			$join->on('post.postid', '=', 'posttag.postid');
				
		})
		->where("post.postname",$slug)
		->first();
		
		if($post){
			if($post->poststatus == false)
				//return redirect('/')->withErrors('requested page not found');
				return view('errors.404');
			$comments = $post->comments;	
		}else {
			//return redirect('/')->withErrors('requested page not found');
			return view('errors.404');
		}
		return view('frontend.blogitem')->with('post',$post);
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
