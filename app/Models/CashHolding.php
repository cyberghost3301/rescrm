<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashHolding extends Model
{
    protected $fillable = [
        'date',
        'previous_day_cash_holding',
        'today_total_collection',
        'today_total_expenses',
        'cash_in_hand',
        'cash_in_account',
        'cash_in_wallet',
        'total_cash',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
