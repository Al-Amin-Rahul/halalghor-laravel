<?php

namespace App\Http\Controllers\Login;

use App\Models\User;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showRegisterForm()
    {
        return view("login.register");
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"         => "required",
            "email"        => "required|email",
            "phone_number" => "required|min:11|max:13",
            "password"     => "required|min:6"
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try
        {
            User::create([
                "name"              => $request->name,
                "email"             => $request->email,
                "email_verified_at" => Carbon::now(),
                "phone_number"      => $request->phone_number,
                "password"          => bcrypt($request->phone_number),
            ]);
            $this->setSuccessMessage("Register Successfully");

            return redirect()->route("login");
        }
        catch (\Exception $e)
        {
            $this->setErrorMessage($e->getMessage());
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function showLoginForm()
    {
        return view("login.login");
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email"    => "required|email",
            "password" => "required|min:6"
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only(["email", "password"]);

        if (auth()->attempt($credentials))
        {
            if (auth()->check() && auth()->user()->role == 1)
            {
                return redirect()->route("admin.dashboard");
            }
            else
            {
                if (Cart::count() <= 0)
                {
                    return redirect()->route("/");
                }
                else
                {
                    return redirect()->route("checkout");
                }

            }
        }
        else
        {
            $this->setErrorMessage("Email or password is incorrect");
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }



    public function logout()
    {
        auth()->logout();
        return redirect()->route("/");
    }

}
