<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Khsing\World\Models\Country;

class AuthController extends Controller
{

    public function show_reg_form() {
        $countries = Country::all();

        return view('auth.register', [
            'countries' => $countries
        ]);
    }

    public function reg_store(RegistrationRequest $request){

        $request->validated();

        $data = $request->all();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('/public/uploads/profile');
            $data['image_url'] = $path;
        }

        $data['password'] = bcrypt($request->password);

        $store = User::query()->create($data);

        return redirect()->route('auth.login')->with('success', 'Registration has been successful. Kindly Login');
    }

    public function show_login_form() {

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();

            return redirect()->route('home.dashboard');
        }

        return redirect()->back()->with('error', 'Invalid Credentials');
    }
}
