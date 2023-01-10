<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;
    protected  $table = 'login_history';

    protected $fillable = [
        'name',
        'email',
        'created_at',
        'updated_at',
        'user_id'

    ];
}
