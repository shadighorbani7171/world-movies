<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\CodeRequest;
use App\Http\Requests\SmsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

   
    
    class AuthController extends Controller
    {
     public function authform(){
         return view('auth');
     }
     public function auth(SmsRequest $request){
        $user = User::where('mobile', $request->mobile)->first();
        $password = rand(1111,9999);
    
        \Log::info($password);
    
        if(!$user){
            $user = User::create([
                'hash' =>Uuid::uuid4()->toString(),
                 'mobile' => $request->mobile,
                 'password' => \Hash::make($password)
            ]);
    
           
        }else{
            $user->password = \Hash::make($password);
            $user->save();
        }
    
        return redirect()->route('password',['hash'=> $user->hash]);
    }
    
         
    
        public function passwordform($hash){
            $check = User::where('hash', $hash)->first();
            if(!$check){
                return redirect()->route('auth');
            }
           return view('password', ['hash' => $hash]);
        }
        public function password(CodeRequest $request, $hash){
            $user = User::where('hash', $hash)->first();
           if(!$user){
            return redirect()->route('auth');
           }
             
           if(Hash::check($request->code, $user->password)){
            auth()->login($user, true);
            $user->password = null;
            $user->save();
    
            return redirect('/worldmovie');
    
           }
           return redirect()->back()->withErrors(['code' =>'wrong code!']);
        }
    
       
    }
    

