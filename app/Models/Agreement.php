<?php

namespace CONTR\Models;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $fillable = [
        'title',
        'enrolment',
        'date_agreement',
        'date_event',
        'customer_id'
    ];

    protected $dates = [
        'date_agreement',
        'date_event'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
