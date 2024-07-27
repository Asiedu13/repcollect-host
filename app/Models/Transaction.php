<?php

namespace App\Models;

use App\Models\Focus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    public function focus()
    {
        return $this->belongsTo(Focus::class);
    }
}
