<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = ['tent_id', 'tenant_id', 'type', 'amount', 'paid_at', 'method', 'reference', 'notes', 'recorded_by'];
    protected $casts = ['paid_at' => 'date', 'amount' => 'decimal:2'];

    public function tent(): BelongsTo
    {
        return $this->belongsTo(Tent::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
