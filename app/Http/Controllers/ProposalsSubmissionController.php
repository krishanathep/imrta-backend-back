<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\ProposalSub;
use App\ProposalDevTSRI;
use App\Models\Typestatus;

use Illuminate\Support\Facades\Mail;

use DB;

class ProposalsSubmissionController extends Controller
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

				ps.*,
				ps.updated_at as ps_updated_at,

				t.types_name_th as research_type_name,
				tm.type_main_name as research_type_main_name,
				ts.type_sub_name as research_type_sub_name,
				u.name as user_name,

				ps_nriis.*,
				ps_rese.*,
				ps_tsri.*,

				pd.*,
				flow.*,
				health.*,
				inno.*,
				nriis.*,
				rese.*,
				tsri.*

			from


				proposal_sub ps
				left join research_types t on ps.proposal_sub_research_type_id = t.research_types_id
				left join type_main tm on ps.proposal_sub_type_main_id = tm.type_main_id
				left join type_sub ts on ps.proposal_sub_type_sub_id = ts.type_sub_id
				left join users u on ps.proposal_sub_user_id = u.id


				left join proposal_dev_nriis ps_nriis on ps.proposal_sub_nriis = ps_nriis.proposal_dev_nriis_id
				left join proposal_dev_rese ps_rese on ps.proposal_sub_rese = ps_rese.pd_rese_id
				left join proposal_dev_tsri ps_tsri on ps.proposal_sub_tsri = ps_tsri.proposal_dev_tsri_id


				left join proposal_dev_approve pda on ps.proposal_dev_approve_id = pda.proposal_dev_approve_id

				left join proposal_dev pd on pda.proposal_dev_id = pd.proposal_dev_id

				left join proposal_dev_flow flow on pd.proposal_dev_flow = flow.proposal_dev_flow_id
				left join proposal_dev_health health on pd.proposal_dev_health = health.proposal_dev_health_id
				left join proposal_dev_inno inno on pd.proposal_dev_inno = inno.proposal_dev_inno_id
				left join proposal_dev_nriis nriis on pd.proposal_dev_nriis = nriis.proposal_dev_nriis_id
				left join proposal_dev_rese rese on pd.proposal_dev_rese = rese.pd_rese_id
				left join proposal_dev_tsri tsri on pd.proposal_dev_tsri = tsri.proposal_dev_tsri_id

			where
				ps.created_at between '".$filter["begin"]."' and '".$filter["end"]." 23:59:59'
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
					ps.proposal_sub_research_type_id = ".$filter["research_type"]."
				)
			";
		}
		$q .= "
			order by ps.proposal_sub_id desc
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

			$updated_stamp = strtotime($rs[$i]->ps_updated_at);
			$rs[$i]->updated_date = date("d/m/",$updated_stamp).(date("Y",$updated_stamp)+543);
			$rs[$i]->updated_time = date("H:i:s",$updated_stamp);

		}


		$q_research_types = "
			select *
			from research_types
			where research_type_main_id = 4
		";
		$rs_research_types = DB::select($q_research_types);

		$q_status = "
			SELECT * FROM `type_status` WHERE type_main_id = 4 and ( type_sub_id = 2 or type_sub_id = 3 )
		";
		$rs_status = DB::select($q_status);


		return view('admin.proposal-submission.index', compact( 'rs', 'filter', 'rs_research_types', 'rs_status' ));

	}

	public function show($id)
	{

		$rs_system_config = DB::select("select * from system_config where name = 'back_base'");
		$back_base = $rs_system_config[0]->value;

		$rs_system_config = DB::select("select * from system_config where name = 'front_base'");
		$front_base = $rs_system_config[0]->value;

		$q = "
			select

				ps.*,
				t.types_name_th as research_type_name,
				u.name as user_name,

				pd.*

			from

				proposal_sub ps
				left join research_types t on ps.proposal_sub_research_type_id = t.research_types_id
				left join users u on ps.proposal_sub_user_id = u.id

				left join proposal_dev_approve pda on ps.proposal_dev_approve_id = pda.proposal_dev_approve_id
				left join proposal_dev pd on pda.proposal_dev_id = pd.proposal_dev_id

			where
				ps.proposal_sub_id = '".$id."'
		";
		$rs = DB::select($q);
		$r = $rs[0];

		if( $r->proposal_sub_tsri > 0 || $r->proposal_dev_tsri > 0 ){

			if( $r->proposal_dev_approve_id > 0 ){
				$form_id = $r->proposal_dev_tsri;
			}else{
				$form_id = $r->proposal_sub_tsri;
			}

			$form = ProposalDevTSRI::select()->with('ProposalDevTSRIPeople', 'ProposalDevTSRIResult')->find($form_id);
			return view('admin.proposal-development.tsri', compact( 'r', 'form', 'front_base' ));

		}else if( $r->proposal_sub_rese > 0 || $r->proposal_dev_rese > 0 ){

			if( $r->proposal_dev_approve_id > 0 ){
				$form_id = $r->proposal_dev_rese;
			}else{
				$form_id = $r->proposal_sub_rese;
			}

			$q_form = "
				select
					rese.*
				from
					proposal_dev_rese rese
				where
					rese.pd_rese_id = '".$form_id."'
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

		}else if( $r->proposal_sub_nriis > 0 || $r->proposal_dev_nriis > 0 ){

			if( $r->proposal_dev_approve_id > 0 ){
				$form_id = $r->proposal_dev_nriis;
			}else{
				$form_id = $r->proposal_sub_nriis;
			}

			$q_form = "
				select
					nriis.*
				from
					proposal_dev_nriis nriis
				where
					nriis.proposal_dev_nriis_id = '".$form_id."'
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

		}

		// COPY FROM PD_CONTROLLERS
		// 3 อันนี้ไม่มีใน PS ถ้าเจอรายการที่สืบมาจาก PD ก็ให้ดึงฟอร์มมาใช้
		// ปล. ถ้าแก้ใน PD กรุณาเอามาอัพเดทตรงนี้ด้วย
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

		}
		// END COPY FROM PD_CONTROLLERS

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
		DB::statement("SET FOREIGN_KEY_CHECKS=0;");
		$rs = ProposalSub::findOrFail($id)->update($request->all());

		$rs_status = Typestatus::where('type_status_id', $request->proposal_sub_status_id)->get();
		if( $rs_status[0]->is_approve ){
			$is_success = DB::table('proposal_sub_approve_project')->insert([
				'admin_id' => $request->admin_id,
				'proposal_sub_check_approve_id' => $request->proposal_sub_status_id,
				'proposal_sub_id' => $id,
				'proposal_sub_approve_project_details' => $request->admin_name." - ".$rs_status[0]->type_status_action,
				'proposal_sub_approve_project_status' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			]);
		}

		DB::statement("SET FOREIGN_KEY_CHECKS=1;");


		if( $rs_status[0]->is_notify ){

			if( $rs_status[0]->is_approve ){
				$blade = 'admin.mails.approved';
				$subject = 'Proposal submission approved';
			}else{
				$blade = 'admin.mails.denied';
				$subject = 'Proposal submission denied';
			}

			$rs = ProposalSub::where('proposal_sub_id', $id)->get();
			$r = $rs[0];

			$rs_user = DB::select("select * from users where id = '".$r->proposal_sub_user_id."'");
			$user = $rs_user[0];

			if( $user->email != "" ){
				$to_name = $user->name;
				$to_email = $user->email;
				$data = array(
					"code" => $r->proposal_sub_code,
					"name" => ""
				);
				Mail::send($blade, $data, function($message) use ($to_name, $to_email, $subject) {
					$message->to($to_email, $to_name)->subject($subject);
					$message->from('research.imrta@gmail.com','IMRTA');
				});
			}

			return response()->json($user->email, 200);

		}


		return response()->json($request, 200);
	}

}
