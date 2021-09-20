<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalDevTSRI extends Model
{
    protected $table = 'proposal_dev_tsri';
    protected $primaryKey = 'proposal_dev_tsri_id';


    public function ProposalDevTSRIPeople()
    {
        return $this->hasMany('App\ProposalDevTSRIPeople', 'proposal_dev_tsri_id', 'proposal_dev_tsri_id');
    }
    public function ProposalDevTSRIResult()
    {
        return $this->hasMany('App\ProposalDevTSRIResult', 'proposal_dev_tsri_id', 'proposal_dev_tsri_id');
    }
}
