<?php

use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;


use Illuminate\Support\Facades\Route;

// \Spatie\YamlFrontMatter\YamlFrontMatter::parse($yaml);
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // $document = YamlFrontMatter::parseFile(
    //     resource_path('posts/my-first-post.html')
    // );
   
        $posts = Post::all();

    // $document = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile(resource_path('posts/my-fourth-post.html')); 

    // ddd($document);

    // $files =  File::files(resource_path("posts"));



    // $posts = collect(File::files(resource_path("posts"))
    // )
    //     ->map(function ($file) {
    //         $document = YamlFrontMatter::parseFile($file);

    //         return new Post(
    //             $document->title,
    //             $document->excerpt,
    //             $document->date,
    //             $document->body(),
    //             $document->slug
    //         );
    //     });


        // $posts = array_map(function($file){

        //     $document = YamlFrontMatter::parseFile($file);

        //     return new Post(
        //         $document->title,
        //         $document->excerpt,
        //         $document->date,
        //         $document->body(),
        //         $document->slug
        //     );
        // }, $files);


    // $posts= [];

    // foreach ($files as $file) {
    //     $document = YamlFrontMatter::parseFile($file);
    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }
   
    return view('posts', 
        ['posts' => $posts
    ]);


    // $posts = Post:: all();

    // return view('posts',[
    //     'posts' => $posts
    // ]);

});

// /

Route::get('posts/{post:slug}',function (Post $post) {

    

    // $var = Post::findOrFail($slug);

        return view('post',[
            'post' => $post
        ]);

});

//find apost by its slug and pass it to a view called post

Route::get('catagories/{catagory:slug}', function(Catagory $catagory) {

    return view('posts', [
        'posts' => $catagory->posts
    ]);

});