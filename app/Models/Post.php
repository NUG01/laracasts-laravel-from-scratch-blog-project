<?php

namespace App\Models;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use App\Models\User;
class Post extends Model
{
    use HasFactory;

    // protected $fillable=['title','excerpt','body','slug','category_id'];
    protected $guarded =[];

    protected $with=['category','author'];


    public function category(){
        

        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}