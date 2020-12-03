<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table='jobs';
    protected $fillable =['id','talenpools_id','name','descrip','start_end','target','status'];
    public function getcategory(){
    	return $this->hasOne('App\Job','id','talenpools_id');
    }
    public function getjob(){
    	return $this->hasMany('App\Job','talenpools_id','id');
    }
//    public function
}
