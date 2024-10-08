<?php

namespace App\Models\User;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'roles', 'notelp', 'alamat'];

}
