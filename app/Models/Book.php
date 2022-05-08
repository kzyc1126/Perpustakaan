<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function scopeSearch($query){
        if(request('search_title')){
            
            return $query->where('title','like','%'. request('search_title') . '%');
         }
    }
    protected $fillable = ['title','synopsis','image'];
    protected $dates = ['deleted_at'];
    public function reservation_detail(){
        return $this->belongsTo(reservation_detail::class,'book_id');
    }
}
