<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Storage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', "zone_id"
    ]; 

    public function zone(){
        return $this->belongsTo(Zone::class); 
    }

}
