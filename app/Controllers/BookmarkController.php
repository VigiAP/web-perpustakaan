<?php

namespace App\Controllers;

use App\Models\BookmarkModel;
use App\Models\BukuModel;

class BookmarkController extends BaseController
{
    protected $bookmarkModel;
    protected $bukuModel;

    public function __construct()
    {
        $this->bookmarkModel = new BookmarkModel();
        $this->bukuModel = new BukuModel();
    }

    public function bookmarkPengetahuan()
    {
        $userId = session()->get('id_users'); // Assuming user ID is stored in session
        $bookmarkedBooks = $this->bookmarkModel->getBookmarkedPengetahuan($userId);

        $data = [
            'title' => 'Bookmark',
            'bookmarkedBooks' => $bookmarkedBooks
        ];

        return view('dashboard/pengguna/bookmarkPengetahuan', $data);
    }

    public function bookmarkNovel()
    {
        $userId = session()->get('id_users'); // Assuming user ID is stored in session
        $bookmarkedBooks = $this->bookmarkModel->getBookmarkedNovel($userId);

        $data = [
            'title' => 'Bookmark',
            'bookmarkedBooks' => $bookmarkedBooks
        ];

        return view('dashboard/pengguna/bookmarkNovel', $data);
    }

    public function bookmarkLainnya()
    {
        $userId = session()->get('id_users'); // Assuming user ID is stored in session
        $bookmarkedBooks = $this->bookmarkModel->getBookmarkedLainnya($userId);

        $data = [
            'title' => 'Bookmark',
            'bookmarkedBooks' => $bookmarkedBooks
        ];

        return view('dashboard/pengguna/bookmarkLainnya', $data);
    }

    public function add()
    {
        $userId = session()->get('id_users'); // Assuming user ID is stored in session
        $bookId = $this->request->getPost('id_buku');

        log_message('debug', 'Session userId: ' . $userId);
        log_message('debug', 'Post bookId: ' . $bookId);

        // Cek apakah buku sudah ada di koleksi pengguna
        $existingBookmark = $this->bookmarkModel
                                 ->where('id_users', $userId)
                                 ->where('id_buku', $bookId)
                                 ->first();

        if ($existingBookmark) {
            log_message('error', 'Bookmark already exists: userId=' . $userId . ', bookId=' . $bookId);
            return redirect()->to(base_url('pengguna/bukuid/' . $bookId))->with('pesan', 'Buku sudah ada di koleksi.');
        }

        if ($userId && $bookId) {
            $this->bookmarkModel->save([
                'id_users' => $userId,
                'id_buku' => $bookId
            ]);
            log_message('debug', 'Bookmark added successfully: userId=' . $userId . ', bookId=' . $bookId);
            return redirect()->to(base_url('pengguna/bukuid/' . $bookId))->with('pesan2', 'Buku berhasil ditambahkan ke koleksi!');
        }

        log_message('error', 'Failed to add bookmark: userId=' . $userId . ', bookId=' . $bookId);
        return redirect()->to(base_url('pengguna/bukuid/' . $bookId))->with('pesan', 'Gagal menambahkan buku ke koleksi.');
    }

    public function hapusBookmark($id_buku)
    {
        $userId = session()->get('id_users'); // Assuming user ID is stored in session
        $this->bookmarkModel->deleteBookmark($id_buku, $userId);

        return redirect()->back()->with('pesan', 'Bookmark berhasil dihapus.');
    }
}
