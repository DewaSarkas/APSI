<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian extends Model
{
    use HasFactory;
    protected $table = "penilaian";

    function nilai()
    {
        return $this->belongsTo(nilai::class,'nilai_id','id');
    }

    function dokumen()
    {
        return $this->belongsTo(dokumen::class,'dokumen_id','id');
    }
}
