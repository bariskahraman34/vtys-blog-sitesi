<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yorum extends Model
{
    protected $table = 'yorumlar';

    protected $fillable = [
        'yorumBaslik',
        'yorumIcerik',
        'yorumTarihi',
        'kullaniciId',
        'blogId',
        'aktif'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullaniciId');
    }
}
