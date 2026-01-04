<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Loan extends Model {
    protected $fillable = [
        'customer_id','invoice_number','sale_date','closure_date','weekly_installment_day',
        'billed_amount','cash_payment','online_payment','scrap_value','total_payment',
        'financed_amount','finance_period_weeks','weekly_installment_amount',
        'weekly_skipped_installments','non_payment_penalty','late_payment_penalty',
        'total_amount_collected','total_amount_remaining','consecutive_missed_weeks'
    ];
    protected $casts = ['sale_date'=>'date','closure_date'=>'date'];
    public function customer(){ return $this->belongsTo(Customer::class); }
    public function payments(){ return $this->hasMany(Payment::class); }
    public function ledger(){ return $this->hasMany(LedgerEntry::class); }

    public function recomputeTotals(): void {
        $this->total_amount_remaining =
            $this->financed_amount + $this->non_payment_penalty + $this->late_payment_penalty - $this->total_amount_collected;
        $this->save();
    }
    
    public function ledgerEntries()
    {
        return $this->hasMany(LedgerEntry::class, 'invoice_number', 'invoice_number');
    }
}
