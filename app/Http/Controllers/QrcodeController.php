<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Machine;
use Barryvdh\DomPDF\Facade\Pdf;

class QrcodeController extends Controller
{
  /*  public function qrcode()
    {
       // $data = Machine::find(4);
        $qrcode = QrCode::size(200)->generate('http://www.facebook.com');
        return view('welcome',compact('qrcode'));
    }

*/

    public function qrcode_pdf($id)
    {
        $url = route('voir_materiel', ['id' => $id]);
        $qrcode = QrCode::format('png')->size(200)->generate($url);
        $qrCodePath = storage_path('app/public/qrcode.png');
        file_put_contents($qrCodePath, $qrcode);

        $data = [
            'id' => $id,
            'qrCodePath' => $qrCodePath
        ];
        $pdf = PDF::loadView('pdf.qrcode_pdf', $data);
        return $pdf->download('qrcode-' . $id . '.pdf');


    }

}
