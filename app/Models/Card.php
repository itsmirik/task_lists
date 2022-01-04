<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desk_id'
    ];

    public function desk(): BelongsTo
    {
        return $this->belongsTo(Desk::class);
    }
}
