<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table     = 'portfolio';
    public $primaryKey   = 'id';
    protected $keyType   = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'id_category',
        'title',
        'photo',
        'link',
    ];

    public function category(){
        return $this->belongsTo(CategoryPortfolio::class, "id_category");
    }
}
