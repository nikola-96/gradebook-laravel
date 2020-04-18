<?php

namespace App;

use App\Gradebook;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $guarded= ['id'];

    public function gradebook(){

        return $this->belongsTo(Gradebook::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }

    
}
