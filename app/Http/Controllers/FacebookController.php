<?php

namespace App\Http\Controllers;

use Socialite;
use App\User;
use Auth;
use DB;

class FacebookController extends Controller
{

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        //return Socialite::driver('facebook')->redirect();

        // echo "string";
        // die();
        
        return Socialite::driver('facebook')->with(['hd' => 'facebook.com'])->redirect();

            

    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
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

