<?php

namespace App\Http\Controllers;

use App\Events\Registration;
use App\Http\Requests\AuthenticateRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registerForm()
    {
        return view('registrations.index');
    }

    /**
     * @param RegistrationRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function register(RegistrationRequest $request)
    {

        event(
           new Registration($request->validated())
        );

        return back()->with('status', Registration::$result);
    }

    public function authenticate(AuthenticateRequest $request)
    {
        $items = $request->only('email','password');

        if(Auth::attempt($items))
        {
            return redirect()->route('registrations.post');
        }
    }

    public function index()
    {
        $categories = Category::all();

        return view('registrations.panel_page',compact('categories'));
    }


}
