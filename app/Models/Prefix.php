<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefix extends Model
{
    use HasFactory;

    protected $table = 'prefix';

    protected $primaryKey = 'prefix_id';

    protected $fillable = [
        'prefix_name_th',
        'prefix_name_en',
        'prefix_status',
    ];

    public function member(){
        return $this->hasMany(Member::class);
    }
}
