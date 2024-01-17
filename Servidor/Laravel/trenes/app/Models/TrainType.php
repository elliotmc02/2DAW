<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainType extends Model
{
    use HasFactory;
    public function trains() {
        return $this->hasMany(Train::class);
    }
}
