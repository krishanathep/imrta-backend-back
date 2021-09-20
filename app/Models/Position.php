<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'position';

    protected $primaryKey = 'position_id';

    public function member(){
        return $this->hasMany(Member::class);
    }
}
