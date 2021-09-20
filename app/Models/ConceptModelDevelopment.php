<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConceptModelDevelopment extends Model
{
	protected $table = 'concept_dev_model';

	protected $primaryKey = 'concept_dev_model_id';

	protected $fillable = [
		'concept_dev_status',
	];

}
