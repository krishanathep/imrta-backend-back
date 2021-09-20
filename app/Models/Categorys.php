<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    use HasFactory;

    protected $table = 'shopping_category';

    protected $primaryKey = 'shopping_category_id';

    protected $fillable = [
        'shopping_category_name_th',
        'shopping_category_name_en',
        'shopping_category_details',
        'shopping_category_status',
    ];

    public function shoppinglist(){
        return $this->hasMany(Shoppinglist::class);
    }

    public function addtional(){
        return $this->hasMany(Addtional::class);
    }
}
