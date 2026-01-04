<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
    protected $fillable = ['loan_id','due_date','posted_at','amount','mode','is_late'];
    protected $casts = ['due_date'=>'date','posted_at'=>'date','is_late'=>'bool'];
    public function loan(){ return $this->belongsTo(Loan::class); }
}
