<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    public function getAll()
    {
        // if request is via API, return JSON

        $arrheader = [];

        if(env('ALLOW_CORS') == true) {
            $arrheader = [
                "Access-Control-Allow-Origin" => '*',
            ];
        }

        if (request()->wantsJson()) {
            return response()->json(
                SocialMedia::select('question', 'answer')->get(),
                200,
                $arrheader,
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
