<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct()
    {
        //  $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->input('email'))->first();
        if(Hash::check($request->input('password'), $user->password)){
            $apikey = base64_encode(Str::random(40));
            User::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);
            $user = User::where('email', $request->email)->first();
            $this->data['api_key'] = $apikey;
            $this->data['user'] = $user;
            return $this->show_success("success", "200");
        }else{
            return $this->show_error("failed", 401);
        }
    }
}
?>
