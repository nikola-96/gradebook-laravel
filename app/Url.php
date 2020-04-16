<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professor;

class Url extends Model
{
    protected $guarded = ["id"];

    public function professor(){
        
        return $this->hasOne(Professor::class);
    }

}
