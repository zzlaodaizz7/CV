<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemp extends Model
{
    //
    protected $table = "emailtemplate";
    protected $fillable = ['id','title','content'];
}
