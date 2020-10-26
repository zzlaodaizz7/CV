<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    //
    protected $table = "cvs";
    protected $fillable= ['id','name','birthday','email','phone','exp','description','salary','source','job','cv','status','timeinvite'];
    public function tag_cv(){
    	return $this->hasMany("App\Tag_Cv",'cvs_id','id');
    }
}
