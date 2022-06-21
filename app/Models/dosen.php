<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    use HasFactory;
    protected $table = "dosen";
    public function users()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }
}
