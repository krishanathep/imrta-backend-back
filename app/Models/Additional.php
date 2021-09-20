<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    protected $table = 'shopping_additional';

    protected $primaryKey = 'shopping_add_id';

    protected $fillable = [
        'user_id',
        'shopping_category_id',
        'shopping_add_name',
        'shopping_add_details',
        'shopping_list_status',
    ];

    public function categorys(){
        return $this->belongsTo(Categorys::class, 'shopping_category_id');
    }

    public function members(){
        return $this->belongsTo(Members::class, 'user_id');
    }
}
