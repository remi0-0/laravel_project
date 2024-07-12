<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_kana',
        'phone',
        'email',
        'body'
    ];

    protected $dates = ['display_date']; //カラム ['created_at] format
}
