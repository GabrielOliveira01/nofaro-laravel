<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hashs;
use Keygen\Keygen;

class hash extends Controller
{
    public function __construct()
    {
    }

    public function store(Request $request)
    {
        $key = Keygen::alphanum(8)->generate();

        $hash = "0000" . md5($request->name . $key);
        
        return response()->json(
            array(
                'input_string' => $request->name,
                'key'          => $key,
                'hash'         => $hash
            ),
            200
        );
    }

    public function show(Request $request)
    {
        
        $hashs = Hashs::getHashs($request->all());

        return response()->json(
            array(
                'hashs' => $hashs
            ),
            200
        );
    }    
}
