<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_kategori extends Model
{
    use HasFactory;
    protected $table = "sub_kategori";

    function kategori()
    {
        return $this->belongsTo(kategori::class,'kategori_id','id');
    }

}
