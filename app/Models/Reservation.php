<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Reservation extends Model
{
    use HasFactory;
 
    public function scopeSearch($query){
        if(request('search_reservation')){
            
            return $query->where('id_pinjam','like','%'. request('search_reservation') . '%');
         }
        
    }
    public function user(){
        return $this->belongsTo(user::class)->withTrashed();
    } 

}
