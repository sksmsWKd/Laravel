<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GithubAuthController extends Controller
{
    public function __contstruct()
    {
        $this->middleware(['guest']);
    }

    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {

        $user = Socialite::driver('github')->user();

        // dd($user);

        //DB에 사용자 정보를 저장 한다
        //이미 이 사용자 정보가 DB에 저장 되어 있다면 , 
        //저장 할 필요가 없다.
        $user = User::firstOrCreate(
            ['email' => $user->getEmail()],
            [
                'password' =>  Hash::make(Str::random(24)),
                'name' => $user->getName()
            ]
            //create 로 배열의 칼럼값을 명시하려면,  model에 명시를 해줘야함
        );
        Auth::login($user);
        // 로그인했다고 세선에 저장
        return redirect()->intended('/dashboard');
        //원래 의도했던 사이트로 이동 , 없다면 default 로 
    }
}
