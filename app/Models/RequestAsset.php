<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestAsset extends Model
{
    use HasFactory;
    protected $table="requests";
    protected $guarded=[];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
