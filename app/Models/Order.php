<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use HasFactory;
    use Sortable;

    public $incrementing = false;

    protected $keyType = 'string';

    public static function boot(){
        parent::boot();

        static::creating(function ($issue) {
            $issue->id = Str::uuid(36);
        });
    }

    protected $fillable = [
        'delivery_address','user_id', 'created_at', 'grand_total'
    ];

    public $sortable = ['status'];

    public function item_order()
    {
        return $this->hasMany(ItemOrder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
