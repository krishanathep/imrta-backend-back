<?php

namespace App\Repositories;

use App\Models\ConceptDevelopment;
use App\ResearchTypes;

class ConceptDevelopmentRepository extends BaseRepository {

    const RESEARCH_MAIN_TYPE = 2;

    const STATUS_APPROVED = 4;

    public static function conceptDevelopment($filters = [])
    {
        $concept_developments = new ConceptDevelopment;

        if ( !empty($filters) ) {
            if ( !empty($filters['type_status_id']) ) {
                $concept_developments = $concept_developments->where('concept_type_status_id', $filters['type_status_id']);
            }
        }

        return $concept_developments;
    }


    public static function myConceptDevelopment($filters = [])
    {
        $my_concept_developments = Self::conceptDevelopment($filters)
            ->where('concept_user_id', auth()->user()->id)
        ;

        return $my_concept_developments;
    }


    public static function researchTypes()
    {
        $research_types = ResearchTypes::where('research_type_main_id', Self::RESEARCH_MAIN_TYPE);

        return $research_types;
    }

}
