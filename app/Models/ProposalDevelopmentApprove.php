<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalDevelopmentApprove extends Model
{
    use HasFactory;

    protected $table = 'proposal_dev_approve';
    protected $primaryKey = 'proposal_dev_approve_id';

    public function PD()
    {
        return $this->hasOne(ProposalDev::class, 'proposal_dev_id', 'proposal_dev_id');
    }
}
