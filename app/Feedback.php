<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'date',
        'service_offered',
        'satisfaction_level',
        'services_again',
        'value_for_fee',
        'prices_quotes',
        'employee_response',
        'samples_easy',
        'turnaround_time',
        'delivery_my_needs',
        'reports_easy',
        'payments_easy',
        'previous_response',
        'help_feedback',
        'complaint'
    ];
}
