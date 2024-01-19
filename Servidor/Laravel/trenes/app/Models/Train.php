<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'passengers', 'year', 'train_type_id'];

    public function train_type()
    {
        return $this->belongsTo(TrainType::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
