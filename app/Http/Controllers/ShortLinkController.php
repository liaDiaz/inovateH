<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortRequest;
use App\Models\ShortLink;

class ShortLinkController extends Controller
{
    public function createShortLink(ShortRequest $request){
        if($request->url){
            $new_url = ShortLink::Create([
                'url'=> $request->url
            ]);
            if ($new_url) {
                $short_url = base_convert($new_url->id, 10,36);
                $new_url->update([
                    'short_url' => $short_url
                ]);
                    return redirect()->back()->with('success_message',' la Url acortada es: <a href="' .url($short_url) .'">'. url($short_url) . '</a>');
            }
        }
        return back();
    }
    public function show($code)
    {
        dd($code);
    }
}
