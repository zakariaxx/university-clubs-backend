<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationMail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponser;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;

class AuthController extends Controller
{
    use Notifiable, ApiResponser;
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $token = User::generateVericationCode();
        $request->validate([

            'email' => ['required','string','email','unique:users'],
            'password' => 'required|string',
             'phone_number'=>'string',
             'user_name'=>'string',
             'civility'=>'string',
             'first_name'=>'required|string',
             'last_name'=>'required|string',
             'admin'=>'boolean',

        ]);
        $user = new User([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => bcrypt($request->password),
            'phone_number'=>$request->phone_number,
            'user_name'=>$request->user_name,
            'civility'=>$request->civility,
            'verification_token'=> User::generateVericationCode()
        ]);

        Mail::to($request->email)->send(new WelcomeMail($user));
        $user->save();
        return response()->json([
            'user'=>$user,
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean',
        ]);

        // $user = User::where('email', $request->email)->get();
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials)){
            return response()->json(['message' => 'Unauthorized'], 401);
        }


        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'user' => auth()->user(),
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->now()->addDays(7)->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }





    public function desactivationCompte($id)
    {
        $user=User::find($id);
        $user->activate=0;
        $user-> save();
        return response()->json([
            'message' => 'Votre compte est désactivé!'
        ], 201);
    }

    public function activationCompte($id)
    {
        $user=User::find($id);
        $user->activate=1;
        $user-> save();
        return response()->json([
            'message' => 'Votre compte est activé!'
        ],201);
    }

    public function verifyUser($token){
        $user = User::where('verification_token',$token)->firstOrFail();

            $user->verified = User::VERIFIED_USER;
            $user->activate = User::ACTIVATE_USER;
            $user->verification_token = null;
            $user->email_verified_at = now();
            $user->save();
            Mail::to($user->email)->send(new ConfirmationMail($user));
            $message = "Votre compte est maintenant activé, veuillez ouvrir votre boite de messagerie";
        return $this->showMessage($message);

    }





}
