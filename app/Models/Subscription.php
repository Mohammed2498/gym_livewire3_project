<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';
    protected $fillable = [
        'subscriber_id', 'subscription_price',
        'duration', 'subtype', 'sport_type', 'start_date', 'end_date', 'status', 'plan_id'
    ];

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class, 'subscriber_id', 'id');
    }

    public function plan()
    {
        return $this->hasOne(Plan::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}
