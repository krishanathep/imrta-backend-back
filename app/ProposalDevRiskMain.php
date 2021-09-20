<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalDevRiskMain extends Model
{
    protected $table = 'proposal_dev_risk_main';
    protected $primaryKey = 'risk_main_id';

    public function ProposalDevRiskSection()
    {
        return $this->hasMany('App\ProposalDevRiskSection', 'risk_main_id', 'risk_main_id');
    }
}
