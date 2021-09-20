<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\ConceptDevelopment;
use App\Models\ConceptModelDevelopment;
use App\Models\Typestatus;

use Illuminate\Support\Facades\Mail;

use DB;

class ConceptsDevelopmentController extends Controller
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

				cd.*,
				cd.updated_at as cd_updated_at,

				t.types_name_th as research_type_name,
				tm.type_main_name as research_type_main_name,
				ts.type_sub_name as research_type_sub_name,
				u.name as user_name,

				di.*,
				dm.*

			from

				concept_dev cd
				left join research_types t on cd.research_type_id = t.research_types_id
				left join type_main tm on cd.concept_type_main_id = tm.type_main_id
				left join type_sub ts on cd.concept_type_sub_id = ts.type_sub_id
				left join users u on cd.concept_user_id = u.id

				left join concept_dev_inno di on cd.concept_dev_inno_id = di.concept_dev_inno_id
				left join concept_dev_model dm on cd.concept_dev_model_id = dm.concept_dev_model_id

			where
				cd.created_at between '".$filter["begin"]."' and '".$filter["end"]." 23:59:59'
		";
		if( $filter["name"] != "" ){
			$q .= "
				and (
					cd.concept_dev_code like '%".$filter["name"]."%'
				)
			";
		}

		if( $filter["research_type"] != "" ){
			$q .= "
				and (
					cd.research_type_id = ".$filter["research_type"]."
				)
			";
		}
		$q .= "
			order by cd.concept_dev_id desc
		";

		$rs = DB::select($q);

		foreach( $rs as $i => $r ){

			if( $rs[$i]->concept_dev_inno_id > 0 ){
				$rs[$i]->concept_dev_name_th = $rs[$i]->concept_dev_inno_name;
				$rs[$i]->concept_dev_name_en = "";
			}else if( $rs[$i]->concept_dev_model_id > 0 ){
				$rs[$i]->concept_dev_name_th = $rs[$i]->concept_dev_name_th;
				$rs[$i]->concept_dev_name_en = $rs[$i]->concept_dev_name_en;
			}

			$updated_stamp = strtotime($rs[$i]->cd_updated_at);
			$rs[$i]->updated_date = date("d/m/",$updated_stamp).(date("Y",$updated_stamp)+543);
			$rs[$i]->updated_time = date("H:i:s",$updated_stamp);

		}


		$q_research_types = "
			select *
			from research_types
			where research_type_main_id = 2
		";
		$rs_research_types = DB::select($q_research_types);

		$q_status = "
			SELECT * FROM `type_status` WHERE type_main_id = 2 and type_sub_id = 1
		";
		$rs_status = DB::select($q_status);


		$rs_system_config = DB::select("select * from system_config where name = 'back_base'");
		$back_base = $rs_system_config[0]->value;

		$rs_system_config = DB::select("select * from system_config where name = 'front_base'");
		$front_base = $rs_system_config[0]->value;


		return view('admin.concept-development.index', compact( 'rs', 'filter', 'rs_research_types', 'rs_status', 'back_base', 'front_base' ));

	}

	public function show($id)
	{

		$q = "
			select

				cd.*,
				cd.updated_at as cd_updated_at,

				t.types_name_th as research_type_name,
				tm.type_main_name as research_type_main_name,
				ts.type_sub_name as research_type_sub_name,
				u.name as user_name,

				di.*,
				inno_department.department_name as inno_department_name,
				inno_prefix.prefix_name_th as inno_prefix_name,
				inno_user1_prefix.prefix_name_th as inno_user1_prefix_name,
				inno_user2_prefix.prefix_name_th as inno_user2_prefix_name,
				inno_user1_department.department_name as inno_user1_department_name,
				inno_user2_department.department_name as inno_user2_department_name,

				dm.*,
				d.*,
				prefix.*

			from

				concept_dev cd
				left join research_types t on cd.research_type_id = t.research_types_id
				left join type_main tm on cd.concept_type_main_id = tm.type_main_id
				left join type_sub ts on cd.concept_type_sub_id = ts.type_sub_id
				left join users u on cd.concept_user_id = u.id

				left join concept_dev_inno di on cd.concept_dev_inno_id = di.concept_dev_inno_id
				left join department inno_department on di.concept_dev_inno_department_id = inno_department.department_id
				left join prefix inno_prefix on di.name_prefix_id = inno_prefix.prefix_id

				left join prefix inno_user1_prefix on di.user1_name_prefix_id = inno_user1_prefix.prefix_id
				left join prefix inno_user2_prefix on di.user2_name_prefix_id = inno_user2_prefix.prefix_id
				left join department inno_user1_department on di.concept_dev_inno_department_id1 = inno_user1_department.department_id
				left join department inno_user2_department on di.concept_dev_inno_department_id1 = inno_user2_department.department_id

				left join concept_dev_model dm on cd.concept_dev_model_id = dm.concept_dev_model_id
				left join department d on dm.concept_dev_department_id = d.department_id
				left join prefix on dm.name_prefix_id = prefix.prefix_id

			where
				cd.concept_dev_id = '".$id."'
		";
		$rs = DB::select($q);
		$r = $rs[0];

		if( !is_null($r->concept_dev_inno_id) ){
			return view('admin.concept-development.inno', compact( 'r' ));
		}else if( !is_null($r->concept_dev_model_id) ){
			return view('admin.concept-development.model', compact( 'r' ));
		}

	}

	public function store(Request $request)
	{

		$data = new ConceptDevelopment;
		if( $request->id != "" ){
			$data = ConceptDevelopment::findOrFail($request->id);
		}

		$data->fill($request->all());
		$data->save();

		return response()->json($data, 200);

	}

	public function update(Request $request, $id)
	{
		$rs = ConceptDevelopment::findOrFail($id)->update($request->all());

		$rs_status = Typestatus::where('type_status_id', $request->concept_type_status_id)->get();
		if( $rs_status[0]->is_approve ){

			$is_success = DB::table('concept_dev_approve')->insert([
				'concept_dev_id' => $id,
				'admin_id' => $request->admin_id,
				'research_status_id' => $request->concept_type_status_id,
				'concept_dev_approve_details' => $request->admin_name." - ".$rs_status[0]->type_status_action,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			]);

		}

		if( $rs_status[0]->is_notify ){

			if( $rs_status[0]->is_approve ){
				$blade = 'admin.mails.approved';
				$subject = 'Concept development approved';
			}else{
				$blade = 'admin.mails.denied';
				$subject = 'Concept development denied';
			}

			$rs = ConceptDevelopment::where('concept_dev_id', $id)->get();
			$r = $rs[0];

			$rs_user = DB::select("select * from users where id = '".$r->concept_user_id."'");
			$user = $rs_user[0];

			if( $user->email != "" ){
				$to_name = $user->name;
				$to_email = $user->email;
				$data = array(
					"code" => $r->concept_dev_code,
					"name" => $r->concept_dev_name
				);
				Mail::send($blade, $data, function($message) use ($to_name, $to_email, $subject) {
					$message->to($to_email, $to_name)->subject($subject);
					$message->from('research.imrta@gmail.com','IMRTA');
				});
			}

			return response()->json($user->email, 200);

		}

		return response()->json($rs_status[0]->is_notify, 200);
	}

}
