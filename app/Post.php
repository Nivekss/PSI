<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = [
        'subject',
        'body',
        'project_id',
        'user_id',
    ];

    protected  $hidden = [
        "created_at",
        "updated_at",
    ];

    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }


}
