<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Transformers\LinkTransformer;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function links(){
        $links = Link::all();
        return fractal($links)->transformWith(new LinkTransformer());
    }
}
