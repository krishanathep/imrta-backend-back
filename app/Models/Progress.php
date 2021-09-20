<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
	use HasFactory;

	protected $table = 'project_progress';

	protected $primaryKey = 'project_prograss_id';

	protected $fillable = [
		'proposal_sub_id',
		'project_prograss_type',
		'project_prograss_expense_budget',
		'project_prograss_status',
		'project_prograss_active'
	];

	public function psubmission(){
		return $this->belongsTo(Psubmission::class, 'proposal_sub_id');
	}

	public function embers(){
		return $this->belongsTo(Members::class, 'user_id');
	}
}
