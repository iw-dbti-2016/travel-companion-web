<?php

namespace Columbo\Http\Controllers;

use Columbo\Http\Resources\User;
use Columbo\Traits\APIResponses;
use Illuminate\Http\Request;

class BaseController extends Controller
{
	use APIResponses;

    public function home()
    {
    	return view('home');
    }

    public function pageNotFound(Request $request)
    {
    	if ($request->expectsJson()) {
    		return $this->resourceNotFoundResponse();
    	} else {
    		abort(404);
    	}
    }

    public function showUserData(Request $request)
    {
    	return new User($request->user());
    }
}
