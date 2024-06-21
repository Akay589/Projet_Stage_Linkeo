<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Machine;


class QrcodeController extends Controller
{
  /*  public function qrcode()
    {
       // $data = Machine::find(4);
        $qrcode = QrCode::size(200)->generate('http://www.facebook.com');
        return view('welcome',compact('qrcode'));
    }

*/
    public function Machine()
    {


        return view('welcome');
    }
}
