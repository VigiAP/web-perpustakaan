<?php

namespace App\Controllers;

use App\Models\UserModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function generatePdf($userId)
    {
        $user = $this->userModel->find($userId);

        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        $data = [
            'user' => $user,
            'username' => $user['username'],
            'password' => $user['password'],
            'no_hp' => $user['no_hp'],
            'role' => $user['role'],
        ];

        $html = view('dashboard/pustakawan/preview', $data);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream("kartu_anggota.pdf", ["Attachment" => 0]);
    }
}
