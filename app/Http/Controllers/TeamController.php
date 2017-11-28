<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teams;
use DB;

use File;
use Input;

class TeamController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$teams = Teams::All();
    	
		return view("teams.teampannel")
		->with("teams", $teams);
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view("teams.teamcreate");

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		

		$this->validate($request,[
			'photourl1' => 'required',
			'name' => 'required|max:255',
			'mname' => 'required|max:255',
			
			]);


		$team = new Teams();
		$imagePath = public_path() . '/images/teams/';
		$lastid = DB::table('teams')->select('id')->orderBy('id', 'DESC')->first();
		if($lastid!=null)
		{
			$lastid = $lastid->id + 1;
		}
		else
		{
			$lastid = 1;	
		}
		$directory = $lastid;
		$input = $request->all();
		$destinationPath = $imagePath . $directory . '/photos';
		
		
		$photourl1 = "";
		$photourl2 = "";
		
		
		if(Input::file('photourl1')!="")
		{
			if(Input::file('photourl1')->isValid())
			{
				$name =  time()  . '-main' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/teams/" . $directory . '/photos/' .  $name;
			
			}

		}

		if(Input::file('photourl2')!="")
		{
			if(Input::file('photourl2')->isValid())
			{
				$name =  time()  . '-thum' . '.' . $input['photourl2']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl2')->move($destinationPath, $name); // uploading file to given path
				$photourl2 = "/images/teams/" . $directory . '/photos/' .  $name;
			
			}

		}

	
			
		$team->name = $request->input("name");
		$team->mname = $request->input("mname");	
		$team->about = $request->input("about");
	
		$team->photourl1 = $photourl1;
		$team->photourl2 = $photourl2;
		
		$team->save();
		return redirect()->route("teams.index");
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
		
		$team = Teams::find($id);
		return view('teams.teamedit')->with('team',$team);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		
		
		$team = Teams::find($id);
			
		$imagePath = public_path() . '/images/teams/';
	
		$directory = $id;


		$input = $request->all();
		$destinationPath = $imagePath . $directory . '/photos';
	
		$photourl1 = $team->photourl1;
		$photourl2 = $team->photourl2;
		// ini_set('post_max_size', '64M');
		// ini_set('upload_max_filesize', '64M');
	
		if(Input::file('photourl1')!="")
		{
			

			 if(Input::file('photourl1')->isValid())
			 {
				if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}
					


				$name =  time() . '-main' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/teams/" . $directory . '/photos/' .  $name;
			 }

		}

				if(Input::file('photourl2')!="")
		{
			

			 if(Input::file('photourl2')->isValid())
			 {
				if($photourl2!="")
				{
					if(file_exists(public_path() .$photourl2))
					{
						unlink(public_path() . $photourl2);
					}
				}
					


				$name =  time() . '-thum' . '.' . $input['photourl2']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl2')->move($destinationPath, $name); // uploading file to given path
				$photourl2 = "/images/teams/" . $directory . '/photos/' .  $name;
			 }

		}
	
	$team->name = $request->input("name");
		$team->mname = $request->input("mname");	
		$team->about = $request->input("about");
	
		
		$team->photourl1 = $photourl1;
		$team->photourl2 = $photourl2;

		$team->save();
		return redirect()->route("teams.index");
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
			$team = Teams::find($id);

		$photourl1 = $team->photourl1;
	
			if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}

		$photourl2 = $team->photourl2;
	
			if($photourl2!="")
				{
					if(file_exists(public_path() .$photourl2))
					{
						unlink(public_path() . $photourl2);
					}
				}		
		
		Teams::destroy($id);

		return redirect()->route("teams.index");
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
