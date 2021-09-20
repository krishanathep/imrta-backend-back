<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psubmission extends Model
{
    protected $table = 'proposal_sub';

    protected $primaryKey = 'proposal_sub_id';

    protected $fillable = [
        'proposal_dev_approve_id',
        'proposalsub_ResearchType_id',
        'proposal_sub_status',
    ];

    public function progress(){
        return $this->hasMany(Progress::class);
    }

    public function pdevpaarove(){
        return $this->belongsTo(Pdevpaarove::class, 'proposal_dev_approve_id');
    }

    public function research(){
        return $this->belongsTo(Research::class, 'proposalsub_ResearchType_id');
    }
}
