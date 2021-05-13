<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['question','answer','quiz_id'];


    public function quiz()
    {
        $this->belongsTo(Quiz::class);
    }
}
