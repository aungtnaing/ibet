<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bets;
use App\Teams;
use App\Betitems;
use App\Matchdates;

use DB;

use File;
use Input;
use Auth;


class BetitemsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		
    	$lastid = DB::table('matchdates')->select('id')->orderBy('id', 'DESC')->first();

		
		$totalbet = Betitems::where('dateid',$lastid->id)->sum('amount');



		$totalwin = Betitems::where('dateid',$lastid->id)->where('result','=','win')->sum('balance');
		
		
		
			$totallose = Betitems::where('dateid',$lastid->id)->where('result','=','lose')->sum('balance');

			
		
		$totalacc = (5 / 100) * $totalwin;

		$totalamount = ($totalwin - $totalacc) - $totallose;
		


		$betitems = Betitems::where('userid', Auth::user()->id)
						->where('dateid','=', $lastid->id)
						->orderBy('id','DESC')
						->get();



		return view("betitems.betitempannel")
		->with("betitems", $betitems)
		->with("currentbet", $totalbet)
		->with("totalwin", $totalwin)
		->with("totallose", $totallose)
		->with("totalacc", $totalacc)
		->with("totalamount", $totalamount);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function betitemcreate($betid)
	{
		$bet = Bets::find($betid);
		
		$lastid = DB::table('matchdates')->select('id')->orderBy('id', 'DESC')->first();		
		$totalbet = Betitems::where('dateid',$lastid->id)->where('active',1)->sum('amount');
			
		
		$totalwin = Betitems::where('dateid',$lastid->id)->where('result','=','win')->sum('balance');
		
		
		
			$totallose = Betitems::where('dateid',$lastid->id)->where('result','=','lose')->sum('balance');

			
		
		$totalacc = (5 / 100) * $totalwin;

		$totalamount = ($totalwin - $totalacc) - $totallose;


		return view("betitems.betitemcreate")->with('bet', $bet)
					->with('error', "")
					->with("currentbet", $totalbet)
					->with("totalwin", $totalwin)
		->with("totallose", $totallose)
		->with("totalacc", $totalacc)
		->with("totalamount", $totalamount);
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{
		//
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		
		$lastid = DB::table('matchdates')->select('id')->orderBy('id', 'DESC')->first();

		
		$totalbet = Betitems::where('dateid',$lastid->id)->where('active',1)->sum('amount');


		if ($request->input("amount") < "5000")
		{
			if ($request->input("gamount") < "5000")
			{
			$bet = Bets::find($request->input("betid"));
			
			return view("betitems.betitemcreate")->with('bet', $bet)
												->with('error', "Sorry, Your body or goals+ bet amount is at least 5000 kyats")
												->with("currentbet", $totalbet);
			}
		}

		if ($request->input("gamount") < "5000")
		{
			if ($request->input("amount") < "5000")
			{
			$bet = Bets::find($request->input("betid"));
			
			return view("betitems.betitemcreate")->with('bet', $bet)
												->with('error', "Sorry, Your body or goals+ bet amount is at least 5000 kyats")
												->with("currentbet", $totalbet);
			}
		}


		

		
		if ($request->user()->balance < $totalbet + $request->input("gamount") + $request->input("amount"))
		{
				$bet = Bets::find($request->input("betid"));
				
			return view("betitems.betitemcreate")->with('bet', $bet)
												->with('error', "Sorry, you do not have sufficient credit to bet the match.")
												->with("currentbet", $totalbet);

		}

		
		if ($request->input("amount") >= "5000")
		{

		$betitem = new Betitems();
		
		
		$betitem->userid = $request->user()->id;

		if ($request->input("bettype") === "bodyup")
		{
			$betitem->bettype = "body";
			$betitem->bet = "upper";
		}
		else
		{
			$betitem->bettype = "body";
			$betitem->bet = "lower";

		}

		$betitem->betid = $request->input("betid");

		$betitem->amount = $request->input("amount");
		$betitem->dateid = $lastid->id;
		$betitem->active = 0;
		if (Input::get('active') === '1'){$betitem->active = 1;}
		
		$betitem->save();



	}

	if ($request->input("gamount") >= "5000")
		{

		$betitem = new Betitems();
		
		
		$betitem->userid = $request->user()->id;

		if ($request->input("gbettype") === "goalover")
		{
			$betitem->bettype = "goals";
			$betitem->bet = "over";
		}
		else
		{
			$betitem->bettype = "goals";
			$betitem->bet = "under";

		}

		$betitem->betid = $request->input("betid");

		$betitem->amount = $request->input("gamount");
		$betitem->dateid = $lastid->id;
		$betitem->active = 0;
		if (Input::get('active') === '1'){$betitem->active = 1;}
		
		$betitem->save();



	}
		
	$betitems = Betitems::where('userid', Auth::user()->id)
						->orderBy('id','DESC')
						->get();
				

			
		return redirect()->route("betitems.index")->with('betitems', $betitems);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$teams = Teams::All();
		$mainslides = Mainslides::All();
		$bet = Bets::find($id);
		return view('bets.betedit')->with('bet',$bet)
									->with('teams', $teams)
									->with('mainslides', $mainslides);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		
		
		$bet = Bets::find($id);
			
		$bet->name = $request->input("name");
				$bet->mname = $request->input("mname");

		$bet->title = $request->input("title");	
		$bet->hometeamid = $request->input("hometeam");
		$bet->awayteamid = $request->input("awayteam");
		$bet->upperteamid = $request->input("upperteam");
		$bet->lowerteamid = $request->input("lowerteam");
				$bet->mainslideid = $request->input("mainslide");

		$bet->result = $request->input("result");
		$bet->body = $request->input("body");
		$bet->bodypercentage = $request->input("bodypercentage");
		$bet->goals = $request->input("goals");
		$bet->goalspercentage = $request->input("goalspercentage");

		$bet->active = 0;
		if (Input::get('active') === ""){$bet->active = 1;}
		
		$bet->save();
		return redirect()->route("bets.index");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
			
		Bets::destroy($id);

		return redirect()->route("bets.index");
	}

	public function rrmdir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir") 
						rrmdir($dir."/".$object); 
					else unlink   ($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
		}
	}

}
