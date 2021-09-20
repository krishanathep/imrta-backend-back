<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use App\Models\ShoppingCategory;
use DB;

class ShoppingListsMainController extends Controller
{

	public function index(Request $request)
	{

		// $rs_system_config = DB::select("select * from system_config where name = 'back_base'");
		// $back_base = $rs_system_config[0]->value;

		// $rs_system_config = DB::select("select * from system_config where name = 'front_base'");
		// $front_base = $rs_system_config[0]->value;

		$filter = array(
			"name" => $request->input('name'),
			"details" => $request->input('details'),
			"status" => $request->input('status'),
			"begin" => ( $request->input('begin') != "" ) ? $request->input('begin') : "2021-08-01",
			"end" => ( $request->input('end') != "" ) ? $request->input('end') : date("Y-m-d")
		);

		$q = "
			select
				*
			from shopping_category
			where
				deleted_at IS NULL and
				created_at between '".$filter["begin"]."' and '".$filter["end"]." 23:59:59'
		";
		if( $filter["name"] != "" ){
			$q .= "
				and (
					shopping_category_name_th like '%".$filter["name"]."%' or
					shopping_category_name_en like '%".$filter["name"]."%'
				)
			";
		}
		// if( $filter["details"] != "" ){
		// 	$q .= "
		// 		and (
		// 			shopping_category_details like '%".$filter["details"]."%'
		// 		)
		// 	";
		// }
		if( $filter["status"] != "" ){
			$q .= "
				and (
					shopping_category_status = '".$filter["status"]."'
				)
			";
		}
		$q .= "
			order by shopping_category_id desc
		";
		$rs = DB::select($q);

		foreach( $rs as $i => $r ){

			if( $rs[$i]->shopping_cat_filepath1 == "" ){ $rs[$i]->shopping_cat_filepath1 = 'assets/images/default.png'; }

			$updated_stamp = strtotime($rs[$i]->updated_at);
			$rs[$i]->updated_date = date("d/m/",$updated_stamp).(date("Y",$updated_stamp)+543);
			$rs[$i]->updated_time = date("H:i:s",$updated_stamp);

		}

		return view('admin.shoppinglists.main.index', compact( 'rs', 'filter' ));

	}

	public function show($id)
	{
		$ShoppingCategory = ShoppingCategory::findOrFail($id);
		return $ShoppingCategory;
	}

	public function store(Request $request)
	{

		$data = new ShoppingCategory;
		if( $request->id != "" ){
			$data = ShoppingCategory::findOrFail($request->id);
		}

		$data->fill($request->all());
		$data->save();

		if( $request->hasFile('file1') ){

			if( $data->shopping_cat_filepath1 != "" ){
				File::delete('assets/images/'.$data->shopping_cat_filepath1);
			}

			$file = $request->file('file1');
			$filename = $data->shopping_category_id."-".time()."-1.".$file->extension();
			$file->move(public_path('assets/images'), $filename);

			$data->shopping_cat_filename1 = $file->getClientOriginalName();
			$data->shopping_cat_filepath1 = 'assets/images/'.$filename;
			$data->save();

		}

		if( $request->hasFile('file2') ){

			if( $data->shopping_cat_filepath2 != "" ){
				File::delete('assets/images/'.$data->shopping_cat_filepath2);
			}

			$file = $request->file('file2');
			$filename = $data->shopping_category_id."-".time()."-2.".$file->extension();
			$file->move(public_path('assets/images'), $filename);

			$data->shopping_cat_filename2 = $file->getClientOriginalName();
			$data->shopping_cat_filepath2 = 'assets/images/'.$filename;
			$data->save();

		}

		return response()->json($data, 200);

	}

	public function update(Request $request, $id)
	{
		$rs = ShoppingCategory::findOrFail($id)->update($request->all());
		return response()->json($rs, 200);
	}

	public function destroy($id)
	{
		ShoppingCategory::findOrFail($id)->delete();
		return redirect()->route('admin.shoppinglists.main.index')->with('success','Categorys Deleted successfully');
	}

}