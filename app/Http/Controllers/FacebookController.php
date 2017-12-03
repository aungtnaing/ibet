<?php namespace App\Http\Controllers;

use DB;
use App\User;
use Socialite;

class FacebookController extends Controller {

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
		
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		





	}

	public function redirectToProvider()
	{
		return Socialite::driver('facebook')->with(['hd' => 'facebook.com'])->redirect();
	}

	public function handleProviderCallback()
{
        $fbuser = Socialite::with('facebook')->stateless()->user();//Getting User Information from Facebook;
        try {

            if(User::where('fbuserid', '=', $fbuser->id)->orWhere('email','=',$fbuser->email)->first())
            {
                $checkUser = User::where('fbuserid', '=', $fbuser->id)->orWhere('email','=',$fbuser->email)->first();
                Auth::login($checkUser);
                return redirect('home');
            }

            $user = new User();
            

            $user->name = $fbuser->getName();
            $user->email = $fbuser->getEmail();

       

            $user->fbuserid = $fbuser->getId();//facebook Id

            $user->save();   
            Auth::login($user);
            return redirect('home');

        } catch (Exception $e) {

            return "Please check Something.";

        }
    }


}
