<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded =[];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function newCommentsave($request, $comment)
    {
        $comment->product_id = $request->product_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;

        $comment->save();
    }
}
