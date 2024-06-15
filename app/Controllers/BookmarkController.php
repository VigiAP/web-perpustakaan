<?php

namespace App\Controllers;

use App\Models\BookmarkModel;
use CodeIgniter\Controller;

class BookmarkController extends Controller
{
    public function add()
    {
        $bookmarkModel = new BookmarkModel();
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'id_buku' => $this->request->getPost('id_buku')
        ];
        $bookmarkModel->save($data);
        return $this->response->setJSON(['status' => 'success']);
    }
}
