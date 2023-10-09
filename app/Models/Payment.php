<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable=['payment_amount','subscription_id','remaining_payment','payment_status'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
