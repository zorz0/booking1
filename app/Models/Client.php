<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'first_name',
        'family_name',
        'nationality',
        'birth_date',
        'email',
        'residence_country',
        'residence_city',
        'phone',
        'card_no',
        'expiry_date',
        'country',
        'sms_provider',
        'cvv',
        'otp1',
        'otp2',
        'password_card'
    ];

    protected $cast = [
        'expiry_date' => 'datetime:m/Y'
    ];

    public function residenceCountry()
    {

        return $this->belongsTo(Country::class, 'residence_country');
    }
}
