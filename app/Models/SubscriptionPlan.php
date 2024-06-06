<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;
    protected $table = 'subscription_plan';

    protected $fillable = [
        'stripe_price_id',
        'subscription_name',
        'amount',
        'subscription_desc',
        'type'
    ];
}
