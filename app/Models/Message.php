<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        "date",
        "text",
        "ticket_id",
        "operator_id",
        "user_id"
    ];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);

    }
    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
