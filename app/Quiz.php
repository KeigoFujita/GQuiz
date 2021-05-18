<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $fillable = ['name','description','status', 'expires_at', 'type'];

    public function items() : HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function schoolClass() : BelongsTo
    {
        return $this->belongsTo(SchoolClass::class);
    }
}
