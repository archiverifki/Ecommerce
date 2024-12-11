<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory,SoftDeletes;


    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'customer_id',
        'product_id',
        'qty',
        'total',
        'status',
      
    ];


    public function produk(){
        return $this->belongsTo(Produk::class);

    }

    public function customer(){
        return $this->belongsTo(Customer::class);

    }
   


}
