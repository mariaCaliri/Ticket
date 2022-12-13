<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorHasCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'operator_id'
    ];
}
