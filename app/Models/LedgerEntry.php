<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LedgerEntry extends Model {
    protected $fillable = ['loan_id','entry_date','invoice_number','type','amount','note'];
    public function loan(){ return $this->belongsTo(Loan::class); }
}
