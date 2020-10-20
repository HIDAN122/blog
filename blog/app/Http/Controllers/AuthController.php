<?php

namespace App\Http\Controllers;

use App\Events\Registration;
use App\Http\Requests\AuthenticateRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models;
use App\Models\Category;
use Auth;
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
    public function authenticateForm()
    {
        return view('authenticate.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registerForm()
    {
        return view('registrations.index');
    }

    /**
     * @param RegistrationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegistrationRequest $request)
    {
        event(
            new Registration($request->validated())
        );

        return back()->with('status', Registration::$result);
    }

    /**
     * @param AuthenticateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(AuthenticateRequest $request)
    {
        $items = $request->only('email', 'password');

        if (Auth::attempt($items)) {
            return redirect()->route('profile.home');
        }

        return back()->with('error', 'Error!!!!');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\Vieww
     */
    public function index()
    {
        $categories = Category::all();

        return view('registrations.panel_page', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        return view('registrations.panel_page');
    }

    /**
     * @return string
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/posts');
    }

}
