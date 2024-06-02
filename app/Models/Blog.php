<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Blog extends Model
{
    protected $table = 'bloglar';

    protected $fillable = [
        'blogBaslik',
        'blogIcerik',
        'yayinTarihi',
        'kullaniciId',
        'aktif',
        'kategoriId',
        'etiketler',
        'image'
    ];

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->created_at)->translatedFormat('d F Y');
    }

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullaniciId');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoriId');
    }

    public function yorumlar()
    {
        return $this->hasMany(Yorum::class, 'blogId');
    }
}
