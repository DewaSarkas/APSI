<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table="mahasiswa";

    public function users()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }
}
