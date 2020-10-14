<?php

namespace App\Http\Controllers;

use App\Events\Registration;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @param RegistrationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegistrationRequest $request)
    {
//        event(
//            new Registration($request->validated())
//        );
        return back()->with('status', Registration::$result);
    }
}
