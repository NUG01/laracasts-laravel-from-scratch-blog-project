<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post 
{


public $title;
public $excerpt;
public $date;
public $body;
public $slug;

public function __construct($title,$excerpt,$date,$body,$slug){
  $this->title=$title;
  $this->excerpt=$excerpt;
  $this->date=$date;
  $this->body=$body;
  $this->slug=$slug;
}



public static function all()
{
//  $files= File::files(resource_path("posts/"));

//  return array_map(function($file){
//   return $file->getContents();
//  },$files);
return cache()->rememberForever('posts.all',function(){

  return collect(File::files(resource_path('posts')))->map(function($file){
      return YamlFrontMatter::parseFile($file);
  })->map(function($document){
      return new Post($document->title,$document->excerpt,$document->date,$document->body(),$document->slug,);
  })->sortByDesc('date');
  });
}


  public static function find($slug)
  {
  //       $path=__DIR__ . "/../resources/posts/{$slug}.html";
 
  //   if(!file_exists($path=resource_path("posts/{$slug}.html"))){
  //     throw new ModelNotFoundException();
  //   }
  // return cache()->remember("posts.{$slug}",1200,fn()=> file_get_contents($path));
   
$post=static::all()->firstWhere('slug',$slug);

if(! $post){
  throw new ModelNotFoundException();
}

return  $post;
  }

}