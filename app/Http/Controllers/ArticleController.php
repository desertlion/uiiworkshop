<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article as Article;

use Illuminate\Http\Request;

class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $articles = Article::all();
		return view('articles.index', ['articles'=>$articles]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Baca seluruh input
        // Validasi
        $rules = [
            'title' => 'required',
            'description' => 'required'
        ];
        // untuk validasi, format parameter, input dan rule
        $validator = \Validator::make(\Request::all(), $rules);
        if($validator->fails())
            return Redirect()
                ->back()
                ->withInput()
                ->withError($validator);

        // Proses
        $data = new Article();
        $data->title = \Request::input('title');
        $data->description = \Request::input('description');
        $data->published_at = Date('Y-m-d h:i:s');
        $data->save();

        return Redirect('articles');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $article = Article::find($id);
		return view('articles.show', ['article'=>$article]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('articles.edit', ['article'=>Article::find($id)]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Baca seluruh input
        // Validasi
        $rules = [
            'title' => 'required',
            'description' => 'required'
        ];
        // untuk validasi, format parameter, input dan rule
        $validator = \Validator::make(\Request::all(), $rules);

        if($validator->fails())
            return Redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);

        // Proses
        $data = Article::find($id);
        $data->title = \Request::input('title');
        $data->description = \Request::input('description');
        $data->save();

        return redirect()->route('articles.index');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data = Article::find($id);
        $data->delete();
        return redirect()->route('articles.index');
	}

}
