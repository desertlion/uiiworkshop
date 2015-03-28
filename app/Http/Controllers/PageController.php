<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PageController extends Controller {

    public function about(){
        // return view('pages.about', ['nama'=>'Fikri']);
        // return view('pages.about')->with('nama','Fikri');
        return view('pages.about')->withNama('Fikri');
    }

}
