<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tent extends Model
{
    protected $fillable = [
        'code', 'name', 'tenant_id', 'location', 'rent_price', 'rent_period',
        'start_date', 'end_date', 'status', 'notes'
    ];

    protected $casts = ['start_date' => 'date', 'end_date' => 'date', 'rent_price' => 'decimal:2'];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
