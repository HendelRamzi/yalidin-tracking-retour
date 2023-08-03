<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', "box_id"
    ];

    public function box(){
        return $this->belongsTo(Box::class);
    }

    public function stores(){
        return $this->hasMany(Store::class);
    }

    public function user(){
        return $this->belongsTo(User::class); 
    }
}
