<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Izin extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'jenis_izin', 'tanggal_awal',
        'tanggal_akhir', 'jenis_hari', 'status'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getCreatedAttribute($create_at)
    {
        return Carbon::parse($create_at)->timestamp(3);
    }

    public function getUpdatedAttribute($update_at)
    {
        return Carbon::parse($update_at)->timestamp(3);
    }
}
