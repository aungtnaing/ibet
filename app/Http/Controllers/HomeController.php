<?php namespace App\Http\Controllers;
use App\Bets;
use App\Betitems;
use DB;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		

		$lastid = DB::table('matchdates')->select('id')->orderBy('id', 'DESC')->first();

		
		$totalbet = Betitems::where('dateid',$lastid->id)->where('active',1)->sum('amount');
		
		


		$totalwin = Betitems::where('dateid',$lastid->id)->where('result','=','win')->sum('balance');
		
		
		
			$totallose = Betitems::where('dateid',$lastid->id)->where('result','=','lose')->sum('balance');

			
		
		$totalacc = (5 / 100) * $totalwin;

		$totalamount = ($totalwin - $totalacc) - $totallose;
		




		$bets = Bets::where('active',1)
						->get();

		if(count($bets) > 0)
		{
			return view('pages.home')->with('bets', $bets)
								->with('currentbet', $totalbet)
								->with("totalwin", $totalwin)
								->with("totallose", $totallose)
								->with("totalacc", $totalacc)
								->with("totalamount", $totalamount);
		}
		else
		{
			
			return view('pages.news')->with('currentbet', $totalbet)
									->with("totalwin", $totalwin)
									->with("totallose", $totallose)
									->with("totalacc", $totalacc)
									->with("totalamount", $totalamount);		
		}



	}

}
