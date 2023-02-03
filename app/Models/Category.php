<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name'
    ];
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function operator()
    {
        return $this->belongsToMany('App\Models\Operator', 'operator_has_categories', 'category_id', 'operator_id');
    }
}
