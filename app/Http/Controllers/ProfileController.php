<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProfileController extends Controller
{
    public function index(Request $request, $id)
    {
        // Define variables
        $name = "Donald Trump";
        $age = "75";

        // Create an associative array with data
        $data = [
            'id' => $id,
            'name' => $name,
            'age' => $age,
        ];

        // Set cookie parameters
        $cookieName = 'access_token';
        $cookieValue = '123-XYZ';
        $cookieMinutes = 1;
        $cookiePath = '/';
        $cookieDomain = $request->server('SERVER_NAME');
        $cookieSecure = false;
        $cookieHttpOnly = true;

        // Create a cookie
        $cookie = Cookie::make(
            $cookieName,
            $cookieValue,
            $cookieMinutes,
            $cookiePath,
            $cookieDomain,
            $cookieSecure,
            $cookieHttpOnly
        );

        // Return response with data and cookie
        return response()->json($data)->cookie($cookie)->setStatusCode(200);
    }
}
