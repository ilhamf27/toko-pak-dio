<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    public static function boot(){
        parent::boot();

        static::creating(function ($issue) {
            $issue->id = Str::uuid(36);
        });
    }

    protected $fillable = [
        'delivery_address',
    ];

    public function item_order()
    {
        return $this->hasMany(ItemOrder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
