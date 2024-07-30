<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TestController extends Controller
{
    public function test()
    {
        return view('test');
    }

    public function qrCode($id)
    {
        
        return view('qrCode');
    }
}
