<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdevpaarove extends Model
{
    use HasFactory;

    protected $table = 'proposal_dev_approve';

    protected $primaryKey = 'proposal_dev_approve_id';

    public function psubmission(){
        return $this->hasMany(Psubmission::class);
    }
}
