<?php

namespace App\Models;

use CodeIgniter\Model;

class BookmarkModel extends Model
{
    protected $table = 'bookmark';
    protected $primaryKey = 'id_bookmark';
    protected $allowedFields = ['id_users', 'id_buku', 'created_at'];

    public function getBookmarkedPengetahuan($userId)
    {
        return $this->db->table('bookmark')
                    ->select('buku.*')
                    ->join('detail_kategori', 'detail_kategori.id_buku = bookmark.id_buku')
                    ->join('kategori', 'kategori.id_kategori = detail_kategori.id_kategori')
                    ->join('buku', 'buku.id_buku = bookmark.id_buku')
                    ->where('bookmark.id_users', $userId)
                    ->where('kategori.nama_kategori', 'pengetahuan')
                    ->get()
                    ->getResultArray();
    }

    public function getBookmarkedNovel($userId)
    {
        return $this->db->table('bookmark')
                    ->select('buku.*')
                    ->join('detail_kategori', 'detail_kategori.id_buku = bookmark.id_buku')
                    ->join('kategori', 'kategori.id_kategori = detail_kategori.id_kategori')
                    ->join('buku', 'buku.id_buku = bookmark.id_buku')
                    ->where('bookmark.id_users', $userId)
                    ->where('kategori.nama_kategori', 'novel')
                    ->get()
                    ->getResultArray();
    }

    public function getBookmarkedLainnya($userId)
    {
        return $this->db->table('bookmark')
                    ->select('buku.*')
                    ->join('detail_kategori', 'detail_kategori.id_buku = bookmark.id_buku')
                    ->join('kategori', 'kategori.id_kategori = detail_kategori.id_kategori')
                    ->join('buku', 'buku.id_buku = bookmark.id_buku')
                    ->where('bookmark.id_users', $userId)
                    ->where('kategori.nama_kategori !=', 'pengetahuan')
                    ->where('kategori.nama_kategori !=', 'novel')
                    ->get()
                    ->getResultArray();
    }

    public function deleteBookmark($book_id, $user_id)
    {
        return $this->where('id_buku', $book_id)
                    ->where('id_users', $user_id)
                    ->delete();
    }
}

