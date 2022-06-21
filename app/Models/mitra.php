<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mitra extends Model
{
    use HasFactory;
    protected $table = "mitra";
    public function users()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }
}
