<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodeController extends Controller
{


    public function qrcode_pdf($id)
    {
        $url = route('voir_materiel', ['id' => $id]);
        $qrcode = QrCode::format('png')->size(200)->generate($url);
        $qrCodePath = storage_path('app/public/qrcode.png');
        file_put_contents($qrCodePath, $qrcode);

        // Get the material with its designation
        $material = Materiel::find($id);

        $data = [
            'id' => $id,
            'qrCodePath' => $qrCodePath,
            'designation' => $material->designation
        ];

        $pdf = PDF::loadView('pdf.qrcode_pdf', $data);
        return $pdf->download('qrcode-' . $id . '.pdf');
    }


}
