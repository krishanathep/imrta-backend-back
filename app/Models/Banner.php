<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banner';

    protected $primaryKey = 'banner_id';

    protected $fillable = [
        'banner_url',
        'banner_target_url',
        'banner_status',
        'user_admin_id',
        'start_date',
        'stop_date',
    ];
}
