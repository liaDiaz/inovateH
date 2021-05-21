<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;

class ShortLinkController extends Controller
{
    public function createShortLink(Request $request){
        if($request->url){
            $new_url = ShortLink::Create([
                'url'=> $request->url
            ]);
            if ($new_url) {
                $short_url = base_convert($new_url->id, 10,36);
                $new_url->update([
                    'short_url' => $short_url
                ]);
                    return redirect()->back()->with('success_message',' Url acortada : <a href="' .url($short_url) .'" target="_blank" class="mt-3 mb-3"> <br>' . url($short_url) . '</a>');
            }
        }
        return back();
    }
    public function show($code)
    {
        $short_url = ShortLink::Where('short_url',$code)->first();

        if ($short_url) {
            return redirect()->to(url($short_url->url));
        }
        return redirect()->to(url('/'));
    }
}
