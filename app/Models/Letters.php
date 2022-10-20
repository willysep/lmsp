<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letters extends Model
{
    use HasFactory;
    protected $fillable = ['typeID', 'subject', 'letterNumber', 'slug', 'recipient', 'userID', 'statusID'];

    public function type()
    {
        return $this->belongsTo(LetterTypes::class, 'typeID');
    }
    
    public function status()
    {
        return $this->belongsTo(letterStatus::class, 'statusID');
    }
}
