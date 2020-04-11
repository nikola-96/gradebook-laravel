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
    public static function search($term){

        return self::with('professor')->where('name', 'LIKE', '%'.$term.'%')->get();
    }
}
