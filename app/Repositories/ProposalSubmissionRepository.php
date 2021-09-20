<?php

namespace App\Repositories;

use App\Models\ProposalSub;
use App\ProposalDevFlow;
use App\ProposalDevHealth;
use App\ProposalDevINNO;
use App\ProposalDevNRIIS;
use App\ProposalDevRESE;
use App\ProposalDevTSRI;
use App\ResearchTypes;
use App\TypeSub;

class ProposalSubmissionRepository extends BaseRepository
{

    const RESEARCH_MAIN_TYPE = 4;

    // const STATUS_APPROVED = 4;

    public static function proposalSubmission($filters = [])
    {
        $proposal_submissions = new ProposalSub;

        // if ( !empty($filters) ) {
        //     if ( !empty($filters['type_status_id']) ) {
        //         $concept_developments = $concept_developments->where('concept_type_status_id', $filters['type_status_id']);
        //     }
        // }

        return $proposal_submissions;
    }


    public static function myProposalSubmission($filters = [])
    {
        $my_proposal_submissions = Self::proposalSubmission($filters)
            ->where('proposal_sub_user_id', auth()->user()->id);

        return $my_proposal_submissions;
    }


    public static function getFormLink($PD)
    {
        // $research_type = Self::researchTypes()->where('research_types_id', $PD->research_type_id)->first();

        $form = '';

        if ( $PD->proposal_sub_tsri ) {
            $form = 'form3.create';

        } elseif ( $PD->proposal_sub_rese ) {
            $form = 'form4.create';

        } elseif ( $PD->proposal_sub_nriis ) {
            $form = 'form5.create';

        } elseif ( $PD->proposal_sub_flow ) {
            $form = 'form6.create';

        } elseif ( $PD->proposal_sub_health ) {
            $form = 'form7.create';

        } elseif ( $PD->proposal_sub_inno ) {
            $form = 'form8.create';

        }

        // dd($form, $PD, $research_type);
        return $form;
    }


    public static function getFormData($PS)
    {
        $data = '';

        if ( $PS->proposal_sub_tsri ) {
            $data = ProposalDevTSRI::find($PS->proposal_sub_tsri);

        } elseif ( $PS->proposal_sub_rese ) {
            $data = ProposalDevRESE::find($PS->proposal_sub_rese);

        } elseif ( $PS->proposal_sub_nriis ) {
            $data = ProposalDevNRIIS::find($PS->proposal_sub_nriis);

        } elseif ( $PS->proposal_sub_flow ) {
            $data = ProposalDevFlow::find($PS->proposal_sub_flow);

        } elseif ( $PS->proposal_sub_health ) {
            $data = ProposalDevHealth::find($PS->proposal_sub_health);

        } elseif ( $PS->proposal_sub_inno ) {
            $data = ProposalDevINNO::find($PS->proposal_sub_inno);

        }
        return $data;
    }


    public static function getBudgetOnFormData($PS)
    {
        $form_data = Self::getFormData($PS);
        $budget = 0;

        if ( $form_data ) {
            if ( $form_data->pd_tsri_all_price ) {
                $budget = $form_data->pd_tsri_all_price;
            }
            elseif ( $form_data->pd_rese_all_price ) {
                $budget = $form_data->pd_rese_all_price;
            }
            elseif ( $form_data->pd_nriis_budget_project ) {
                $budget = $form_data->pd_nriis_budget_project;
            }
            elseif ( $form_data->pd_flow_all_price ) {
                $budget = $form_data->pd_flow_all_price;
            }
            elseif ( $form_data->pd_health_all_price ) {
                $budget = $form_data->pd_health_all_price;
            }
            elseif ( $form_data->proposal_dev_inno_all_price ) {
                $budget = $form_data->proposal_dev_inno_all_price;
            }
        }

        return $budget;
    }


    public static function getTimeline($PS)
    {
        $form = null;
        $timeline = [];

        if ( $PS->proposal_sub_tsri ) {
            $form = ProposalDevTSRI::find($PS->proposal_sub_tsri);
            $timeline = [
                'year'  => $form->pd_tsri_price_year,
                'start' => $form->pd_tsri_start,
                'end'   => $form->pd_tsri_end,
            ];

        } elseif ( $PS->proposal_sub_rese ) {
            $form = ProposalDevRESE::find($PS->proposal_sub_rese);
            $timeline = [
                'year'  => $form->pd_rese_price_year,
                'start' => $form->pd_rese_start,
                'end'   => $form->pd_rese_end,
            ];

        } elseif ( $PS->proposal_sub_nriis ) {
            $form = ProposalDevNRIIS::find($PS->proposal_sub_nriis);
            $timeline = [
                'year'  => $form->pd_nriis_price_year,
                'start' => $form->pd_nriis_start,
                'end'   => $form->pd_nriis_end,
            ];

        } elseif ( $PS->proposal_sub_flow ) {
            $form = ProposalDevFlow::find($PS->proposal_sub_flow);
            $timeline = [
                'year'  => $form->pd_flow_price_year,
                'start' => $form->pd_flow_start,
                'end'   => $form->pd_flow_end,
            ];

        } elseif ( $PS->proposal_sub_health ) {
            $form = ProposalDevHealth::find($PS->proposal_sub_health);
            $timeline = [
                'year'  => $form->pd_health_price_year,
                'start' => $form->pd_health_start,
                'end'   => $form->pd_health_end,
            ];

        } elseif ( $PS->proposal_sub_inno ) {
            $form = ProposalDevINNO::find($PS->proposal_sub_inno);
            $timeline = [
                'year'  => $form->proposal_dev_inno_price_year,
                'start' => $form->proposal_dev_inno_start,
                'end'   => $form->proposal_dev_inno_end,
            ];

        }

        return $timeline;
    }

    // public static function researchSubTypes()
    // {
    //     $research_sub_types = TypeSub::where('type_main_id', Self::RESEARCH_MAIN_TYPE);

    //     return $research_sub_types;
    // }


    // public static function researchTypes()
    // {
    //     $research_types = ResearchTypes::where('research_type_main_id', Self::RESEARCH_MAIN_TYPE);

    //     return $research_types;
    // }
}
