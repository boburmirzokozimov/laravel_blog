<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Modules\User\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends Controller
{
    public function register(SignupRequest $request,)
    {
        $data = $request->validated();

        User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        return redirect('/dashboard')->with('success', 'Successfully registered');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect('/home')->with('success', 'Successfully authenticated');
    }

    public function show()
    {
        return view('auth.login');
    }

    public function signin()
    {
        return view('auth.register');
    }

    public function logout(Request $request)
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
