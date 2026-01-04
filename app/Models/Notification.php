<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Notification extends Model {
    protected $fillable = ['type','loan_id','event_date','read'];
    protected $casts = ['event_date'=>'date','read'=>'boolean'];
}
