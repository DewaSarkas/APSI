<?php

namespace App\Models;
use App\Models\sub_kategori;
use App\Models\penilaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumen extends Model
{
    use HasFactory;
    protected $table = "dokumen";

    public function sub_kategori()
    {
        return $this->belongsTo(sub_kategori::class,'sub_kategori_id','id');
    }

    public function penilaian()
    {
        return $this->hasOne(penilaian::class,'dokumen_id','id');
    }
}
