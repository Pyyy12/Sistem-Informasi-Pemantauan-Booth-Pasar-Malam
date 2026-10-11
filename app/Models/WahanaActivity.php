<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WahanaActivity extends Model
{
    protected $fillable = ['wahana_id', 'activity_date', 'status', 'visitor_count', 'income', 'notes', 'recorded_by'];
    protected $casts = ['activity_date' => 'date', 'income' => 'decimal:2'];

    public function wahana(): BelongsTo
    {
        return $this->belongsTo(Wahana::class);
    }
}
