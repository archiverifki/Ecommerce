<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    use HasUuids;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'description',
        'fotodepan',
        'fotobelakang',
        'price',
        'stock',
        'is_active'

    ];


    public function orders()
    {

        return $this->hasMany(Order::class);
    }



}
