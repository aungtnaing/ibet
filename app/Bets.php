<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bets extends Model {

	//
	protected $table = 'bets';
	

	public function hometeam()
    {
        return $this->belongsTo('App\Teams','hometeamid');
    }

    public function awayteam()
    {
        return $this->belongsTo('App\Teams','awayteamid');
    }

    public function upperteam()
    {
        return $this->belongsTo('App\Teams','upperteamid');
    }

    public function lowerteam()
    {
        return $this->belongsTo('App\Teams','lowerteamid');
    }

     public function mainslide()
    {
        return $this->belongsTo('App\Mainslides','mainslideid');
    }

    public function user()
    {
        return $this->belongsTo('App\User','userid');
    }

    



  
}
