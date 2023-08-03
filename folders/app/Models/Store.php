<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "shelf_id"
    ];

    public function shelf(){
        return $this->belongsTo(Shelf::class); 
    }
    public function codes(){
        return $this->hasMany(Tracking::class); 
    }
}
