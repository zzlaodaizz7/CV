<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table='jobs';
    protected $fillable =['id','name','descrip','start_end','target'];
}
