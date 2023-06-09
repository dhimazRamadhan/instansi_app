<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instansi_model extends Model
{
    protected $table = 'tb_instansi';

    protected $fillable = [
        'aksi',
        'instansi',
        'deskripsi',
    ];
}
