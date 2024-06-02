<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoriler';

    protected $fillable = [
        'kategoriAdi',
        'aktif'
    ];

    public function bloglar()
    {
        return $this->hasMany(Blog::class, 'kategoriId');
    }
}
