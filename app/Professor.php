<?php

namespace App;
use App\Gradebook;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $guarded = ['id'];

    public function gradebook(){
        
        return $this->hasOne(Gradebook::class);
    }

    public static function search($term){

        return self::with('gradebook')->where('name', 'LIKE', '%'.$term.'%')->get();
    }


}
