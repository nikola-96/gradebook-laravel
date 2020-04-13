<?php

namespace App;
use App\Gradebook;
use App\Student;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $guarded = ['id'];

    public function gradebook(){
        
        return $this->hasOne(Gradebook::class);
    }
    public function students(){
        
        return $this->hasMany(Student::class);
    }


    public static function search($term){

        return self::with('gradebook')->where('first_name', 'LIKE', '%'.$term.'%')->get();
    }
}
