<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Ticket extends Model
{
    use HasFactory;


    protected $table = 'tickets';

    protected $fillable = [
       'title',
        'message',
        'status',
        'priority',
        'end_date',
        'category_id',
        'user_id',




    ];


    public function operator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Operator::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Chat::class);
    }
}
