<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    protected $fillable = ['strand_name', 'strand_description'];


    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}