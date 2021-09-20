<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepapprove extends Model
{
    use HasFactory;

    protected $table = 'concept_dev_approve';

    protected $primaryKey = 'concept_dev_approve_id';

    public function proposaldevelopment(){
        return $this->hasMany(Proposaldevelopment::class);
    }
}
