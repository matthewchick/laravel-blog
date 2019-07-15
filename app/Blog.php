<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Blog extends Model
{
    // https://laravel.com/docs/5.8/eloquent#soft-deleting
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    /* Fix the problem: "Add [title] to fillable property to allow mass assignment on [App\Blog]." */
    // protected $fillable = ['title', 'body', 'featured_image', 'slug', 'meta_title', 'meta_description', 'status'];
    // protected $table = 'my_blogs';
    protected $fillable = ['title', 'body'];



}
