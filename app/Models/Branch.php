<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'shopping_category_branch';

    protected $primaryKey = 'running_no';

    protected $fillable = [
        'shopping_category_id',
        'shopping_branch_id',
        'branch_name_en',
        'branch_full_name',
        'branch_details_file_name',
        'branch_part',
        'branch_status',
    ];


    public function shoppinglist(){
        return $this->hasMany(Shoppinglist::class);
    }
}

