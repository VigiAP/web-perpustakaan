<?php

namespace App\Models;

use CodeIgniter\Model;

class BookmarkModel extends Model
{
    protected $table = 'bookmarks';
    protected $primaryKey = 'id_bookmark';
    protected $allowedFields = ['id_users', 'id_buku'];
}
