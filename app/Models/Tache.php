<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

//     public static function boot(){
//         parent::boot();
//         self::creating(function($tache){
//             $tache->user()->associate(auth()->user()->id);
//     });
// }
}
