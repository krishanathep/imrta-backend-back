<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepdevelopment extends Model
{
    protected $table = 'concept_dev';

    protected $primaryKey = 'concept_dev_id';

    protected $fillable = [
        'shopping_list_id',
        'concept_dev_name',
        'concept_dev_details',
        'concept_dev_type',
        'research_type_id',
        'concept_dev_status',
    ];

    public function research(){
        return $this->belongsTo(Research::class, 'research_type_id');
    }

    public function shoppinglist(){
        return $this->belongsTo(Shoppinglist::class, 'shopping_list_id');
    }
}
