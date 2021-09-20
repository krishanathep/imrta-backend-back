<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typemain extends Model
{
    use HasFactory;

    protected $table = 'type_main';

    protected $primaryKey = 'type_main_id';

    public function typestatus(){
        return $this->hasMany(Typestatus::class);
    }

    public function research(){
        return $this->hasMany(Research::class);
    }
}
