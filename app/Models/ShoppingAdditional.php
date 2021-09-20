<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingAdditional extends Model
{

	use HasFactory;
	use SoftDeletes;

	protected $table = 'shopping_additional';

	protected $primaryKey = 'shopping_add_id';

	protected $fillable = [
        'user_id',
        'shopping_category_id',
        'shopping_add_name',
        'shopping_add_details',
        'shopping_list_status',
        'admin_approved_id'
    ];

}
