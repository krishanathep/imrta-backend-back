<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'department';

    protected $primaryKey = 'department_id';

    protected $fillable = [
        'department_name',
        'department_details',
        'department_status',
    ];

    public function member(){
        return $this->hasMany(Member::class);
    }
}
