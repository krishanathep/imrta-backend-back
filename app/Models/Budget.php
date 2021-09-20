<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $table = 'budget_sourse';

    protected $primaryKey = 'budget_id';

    protected $fillable = [
        'budget_prefix',
        'budget_name_TH',
        'budget_name_EN',
        'budget_type',
    ];
}
