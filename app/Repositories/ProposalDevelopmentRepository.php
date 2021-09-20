<?php

namespace App\Repositories;

use App\Models\ProposalDevelopment;
use App\ResearchTypes;
use App\TypeSub;

class ProposalDevelopmentRepository extends BaseRepository {

    const RESEARCH_MAIN_TYPE = 3;
    const STATUS_APPROVED = 12;

    public static function proposalDevelopment($filters = [])
    {
        $concept_developments = new ProposalDevelopment;

        if ( !empty($filters) ) {
            if ( !empty($filters['type_status_id']) ) {
                $concept_developments = $concept_developments->where('proposal_dev_status_id', $filters['type_status_id']);
            }
        }

        return $concept_developments;
    }


    public static function myProposalDevelopment($filters = [])
    {
        $my_concept_developments = Self::proposalDevelopment($filters)
            ->where('proposal_dev_user_id', auth()->user()->id)
        ;

        return $my_concept_developments;
    }


    public static function researchSubTypes()
    {
        $research_sub_types = TypeSub::where('type_main_id', Self::RESEARCH_MAIN_TYPE);

        return $research_sub_types;
    }


    public static function researchTypes()
    {
        $research_types = ResearchTypes::where('research_type_main_id', Self::RESEARCH_MAIN_TYPE);

        return $research_types;
    }


    public static function getFormLink($PD)
    {
        $research_type = Self::researchTypes()->where('research_types_id', $PD->research_type_id)->first();

        $form = '';

        if ( $PD->proposal_dev_tsri ) {
            $form = 'form3.create';

        } elseif ( $PD->proposal_dev_rese ) {
            $form = 'form4.create';

        } elseif ( $PD->proposal_dev_nriis ) {
            $form = 'form5.create';

        } elseif ( $PD->proposal_dev_flow ) {
            $form = 'form6.create';

        } elseif ( $PD->proposal_dev_health ) {
            $form = 'form7.create';

        } elseif ( $PD->proposal_dev_inno ) {
            $form = 'form8.create';

        }

        // dd($form, $PD, $research_type);
        return $form;
    }

}
