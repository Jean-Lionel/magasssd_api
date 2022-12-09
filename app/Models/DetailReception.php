<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailReception extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lot_id',
        'user_id',
        'product_id',
        'quantity',
        'prix_unitaire',
        'reception_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lot_id' => 'integer',
        'user_id' => 'integer',
        'product_id' => 'integer',
        'quantity' => 'double',
        'prix_unitaire' => 'double',
        'reception_id' => 'integer',
    ];

    public function lot()
    {
        return $this->belongsTo(Lot::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function reception()
    {
        return $this->belongsTo(Reception::class);
    }
}
