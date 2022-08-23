<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use App\Models\User;
use App\Http\Controllers;
class Post extends Model
{
    use HasFactory;

    // protected $fillable=['title','excerpt','body','slug','category_id'];
    protected $guarded =[];

    protected $with=['category','author'];

public function scopeFilter($query,array $filters){
    if($filters['search'] ?? false){
    $query->where('title','like','%' . request('search') . '%')->orWhere('body','like','%' . request('search') . '%');
           
    }
    if($filters['category'] ?? false){
//    $category->whereExists(fn($query)=>$query->from('categories')->whereColumn('categories.id','posts.category_id')->where('categories.slug',$category));
          $query->whereHas('category',fn($query)=>$query->where('slug',$category)); 
    }
}

    public function category(){
        

        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}