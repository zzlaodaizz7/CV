<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    //
    protected $table = "cvs";
    protected $fillable= ['id','name','birthday','email','phone','exp','description','salary','source','job','cv'];
}
