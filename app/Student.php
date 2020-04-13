<?php

namespace App;
use App\Gradebook;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = ['id'];

    public function gradebook(){

        return $this->belongsTo(Gradebook::class);
    }
    public function professor(){

        return $this->belongsTo(Professor::class);
    }

}
