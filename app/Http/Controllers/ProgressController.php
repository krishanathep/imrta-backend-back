<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\ProposalSub;
use App\Models\Progress;
use App\Models\Research;
use App\Models\ResearchProgress;
use App\Models\Typestatus;
use App\Models\User;
use App\Models\UserFrontend;
use DB;
use App\Repositories\ProposalSubmissionRepository as RepoPS;

class ProgressController extends Controller
{
    const STATUS_PROJECT_PROGRESS_MAIN_TYPE = 5;

	public function index(Request $request)
	{

		$filter = array(
			"name" => $request->input('name'),
			"research_type" => $request->input('research_type'),
			"begin" => ( $request->input('begin') != "" ) ? $request->input('begin') : "2021-08-01",
			"end" => ( $request->input('end') != "" ) ? $request->input('end') : date("Y-m-d")
		);

		$q = "
			select

				pp.*,
				pp.updated_at as pp_updated_at,
				ppu.name as pp_user_name,

				ps.*,
				t.types_name_th as research_type_name,
				u.name as user_name,

				pd.*,
				flow.*,
				health.*,
				inno.*,
				nriis.*,
				rese.*,
				tsri.*

			from

				project_progress pp
				left join users ppu on pp.user_id = ppu.id

				left join proposal_sub ps on pp.proposal_sub_id = ps.proposal_sub_id
				left join research_types t on ps.proposal_sub_research_type_id = t.research_types_id
				left join users u on ps.proposal_sub_user_id = u.id

				left join proposal_dev pd on ps.proposal_sub_code = pd.proposal_dev_code
				left join proposal_dev_flow flow on pd.proposal_dev_flow = flow.proposal_dev_flow_id
				left join proposal_dev_health health on pd.proposal_dev_health = health.proposal_dev_health_id
				left join proposal_dev_inno inno on pd.proposal_dev_inno = inno.proposal_dev_inno_id
				left join proposal_dev_nriis nriis on pd.proposal_dev_nriis = nriis.proposal_dev_nriis_id
				left join proposal_dev_rese rese on pd.proposal_dev_rese = rese.pd_rese_id
				left join proposal_dev_tsri tsri on pd.proposal_dev_tsri = tsri.proposal_dev_tsri_id

			where
				pp.deleted_at IS NULL and
				pp.created_at between '".$filter["begin"]."' and '".$filter["end"]." 23:59:59'
		";
		if( $filter["name"] != "" ){
			$q .= "
				and (
					ps.proposal_sub_code like '%".$filter["name"]."%' or
					pd.proposal_dev_name like '%".$filter["name"]."%' or
					pd.proposal_dev_details like '%".$filter["name"]."%'
				)
			";
		}
		if( $filter["research_type"] != "" ){
			$q .= "
				and (
					ps.proposal_sub_research_type_id = ".$filter["research_type"]."
				)
			";
		}
		$q .= "
			order by pp.proposal_sub_id desc
		";
		$rs = DB::select($q);

		foreach( $rs as $i => $r ){

			if( $rs[$i]->proposal_dev_flow > 0 ){
				$rs[$i]->proposal_dev_name_th = $rs[$i]->proposal_dev_flow_name_th;
				$rs[$i]->proposal_dev_name_en = $rs[$i]->proposal_dev_flow_name_en;
			}else if( $rs[$i]->proposal_dev_health > 0 ){
				$rs[$i]->proposal_dev_name_th = $rs[$i]->pd_health_name_th;
				$rs[$i]->proposal_dev_name_en = $rs[$i]->pd_health_name_en;
			}else if( $rs[$i]->proposal_dev_inno > 0 ){
				$rs[$i]->proposal_dev_name_th = $rs[$i]->proposal_dev_inno_name_th;
				$rs[$i]->proposal_dev_name_en = $rs[$i]->proposal_dev_inno_name_en;
			}else if( $rs[$i]->proposal_dev_nriis > 0 ){
				$rs[$i]->proposal_dev_name_th = $rs[$i]->proposal_dev_nriis_name_th;
				$rs[$i]->proposal_dev_name_en = $rs[$i]->proposal_dev_nriis_name_en;
			}else if( $rs[$i]->proposal_dev_rese > 0 ){
				$rs[$i]->proposal_dev_name_th = $rs[$i]->pd_rese_name_th;
				$rs[$i]->proposal_dev_name_en = $rs[$i]->pd_rese_name_en;
			}else if( $rs[$i]->proposal_dev_tsri > 0 ){
				$rs[$i]->proposal_dev_name_th = $rs[$i]->pd_tsri_name_th;
				$rs[$i]->proposal_dev_name_en = $rs[$i]->pd_tsri_name_en;
			}else{
				$rs[$i]->proposal_dev_name_th = $rs[$i]->proposal_dev_name;
				$rs[$i]->proposal_dev_name_en = "";
			}

			$updated_stamp = strtotime($rs[$i]->pp_updated_at);
			$rs[$i]->updated_date = date("d/m/",$updated_stamp).(date("Y",$updated_stamp)+543);
			$rs[$i]->updated_time = date("H:i:s",$updated_stamp);

		}


		$q_research_types = "
			select *
			from research_types
		";
		$rs_research_types = DB::select($q_research_types);

		$q_status = "
			SELECT * FROM `type_status` WHERE type_main_id = 4 and ( type_sub_id = 2 or type_sub_id = 3 )
		";
		$rs_status = DB::select($q_status);


        // dump($filter);

        $research_progresses = ResearchProgress::latest();

        if ( $request->name ) {
            $research_progresses = $research_progresses->whereHas('PS', function($q) use ($request) {
                $q->where('proposal_sub_code', 'like', '%'.$request->name.'%');
            });
        }

        if ( $request->research_type ) {
            $research_progresses = $research_progresses->whereHas('PS', function($q) use ($request) {
                $q->where('proposal_sub_research_type_id', $request->research_type);
            });
        }



        $research_progresses = $research_progresses->get()->groupBy('proposal_sub_id');


        $rs_research_types = Research::where('research_type_main_id', 3)
            ->whereNotIn('research_types_id', [8, 9, 14, 15])
        ->get();


		return view('admin.progress.index', compact(
            'research_progresses',
             'rs', 'filter', 'rs_research_types', 'rs_status'
            ));

	}

	public function show($id)
	{

		$q = "
			select

				pp.*,
				pp.updated_at as pp_updated_at,
				ppu.name as pp_user_name,

				ps.*,
				t.types_name_th as research_type_name,
				u.name as user_name,

				pd.*,
				flow.*,
				health.*,
				inno.*,
				nriis.*,
				rese.*,
				tsri.*

			from

				project_progress pp
				left join users ppu on pp.user_id = ppu.id

				left join proposal_sub ps on pp.proposal_sub_id = ps.proposal_sub_id
				left join research_types t on ps.proposal_sub_research_type_id = t.research_types_id
				left join users u on ps.proposal_sub_user_id = u.id

				left join proposal_dev pd on ps.proposal_sub_code = pd.proposal_dev_code
				left join proposal_dev_flow flow on pd.proposal_dev_flow = flow.proposal_dev_flow_id
				left join proposal_dev_health health on pd.proposal_dev_health = health.proposal_dev_health_id
				left join proposal_dev_inno inno on pd.proposal_dev_inno = inno.proposal_dev_inno_id
				left join proposal_dev_nriis nriis on pd.proposal_dev_nriis = nriis.proposal_dev_nriis_id
				left join proposal_dev_rese rese on pd.proposal_dev_rese = rese.pd_rese_id
				left join proposal_dev_tsri tsri on pd.proposal_dev_tsri = tsri.proposal_dev_tsri_id

			where
				ps.proposal_sub_id = '".$id."'
		";
		$rs = DB::select($q);

		$i = 0;
		if( $rs[$i]->proposal_dev_flow > 0 ){
			$rs[$i]->proposal_dev_name_th = $rs[$i]->proposal_dev_flow_name_th;
			$rs[$i]->proposal_dev_name_en = $rs[$i]->proposal_dev_flow_name_en;
		}else if( $rs[$i]->proposal_dev_health > 0 ){
			$rs[$i]->proposal_dev_name_th = $rs[$i]->pd_health_name_th;
			$rs[$i]->proposal_dev_name_en = $rs[$i]->pd_health_name_en;
		}else if( $rs[$i]->proposal_dev_inno > 0 ){
			$rs[$i]->proposal_dev_name_th = $rs[$i]->proposal_dev_inno_name_th;
			$rs[$i]->proposal_dev_name_en = $rs[$i]->proposal_dev_inno_name_en;
		}else if( $rs[$i]->proposal_dev_nriis > 0 ){
			$rs[$i]->proposal_dev_name_th = $rs[$i]->proposal_dev_nriis_name_th;
			$rs[$i]->proposal_dev_name_en = $rs[$i]->proposal_dev_nriis_name_en;
		}else if( $rs[$i]->proposal_dev_rese > 0 ){
			$rs[$i]->proposal_dev_name_th = $rs[$i]->pd_rese_name_th;
			$rs[$i]->proposal_dev_name_en = $rs[$i]->pd_rese_name_en;
		}else if( $rs[$i]->proposal_dev_tsri > 0 ){
			$rs[$i]->proposal_dev_name_th = $rs[$i]->pd_tsri_name_th;
			$rs[$i]->proposal_dev_name_en = $rs[$i]->pd_tsri_name_en;
		}else{
			$rs[$i]->proposal_dev_name_th = $rs[$i]->proposal_dev_name;
			$rs[$i]->proposal_dev_name_en = "";
		}

		// return response()->json($rs[0], 200);

        $PS = ProposalSub::where('proposal_sub_id', $id)->first();

        $user = UserFrontend::where('id', $PS->proposal_sub_user_id)->first();

        $progresses = ResearchProgress::where('proposal_sub_id', $id)->get();

        // dd($PS, $user, $progresses, $id);

        // return view('web.research-progresses.show', compact(
        //     'user',
        //     'PS',
        //     'statuses',
        //     'progresses'
        // ));

        return view('admin.progress.show', compact(
            'user',
            'PS',
            'progresses'
        ));

	}

	public function store(Request $request)
	{

		$data = new ProposalSub;
		if( $request->id != "" ){
			$data = ProposalSub::findOrFail($request->id);
		}

		$data->fill($request->all());
		$data->save();

		return response()->json($data, 200);

	}

	public function update(Request $request, $id)
	{
		$rs = Progress::findOrFail($id)->update($request->all());
		return response()->json($rs, 200);
	}

}
