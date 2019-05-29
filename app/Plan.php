<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Eloquent
 */

class Plan extends Model
{
    protected $fillable = [
        'plan_name', 'plan_description', 'plan_price', 'plan_type', 'btn_label', 'amount', 'name', 'description',
        'plan_duration'
    ];
}
