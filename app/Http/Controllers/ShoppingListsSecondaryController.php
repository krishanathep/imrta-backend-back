<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\ShoppingCategoryBranch;
use DB;

class ShoppingListsSecondaryController extends Controller
{

	public function index(Request $request)
	{

		$filter = array(
			"name" => $request->input('name'),
			"category" => $request->input('category'),
			"status" => $request->input('status'),
			"begin" => ( $request->input('begin') != "" ) ? $request->input('begin') : "2021-08-01",
			"end" => ( $request->input('end') != "" ) ? $request->input('end') : date("Y-m-d")
		);

		$q = "
			select
				b.*,
				c.shopping_category_name_th,
				c.shopping_category_name_en
			from
				shopping_category_branch b
				left join shopping_category c on b.shopping_category_id = c.shopping_category_id
			where
				b.deleted_at IS NULL and
				b.created_at between '".$filter["begin"]."' and '".$filter["end"]." 23:59:59'
		";
		if( $filter["name"] != "" ){
			$q .= "
				and (
					b.branch_name_en like '%".$filter["name"]."%' or
					b.branch_name_th like '%".$filter["name"]."%' or
					b.branch_full_name like '%".$filter["name"]."%'
				)
			";
		}
		if( $filter["category"] != "" ){
			$q .= "
				and (
					b.shopping_category_id = ".$filter["category"]."
				)
			";
		}
		if( $filter["status"] != "" ){
			$q .= "
				and (
					branch_status = '".$filter["status"]."'
				)
			";
		}
		$q .= "
			order by b.running_no desc
		";
		$rs = DB::select($q);

		foreach( $rs as $i => $r ){
			$updated_stamp = strtotime($rs[$i]->updated_at);
			$rs[$i]->updated_date = date("d/m/",$updated_stamp).(date("Y",$updated_stamp)+543);
			$rs[$i]->updated_time = date("H:i:s",$updated_stamp);
		}


		$rs_category = DB::select("select * from shopping_category");

		$rs_system_config = DB::select("select * from system_config where name = 'front_base'");
		$front_base = $rs_system_config[0]->value;

		// DB::statement("update system_config set value = 'http://imrtaclub.dms.go.th/public/' where name = 'front_base'");
		// DB::statement("update system_config set value = 'http://imrtaclub.dms.go.th/backend/public/' where name = 'back_base'");

		return view('admin.shoppinglists.secondary.index', compact( 'rs', 'filter', 'rs_category', 'front_base' ));

	}

	public function show($id)
	{
		$q = "
			select
				b.*,
				c.shopping_category_name_th as category_name
			from
				shopping_category_branch b
				left join shopping_category c on b.shopping_category_id = c.shopping_category_id
			where
				b.running_no = '".$id."'
		";
		$rs = DB::select($q);
		return response()->json($rs[0], 200);;
	}

	public function store(Request $request)
	{

		$data = new ShoppingCategoryBranch;
		if( $request->id != "" ){
			$data = ShoppingCategoryBranch::findOrFail($request->id);
		}

		$data->fill($request->all());
		$data->save();

		if( $request->hasFile('file1') ){

			if( $data->branch_part != "" ){
				File::delete('assets/pdf/'.$data->branch_part);
			}

			$file = $request->file('file1');
			$filename = $data->running_no."-".time()."-1.".$file->extension();
			$file->move(public_path('assets/pdf'), $filename);

			$data->branch_details_file_name = $file->getClientOriginalName();
			$data->branch_part = $filename;
			$data->save();

		}

		return response()->json($data, 200);

	}

	public function update(Request $request, $id)
	{
		$rs = ShoppingCategoryBranch::findOrFail($id)->update($request->all());
		return response()->json($rs, 200);
	}

	public function destroy(Request $request, $id)
	{
		$rs = ShoppingCategoryBranch::findOrFail($id)->delete();
		return response()->json($rs, 200);
	}

}