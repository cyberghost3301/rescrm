<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model {
    protected $fillable = ['name','address','contact','alt_contact','vehicle_registration'];
    public function loans(){ return $this->hasMany(Loan::class); }
}
