<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchProgress extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'project_progress';


    public function PS()
    {
        return $this->belongsTo( ProposalSub::class, 'proposal_sub_id', 'proposal_sub_id' );
    }

    public function typeStatus()
    {
        return $this->hasOne( Typestatus::class, 'type_status_id', 'project_prograss_status_id' );
    }
}
