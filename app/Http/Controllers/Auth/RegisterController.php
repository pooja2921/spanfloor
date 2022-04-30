<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers,MustVerifyEmail;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function register(Request $request)
    {
        //return $request;
        $request['otp']= '1234';
        $this->validator($request->all())->validate();

        //$this->SMSSend($request, $debug=false);

        event(new Registered($user = $this->create($request->all())));

        
        //$this->guard()->login($user);

        /*if ($response = $this->registered($request, $user)) {
            return $response;
        }*/

          $userinfo=$request;
        return view('auth.otp',compact('userinfo'));

       /* return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());*/
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'otp' => $data['otp'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function SMSSend($request, $debug=false){
          $msg='OTP';
        //return $msg;
      // global $user,$password,$senderid,$smsurl;
        //return $request;
       $user = "parshwawebsolutions";
       $password = "12646";
       $senderid = "PARSHWA";
       $smsurl = "https://kit19.com/ComposeSMS.aspx?";
      $url = 'username='.$user;
      $url.= '&password='.$password;
      $url.= '&sender='.$senderid;
      $url.= '&to='.urlencode($request->phone);
      $url.= '&message='.urlencode($msg);
      $url.= '&priority=1';
      $url.= '&dnd=1';
      $url.= '&unicode=0';
      $otp=$request->otp;
      //return $url; 
           
      $urltouse =  $smsurl.$url;
      if ($debug) { echo "Request: <br>$urltouse<br><br>"; }
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $urltouse);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      //Open the URL to send the message
      
      // $response = $this->httpRequest($urltouse);
      // $client = new GuzzleHttp\Client();
    $url = "https://www.kit19.com/ComposeSMS.aspx?username=panalink-80880&password=10880&sender=PANLNK&to=" . $request->phone . "&priority=1&dnd=1&unicode=0&dlttemplateid=1707163548175703719&message=123456%20is%20One%20Time%20Password%20(OTP)%20to%20verify%20your%20mobile%20number.%20It%20is%20valid%20for%2015%20minutes.%20-%20Panalink";
     $res =  \Http::get($url);
      $res->status(); // 200
      $res->body(); // 
      if($res->status() == 200){
            return true;    
       }
    }

    public function saveotp(Request $request){
      //return $request;

         $lang = $request->lang;
        $foundjquery = "Not found";
        if(in_array('jQuery',$lang)){
            $foundjquery = "found";
        }
        // Converting the array to comma separated string
        $lang = implode("",$lang);
        // return $lang;
         $otp = $lang;
         $name= $request->name;
        $mobile_no = $request->mobile_no;
        $user = User::where('phone', $mobile_no)
                ->where('name', $name)
                ->where('otp', $otp)->first();
         $checkOtp = User::where('otp', $otp)->first();
        if(empty($checkOtp))
        {
            return response()->json(['info'=>'Invalid OTP']);
        }
        if($user->status == 1)
        {
            return response()->json(['error'=>'Got Simple Ajax Request.']);
        }
        else{
            $newuser = User::where('phone', $mobile_no)
                ->where('name', $name)
                ->where('otp', $otp)->update(['status' => 1]);
                $this->guard()->login($user);
                return response()->json(['success'=>'Got Simple Ajax Request.']);
        }
    
    }
}
