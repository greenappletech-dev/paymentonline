<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $connection = 'mysql3';
    protected $table = 'nha_region3_bcs.collections';
}
