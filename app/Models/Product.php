<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
