<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsJenisProduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'tampilkan'
    ];
}
