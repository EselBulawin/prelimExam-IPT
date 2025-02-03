<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Markup_history extends Model
{
    /** @use HasFactory<\Database\Factories\MarkupHistoryFactory> */
    use HasFactory;

    protected $fillable = [
        'date',
        'mark_up_rate',
    ];
}
