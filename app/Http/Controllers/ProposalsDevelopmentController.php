<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\ProposalDev;
use App\ProposalDevTSRI;
use App\Models\Typestatus;

use Illuminate\Support\Facades\Mail;

use DB;

class ProposalsDevelopmentController extends Controller
{

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

				pd.proposal_dev_id as pd_id,
				pd.updated_at as pd_updated_at,

				pd.*,
				t.types_name_th as research_type_name,
				tm.type_main_name as research_type_main_name,
				ts.type_sub_name as research_type_sub_name,
				u.name as user_name,

				flow.*,
				health.*,
				inno.*,
				nriis.*,
				rese.*,
				tsri.*

			from

				proposal_dev pd
				left join research_types t on pd.research_type_id = t.research_types_id
				left join type_main tm on pd.proposal_dev_type_main_id = tm.type_main_id
				left join type_sub ts on pd.proposal_dev_type_sub_id = ts.type_sub_id
				left join users u on pd.proposal_dev_user_id = u.id

				left join proposal_dev_flow flow on pd.proposal_dev_flow = flow.proposal_dev_flow_id
				left join proposal_dev_health health on pd.proposal_dev_health = health.proposal_dev_health_id
				left join proposal_dev_inno inno on pd.proposal_dev_inno = inno.proposal_dev_inno_id
				left join proposal_dev_nriis nriis on pd.proposal_dev_nriis = nriis.proposal_dev_nriis_id
				left join proposal_dev_rese rese on pd.proposal_dev_rese = rese.pd_rese_id
				left join proposal_dev_tsri tsri on pd.proposal_dev_tsri = tsri.proposal_dev_tsri_id

			where
				pd.created_at between '".$filter["begin"]."' and '".$filter["end"]." 23:59:59'
		";
		if( $filter["name"] != "" ){
			$q .= "
				and (
					pd.proposal_dev_code like '%".$filter["name"]."%'

				)
			";
		}
		if( $filter["research_type"] != "" ){
			$q .= "
				and (
					pd.research_type_id = ".$filter["research_type"]."
				)
			";
		}
		$q .= "
			order by pd.proposal_dev_id desc
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

			$updated_stamp = strtotime($rs[$i]->pd_updated_at);
			$rs[$i]->updated_date = date("d/m/",$updated_stamp).(date("Y",$updated_stamp)+543);
			$rs[$i]->updated_time = date("H:i:s",$updated_stamp);

		}


		$q_research_types = "
			select *
			from research_types
			where research_type_main_id = 3
		";
		$rs_research_types = DB::select($q_research_types);

		$q_status = "
			SELECT * FROM `type_status` WHERE type_main_id = 3 and ( type_sub_id = 2 or type_sub_id = 3 )
		";
		$rs_status = DB::select($q_status);


		return view('admin.proposal-development.index', compact( 'rs', 'filter', 'rs_research_types', 'rs_status' ));

	}

	public function show($id)
	{

		$rs_system_config = DB::select("select * from system_config where name = 'back_base'");
		$back_base = $rs_system_config[0]->value;

		$rs_system_config = DB::select("select * from system_config where name = 'front_base'");
		$front_base = $rs_system_config[0]->value;

		$q = "
			select
				pd.*,
				t.types_name_th as research_type_name,
				u.name as user_name
			from
				proposal_dev pd
				left join research_types t on pd.research_type_id = t.research_types_id
				left join users u on pd.proposal_dev_user_id = u.id
			where
				pd.proposal_dev_id = '".$id."'
		";
		$rs = DB::select($q);
		$r = $rs[0];


		if( $r->proposal_dev_flow > 0 ){

			$q_form = "
				select

					flow.*,

					prefix1.prefix_name_th as prefix_name1,
					position1.position_name as position_name1,
					department1.department_name as department_name1,

					prefix2.prefix_name_th as prefix_name2,
					position2.position_name as position_name2,
					department2.department_name as department_name2,

					prefix3.prefix_name_th as prefix_name3,
					position3.position_name as position_name3,
					department3.department_name as department_name3

				from

					proposal_dev_flow flow

					left join prefix prefix1 on flow.pd_flow_prefix_id1 = prefix1.prefix_id
					left join position position1 on flow.pd_flow_position_id1 = position1.position_id
					left join department department1 on flow.pd_flow_department_id1 = department1.department_id

					left join prefix prefix2 on flow.pd_flow_prefix_id2 = prefix2.prefix_id
					left join position position2 on flow.pd_flow_position_id2 = position2.position_id
					left join department department2 on flow.pd_flow_department_id2 = department2.department_id

					left join prefix prefix3 on flow.pd_flow_prefix_id3 = prefix3.prefix_id
					left join position position3 on flow.pd_flow_position_id3 = position3.position_id
					left join department department3 on flow.pd_flow_department_id3 = department3.department_id

				where

					flow.proposal_dev_flow_id = '".$r->proposal_dev_flow."'
			";
			$rs_form = DB::select($q_form);
			$form = $rs_form[0];

			return view('admin.proposal-development.flow', compact( 'r', 'form', 'front_base' ));

		}else if( $r->proposal_dev_health > 0 ){

			$q_form = "
				select

					health.*

				from

					proposal_dev_health health

				where
					health.proposal_dev_health_id = '".$r->proposal_dev_health."'
			";
			$rs_form = DB::select($q_form);
			$form = $rs_form[0];

			$q_peoples = "
				select

					people.*,

					prefix.prefix_name_th as prefix_name,
					position.position_name as position_name,
					department.department_name as department_name

				from

					proposal_dev_health_people people

					left join prefix on people.pd_health_people_prefix_id = prefix.prefix_id
					left join position on people.pd_health_people_position_id = position.position_id
					left join department on people.pd_health_people_department_id = department.department_id

				where
					proposal_dev_health_id = '".$r->proposal_dev_health."'
			";
			$peoples = DB::select($q_peoples);

			return view('admin.proposal-development.health', compact( 'r', 'form', 'peoples', 'front_base' ));

		}else if( $r->proposal_dev_inno > 0 ){

			$q_form = "
				select

					inno.*,

					prefix0.prefix_name_th as prefix_name0,
					position0.position_name as position_name0,
					department0.department_name as department_name0,

					prefix1.prefix_name_th as prefix_name1,
					position1.position_name as position_name1,
					department1.department_name as department_name1,

					prefix2.prefix_name_th as prefix_name2,
					position2.position_name as position_name2,
					department2.department_name as department_name2,

					budget_sourse.budget_name_TH as budget_name

				from

					proposal_dev_inno inno

					left join prefix prefix0 on inno.proposal_dev_inno_prefix = prefix0.prefix_id
					left join position position0 on inno.proposal_dev_inno_position = position0.position_id
					left join department department0 on inno.proposal_dev_inno_company = department0.department_id

					left join prefix prefix1 on inno.proposal_dev_inno_prefix = prefix1.prefix_id
					left join position position1 on inno.proposal_dev_inno_position = position1.position_id
					left join department department1 on inno.proposal_dev_inno_company = department1.department_id

					left join prefix prefix2 on inno.proposal_dev_inno_prefix = prefix2.prefix_id
					left join position position2 on inno.proposal_dev_inno_position = position2.position_id
					left join department department2 on inno.proposal_dev_inno_company = department2.department_id

					left join budget_sourse on inno.proposal_dev_inno_budget_id = budget_sourse.budget_id

				where

					inno.proposal_dev_inno_id = '".$r->proposal_dev_inno."'
			";
			$rs_form = DB::select($q_form);
			$form = $rs_form[0];

			$form->proposal_dev_inno_type_plan_array = explode(",",$form->proposal_dev_inno_type_plan);

			return view('admin.proposal-development.inno', compact( 'r', 'form', 'front_base' ));

		}else if( $r->proposal_dev_nriis > 0 ){

			$q_form = "
				select
					nriis.*
				from
					proposal_dev_nriis nriis
				where
					nriis.proposal_dev_nriis_id = '".$r->proposal_dev_nriis."'
			";
			$rs_form = DB::select($q_form);
			$form = $rs_form[0];
            $success_type = [
                'P'=>'Preliminary Results',
                'I'=>'Intermediate Results',
                'G'=>'Goal Results'
            ];
            $nriis_type = [
                '1' => 'การวิจัยพื้นฐาน (Basic Research)',
                '2' => 'การวิจัยประยุกต์ (Applied Research)',
                '3' => 'การวิจัยและพัฒนา (Research and Development)'
            ];
			return view('admin.proposal-development.nriis', compact( 'r', 'form','nriis_type','success_type', 'front_base' ));

		}else if( $r->proposal_dev_rese > 0 ){

			$q_form = "
				select
					rese.*
				from
					proposal_dev_rese rese
				where
					rese.pd_rese_id = '".$r->proposal_dev_rese."'
			";
			$rs_form = DB::select($q_form);
			$form = $rs_form[0];
            $rese_standard = [
                '1' => 'มีการใช้สัตว์ทดลอง',
                '2' => 'มีการวิจัยในมนุษย์',
                '3' => 'มีการวิจัยที่เกี่ยวข้องกับความปลอดภัยทางชีวภาพ',
                '4' => 'มีการใช้ห้องปฏบัติการที่เกี่ยวกับสารเคมี'
            ];

			return view('admin.proposal-development.rese', compact( 'r', 'form','rese_standard', 'front_base'));

		}else if( $r->proposal_dev_tsri > 0 ){

			// $q_form = "
			// 	select
			// 		tsri.*
			// 	from
			// 		proposal_dev_tsri tsri
			// 	where
			// 		tsri.proposal_dev_tsri_id = '".$r->proposal_dev_tsri."'
			// ";
			// $rs_form = DB::select($q_form);
			// $form = $rs_form[0];
            $form = ProposalDevTSRI::select()->with('ProposalDevTSRIPeople', 'ProposalDevTSRIResult')->find($r->proposal_dev_tsri);
			return view('admin.proposal-development.tsri', compact( 'r', 'form', 'front_base' ));

		}

	}

	public function store(Request $request)
	{

		$data = new ProposalDev;
		if( $request->id != "" ){
			$data = ProposalDev::findOrFail($request->id);
		}

		$data->fill($request->all());
		$data->save();

		return response()->json($data, 200);

	}

	public function update(Request $request, $id)
	{
		$rs = ProposalDev::findOrFail($id)->update($request->all());

		$rs_status = Typestatus::where('type_status_id', $request->proposal_dev_status_id)->get();
		if( $rs_status[0]->is_approve ){
			$is_success = DB::table('proposal_dev_approve')->insert([
				'admin_id' => $request->admin_id,
				'proposal_dev_id' => $id,
				'proposal_dev_approve_status' => 1,
				'proposal_dev_approve_details' => $request->admin_name." - ".$rs_status[0]->type_status_action,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			]);
		}

		if( $rs_status[0]->is_notify ){

			if( $rs_status[0]->is_approve ){
				$blade = 'admin.mails.approved';
				$subject = 'Proposal development approved';
			}else{
				$blade = 'admin.mails.denied';
				$subject = 'Proposal development denied';
			}

			$rs = ProposalDev::where('proposal_dev_id', $id)->get();
			$r = $rs[0];

			$rs_user = DB::select("select * from users where id = '".$r->proposal_dev_user_id."'");
			$user = $rs_user[0];

			if( $user->email != "" ){
				$to_name = $user->name;
				$to_email = $user->email;
				$data = array(
					"code" => $r->proposal_dev_code,
					"name" => $r->proposal_dev_name
				);
				Mail::send($blade, $data, function($message) use ($to_name, $to_email, $subject) {
					$message->to($to_email, $to_name)->subject($subject);
					$message->from('research.imrta@gmail.com','IMRTA');
				});
			}

			return response()->json($user->email, 200);

		}

		return response()->json($rs, 200);
	}

}
