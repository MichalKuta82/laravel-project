<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $fillable = [
		'post_id', 'author', 'email', 'is_active', 'body',
	];

	public function comment()
	{
		return $this->belongsTo('App\Comment');
	}
}
