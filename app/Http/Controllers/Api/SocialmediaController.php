<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    public function getAll()
    {
        // if request is via API, return JSON

        if (request()->wantsJson()) {
            return response()->json(
                SocialMedia::all(),
                200,
                [
                    "Access-Control-Allow-Origin" => 'https://motekarstudio.com'
                ],
                JSON_UNESCAPED_UNICODE
            );
        }

        return response()->json(
            [
                'message' => 'This route is only available via API.',
            ],
            404
        );
    }
}
