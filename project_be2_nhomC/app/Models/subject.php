<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $dates = ['deleted_at'];
}