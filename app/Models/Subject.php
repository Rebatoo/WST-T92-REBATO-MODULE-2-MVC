<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'units']; // Ensure these match your database columns

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}