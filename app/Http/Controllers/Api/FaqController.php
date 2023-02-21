<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
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
                Faq::select('question', 'answer')->get(),
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
