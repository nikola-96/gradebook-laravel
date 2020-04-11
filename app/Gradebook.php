<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professor;

class Gradebook extends Model
{
    protected $guarded = ['id'];

    public function professor(){
        
        return $this->belongsTo(Professor::class);
    }
}
