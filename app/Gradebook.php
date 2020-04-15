<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professor;
use App\Student;
use App\Comment;

class Gradebook extends Model
{
    protected $guarded = ['id'];
    

    public function professor(){
        
        return $this->belongsTo(Professor::class);
    }
    public function students(){
        
        return $this->hasMany(Student::class);
    }
    public function comments(){
        
        return $this->hasMany(Comment::class);
    }

    public static function search($term){

        return self::with('professor')->where('name', 'LIKE', '%'.$term.'%')->get();
    }
}
 