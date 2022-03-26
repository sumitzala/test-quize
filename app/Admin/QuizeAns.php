<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class QuizeAns extends Model
{
    public function getOptions(){
    	return $this->belongsToMany('App\Quize','q_id');
    }public function getOptionsAns(){
    	return $this->belongsToMany('App\Quize','q_id');
    }
    public function getOptionsQuizer(){
    	return $this->belongsToMany('App\Admin\QuizeAns','q_id');	
    }

}
