<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModePayment extends Model
{
    use HasFactory;
    protected $connection= 'mysql3';
    protected $table = 'bcs_staging.mode_of_payments';
}
