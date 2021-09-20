<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalDevTestIssueMain extends Model
{
    protected $table = 'proposal_dev_test_issue_main';
    protected $primaryKey = 'test_issue_main_id';

    public function ProposalDevTestIssueSub()
    {
        return $this->hasMany('App\ProposalDevTestIssueSub', 'test_issue_main_id', 'test_issue_main_id');
    }
}
