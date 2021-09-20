<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingCategoryBranch extends Model
{

	use HasFactory;
	use SoftDeletes;

	protected $table = 'shopping_category_branch';

	protected $primaryKey = 'running_no'; // ควรจะเป็น shopping_branch_id

	protected $fillable = [
        'shopping_category_id',
        'shopping_branch_id',
		'branch_name_en',
		'branch_name_th',
		'branch_full_name',
		'branch_status'
	];

	public function shoppinglist(){
		return $this->hasMany(Shoppinglist::class);
	}

}
