<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //the request library to handle requests

class PagesControllers extends Controller
{
    //
    public function index(){
        $title="Welcome to my Laravel. this is the index page.";
        // return view('pages.index', compact('title'));
        return view('pages.index')->with('title',$title);
    }
    public function about(){
        $title="About Us page";
        return view('pages.about')->with('title',$title);
    }
    public function services(){
    
        $data=array(
            'title'=>'Our Services',
            'services'=>['Web Programming','Android Development','Machine Learning','AI','TensorFlow','Flutter']
        );
        return view('pages.services')->with($data);
    }
}
