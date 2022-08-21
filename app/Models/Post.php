<?php

namespace App\Models;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable=['title','excerpt','body','slug','category_id'];
    protected $guarded =[];


    public function category(){
        

        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belobgsTo(User::class);
    }
}