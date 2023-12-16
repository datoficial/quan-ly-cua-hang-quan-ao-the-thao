<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NhaCungCap extends Model
{
    protected $table = 'nhacungcap';
    public function SanPham(): HasMany
    {
        return $this->hasMany(SanPham::class, 'nhacungcap_id', 'id');
    }
}
