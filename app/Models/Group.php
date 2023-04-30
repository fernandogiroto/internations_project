<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'users'
    ];

    /**
     * Protected Casts.
     * @var array
     */
    
     protected $casts = [
        'users' => 'array'
     ];
}
