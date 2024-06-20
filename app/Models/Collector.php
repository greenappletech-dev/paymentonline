<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    use HasFactory;
    protected $collection = 'mysql3';
    protected $table = 'nha_region3_bcs2.collectors';
}
