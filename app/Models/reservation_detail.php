<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reservation_detail extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function book(){
        return $this->hasMany(Book::class,'book_id');
    }
    public function reservation(){
        return $this->belongsTo(reservation::class,'reservation_id');
    }
}
