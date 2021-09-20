<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupuser extends Model
{
    use HasFactory; 

    protected $table = 'user_group';

    protected $primaryKey = 'user_group_id';

    public function members(){
        return $this->hasMany(Members::class);
    }
}
