<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnglishChart extends Model
{
    protected $table = 'EnglishChart';
    protected $fillable = ['idEChart', 'Month01','Month02','Month03','Month04','Month05','Month06','Month07','Month08','Month09','Month10','Month11','Month12','EC_Note'];
    protected $hidden = [];
    public function Employee(){
    	return $this->hasMany('App\Employee','idEChart');
    }
}
