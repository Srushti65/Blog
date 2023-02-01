<?php

namespace App\Models;

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;


class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

        public function __construct($title, $excerpt, $date, $body,$slug)
        {
            $this->title = $title;
            $this->excerpt = $excerpt;
            $this->date = $date;
            $this->body = $body;
            $this->slug= $slug;
        }

    Public static function all()
    {
        // $files =  File::files(resource_path("posts/"));

        // return array_map(fn($file) => $file->getContents(), $files);

return cache()->rememberForever('post.all', function() {

    return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter:: parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ))
            -> sortByDesc('date');

    });

        
    }
    

    public static function find($slug)
    {
        // $path = resource_path("posts/{$slug}.html");
        // if(! file_exists(resource_path("posts/{$slug}.html")))
        // {
        //     // ddd('file does not exist');
        //     // abort(404);
        //     throw new ModelNotFoundException();
        // }


        // return cache()->remember ("posts.{$slug}", now()->addMinutes(20), fn() => file_get_contents($path));
            // $posts = static::all();

            return $post = (static::all()->firstWhere('slug', $slug));

         
    }

    public static function findOrFail($slug)
    {
        $post = static::find($slug);

            if(! $post){
                throw new ModelNotFoundException();
            }
            
            return $post;
    }
}