<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table = 'multimedia';

    protected $fillable = [
        'user_id', 'title', 'description', 'file'
    ];
}
