<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bets;
use App\Teams;
use App\Mainslides;

use DB;

use File;
use Input;

class BetController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$bets = Bets::All();
    	
		return view("bets.betpannel")
		->with("bets", $bets);
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$teams = Teams::All();
		$mainslides = Mainslides::All();
		return view("bets.betcreate")->with('teams', $teams)
									->with('mainslides', $mainslides);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		

		$this->validate($request,[
			
			'title' => 'required|max:255',
			'name' => 'required|max:255',
			'mname' => 'required|max:255',
			]);


		$bet = new Bets();
		
		
		
	
			
		$bet->name = $request->input("name");
		$bet->mname = $request->input("mname");
		$bet->title = $request->input("title");	
		$bet->hometeamid = $request->input("hometeam");
		$bet->awayteamid = $request->input("awayteam");
		$bet->upperteamid = $request->input("upperteam");
		$bet->lowerteamid = $request->input("lowerteam");

		$bet->mainslideid = $request->input("mainslide");


				$bet->userid = $request->user()->id;

			$bet->active = 0;
		if (Input::get('active') === '1'){$bet->active = 1;}
		
		$bet->save();
		return redirect()->route("bets.index");
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
