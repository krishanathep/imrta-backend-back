<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typesub extends Model
{
    use HasFactory;

    protected $table = 'type_sub';

    protected $primaryKey = 'type_sub_id';

    public function typestatus(){
        return $this->hasMany(Typestatus::class);
    }
}
