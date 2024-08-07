<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'price', 'train_id', 'ticket_type_id'];

    public function train()
    {
        return $this->belongsTo(Train::class);
    }
    public function ticket_type()
    {
        return $this->belongsTo(TicketType::class);
    }
}
