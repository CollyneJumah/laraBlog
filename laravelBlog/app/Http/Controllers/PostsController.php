<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

//link with the model Posts
use App\Posts;
use DB;

class PostsController extends Controller
{

       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //load posts from index view
        // $post=Posts::all();
        // return Posts::all();
        // $posts=DB::select('SELECT * FROM posts');
        // return Posts::where('title','Third Post')->get();
        
        // $posts=Posts::orderBy('title','desc')->take(1)->get();//limit posts
        $posts=Posts::orderBy('created_at','desc')->paginate(2);
        return view('posts.index')->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create form to upload posts
        //load a view form posts folder
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);
        //handle image upload
        if($request->hasFile('cover_image')){
            // get file with extension
            $fileWithExt=$request->file('cover_image')->getClientOriginalName();
            //getfilename
            $filename=pathinfo($fileWithExt, PATHINFO_FILENAME);
            //getextension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //file name to be stored
            $fileToStore= $filename.'_'.time().'.'.$extension;
            //path for images
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileToStore);



        }else{
            $fileToStore='nofile.png';
        }
        // create posts

        $post= new Posts;
        $post->title=$request->input('title');
        $post->body= $request->input('body');
        $post->user_id=auth()->user()->id;
        $post->cover_image=$fileToStore;
        $post->save();

        return redirect('/posts')->with('success','Post submitted');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //display Posts
        //
        $posts=Posts::find($id);
        return view('posts.show')->with('posts',$posts);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts=Posts::find($id);

        if(auth()->user()->id !=$posts->user_id){
            return redirect('/posts')->with('error','Unauthorized page');

        }

        return view('posts.edit')->with('posts',$posts);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
        ]);
            
            //handle image upload
        if($request->hasFile('cover_image')){
            // get file with extension
            $fileWithExt=$request->file('cover_image')->getClientOriginalName();
            //getfilename
            $filename=pathinfo($fileWithExt, PATHINFO_FILENAME);
            //getextension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //file name to be stored
            $fileToStore= $filename.'_'.time().'.'.$extension;
            //path for images
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileToStore);
        }




        $post= Posts::find($id);
        $post->title=$request->input('title');
        $post->body= $request->input('body');

        if($request->hasFile('cover_image')){
            $post->cover_image=$fileToStore;
        }

        $post->save();

        return redirect('/posts')->with('success','Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find post by id
        $post=Posts::find($id);

        if(auth()->user()->id !=$post->user_id){
            return redirect('/posts')->with('error','Unauthorized page');

        }
        if($post->cover_image !='noimage.png'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success','Post Deleted');

    }
}
