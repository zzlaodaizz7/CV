<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag_Cv extends Model
{
    //
    protected $table = "tag_cv";
    protected $fillable = ['id','tags_id','cvs_id','tags_name'];
    public function cv(){
        return $this->hasOne("App\Cv",'id','cvs_id');
    }
}
