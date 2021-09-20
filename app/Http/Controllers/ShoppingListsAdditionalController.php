<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\ShoppingAdditional;
use DB;

class ShoppingListsAdditionalController extends Controller
{

	public function index(Request $request)
	{

		$filter = array(
			"name" => $request->input('name'),
			"details" => $request->input('details'),
			"category" => $request->input('category'),
			"user" => $request->input('user'),
			"begin" => ( $request->input('begin') != "" ) ? $request->input('begin') : "2021-08-01",
			"end" => ( $request->input('end') != "" ) ? $request->input('end') : date("Y-m-d")
		);

		$q = "
			select
				a.*,
				c.shopping_category_name_th,
				c.shopping_category_name_en
			from
				shopping_additional a
				left join shopping_category c on a.shopping_category_id = c.shopping_category_id
			where
				a.deleted_at IS NULL and
				a.created_at between '".$filter["begin"]."' and '".$filter["end"]." 23:59:59'
		";
		if( $filter["name"] != "" ){
			$q .= "
				and (
					a.shopping_add_name_th like '%".$filter["name"]."%' or
					a.shopping_add_name_en like '%".$filter["name"]."%' or
					a.shopping_add_full_name like '%".$filter["name"]."%'
				)
			";
		}
		if( $filter["details"] != "" ){
			$q .= "
				and (
					a.shopping_add_details like '%".$filter["details"]."%'
				)
			";
		}
		if( $filter["category"] != "" ){
			$q .= "
				and (
					a.shopping_category_id = ".$filter["category"]."
				)
			";
		}
		if( $filter["user"] != "" ){
			$q .= "
				and (
					a.user_id = ".$filter["user"]."
				)
			";
		}
		$q .= "
			order by a.shopping_add_id desc
		";
		$rs = DB::select($q);

		foreach( $rs as $i => $r ){
			$updated_stamp = strtotime($rs[$i]->updated_at);
			$rs[$i]->updated_date = date("d/m/",$updated_stamp).(date("Y",$updated_stamp)+543);
			$rs[$i]->updated_time = date("H:i:s",$updated_stamp);
		}


		$q_category = "
			select *
			from shopping_category
		";
		$rs_category = DB::select($q_category);

		$q_users = "
			select *
			from users
		";
		$rs_users = DB::select($q_users);


		return view('admin.shoppinglists.additional.index', compact( 'rs', 'filter', 'rs_category', 'rs_users' ));

	}

	public function show($id)
	{
		$q = "
			select
				a.*,
				c.shopping_category_name_th as category_name,
				u.name as user_name,
				au.admin_name
			from
				shopping_additional a
				left join shopping_category c on a.shopping_category_id = c.shopping_category_id
				left join users u on a.user_id = u.id
				left join admin_user au on a.admin_approved_id = au.admin_id
			where
				a.shopping_add_id = '".$id."'
		";
		$rs = DB::select($q);
		return response()->json($rs[0], 200);;
	}

	public function update(Request $request, $id)
	{
		$rs = ShoppingAdditional::findOrFail($id)->update($request->all());
		return response()->json($rs, 200);
	}

	public function destroy(Request $request, $id)
	{
		$rs = ShoppingAdditional::findOrFail($id)->delete();
		return response()->json($rs, 200);
	}

}