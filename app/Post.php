<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
	use SoftDeletes;
    protected $fillable = ['name'];
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
