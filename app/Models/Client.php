<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address_id',
        'type_client_id',
        'nom',
        'prenom',
        'description',
        'telephone',
        'nif',
        'assujet_tva',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'address_id' => 'integer',
        'type_client_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function typeClient()
    {
        return $this->belongsTo(TypeClient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
