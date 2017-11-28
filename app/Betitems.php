<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Betitems extends Model {

	//
	protected $table = 'betitems';
	

	public function betmatch()
    {
        return $this->belongsTo('App\Bets','betid');
    }

    public function matchdate()
    {
        return $this->belongsTo('App\Matchdates','dateid');
    }

 

    public function user()
    {
        return $this->belongsTo('App\User','userid');
    }

    



  
}
