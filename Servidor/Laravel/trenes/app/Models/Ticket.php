<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function train_name()
    {
        return $this->belongsTo(Train::class);
    }
    public function ticket_type()
    {
        return $this->belongsTo(TicketType::class);
    }
}
