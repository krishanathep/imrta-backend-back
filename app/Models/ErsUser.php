<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErsUser extends Model
{
    use HasFactory;
    
    protected $table = 'ers_users';
    protected $primaryKey = 'id';
}
