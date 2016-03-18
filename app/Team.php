<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'Team';
    protected $fillable = ['idTeam', 'TeamName','idPManager','T_Note'];
    protected $hidden = [];
    public function Employee(){
    	return $this->belongsToMany('App\Employee','App\TeamMember');
    }
}
