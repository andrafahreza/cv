<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPortfolio extends Model
{
    use HasFactory;

    protected $table     = 'category_portfolio';
    public $primaryKey   = 'id';
    protected $keyType   = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'category',
    ];

    public function portfolio(){
        return $this->hasMany(Portfolio::class, "id_category");
    }
}
