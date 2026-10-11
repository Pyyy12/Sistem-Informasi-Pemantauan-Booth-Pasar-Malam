<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wahana extends Model
{
    protected $table = 'wahana';

    protected $fillable = ['name', 'operator_name', 'location', 'status', 'opening_time', 'closing_time', 'notes'];

    public function activities(): HasMany
    {
        return $this->hasMany(WahanaActivity::class);
    }
}
