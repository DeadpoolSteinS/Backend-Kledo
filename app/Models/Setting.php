<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings_overtime';
    protected $fillable = [
      'key',
      'value'
    ];

    protected $hidden = [];
    public $timestamps = false;
}
