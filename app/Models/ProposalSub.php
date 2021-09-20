<?php

namespace App\Models;

use App\Repositories\ProposalSubmissionRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalSub extends Model
{
    protected $table = 'proposal_sub';

    protected $primaryKey = 'proposal_sub_id';

    protected $fillable = [
        'proposal_dev_approve_id',
        'proposalsub_ResearchType_id',
        'proposal_sub_status',
        'proposal_sub_status_id',
    ];



    public function getFormLink()
    {
        return ProposalSubmissionRepository::getFormLink($this);
    }

    public function getFormData()
    {
        return ProposalSubmissionRepository::getFormData($this);
    }

    public function getBudgetOnFormData($PS = null)
    {
        return ProposalSubmissionRepository::getBudgetOnFormData($this);
    }

    public function getTimeline()
    {
        return ProposalSubmissionRepository::getTimeline($this);
    }



    public function progress(){
        return $this->hasMany(Progress::class);
    }

    public function pdevpaarove(){
        return $this->belongsTo(Pdevpaarove::class, 'proposal_dev_approve_id');
    }

    public function research(){
        return $this->belongsTo(Research::class, 'proposalsub_ResearchType_id');
    }

    public function approved()
    {
        return $this->hasOne( ProposalDevelopmentApprove::class, 'proposal_dev_approve_id', 'proposal_dev_approve_id' );
    }

    public function researchType()
    {
        return $this->hasOne( Research::class, 'research_types_id', 'proposal_sub_research_type_id' );
    }

    public function typeMain()
    {
        return $this->hasOne( Typemain::class, 'type_main_id', 'proposal_sub_type_main_id' );
    }

    public function typeSub()
    {
        return $this->hasOne( Typesub::class, 'type_sub_id', 'proposal_sub_type_sub_id' );
    }

    public function user()
    {
        return $this->hasOne( UserFrontend::class, 'id', 'proposal_sub_user_id' );
    }
}
