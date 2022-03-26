<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quize extends Model
{
    public function getOptions(){
    	return $this->hasMany('App\Admin\QuizeAns','q_id');
    } 
    public function getOptionsAns(){
    	return $this->hasOne('App\Admin\QuizeAns','q_id')->where('is_ans',1);
    } 
    public function getOptionsQuizer(){
    	return $this->hasMany('App\Admin\QuizeAns','q_id');	
    }
}
