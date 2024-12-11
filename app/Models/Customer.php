<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasUuids;

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'notelepon'
    ];


    public function orders()
    {

        return $this->hasMany(Order::class);
    }




}
