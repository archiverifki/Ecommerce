<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use HasUuids;


    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'customer_id',
        'product_id',
        'qty',
        'total',
        'status',

    ];


    public function produk()
    {
        return $this->belongsTo(Produk::class);

    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);

    }
}
