<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    public function getFullnameAttribute()
    {
        return $this->last_name.' '.$this->first_name;
    }

    protected $fillable = [
        'submit_username',
        'identity',
        'first_name',
        'last_name',
        'phone',
        'email',
        'unit',
        'sub',
        'authentication_type',
        'service_type',
        'validity',
        'status',
        'description',
    ];
}
