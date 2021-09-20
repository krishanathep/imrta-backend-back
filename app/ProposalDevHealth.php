<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalDevHealth extends Model
{
    protected $table = 'proposal_dev_health';
    protected $primaryKey = 'proposal_dev_health_id';

    public function ProposalDevHealthPeople()
    {
        return $this->hasMany('App\ProposalDevHealthPeople', 'proposal_dev_health_id', 'proposal_dev_health_id');
    }
}

