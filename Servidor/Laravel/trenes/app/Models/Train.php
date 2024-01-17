<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;
    public function train_type() {
        return $this->belongsTo(TrainType::class);
    }
    public function ticket() {
        return $this->hasOne(Ticket::class);
    }
}
