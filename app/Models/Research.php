<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $table = 'research_types';

    protected $primaryKey = 'research_types_id';

    protected $fillable = [
        'research_type_main_id',
        'types_name_th',
        'types_name_en',
        'research_types_detail',
        'types_status',
    ];

    public function concepdevelopment(){
        return $this->hasMany(Concepdevelopment::class);
    }

    public function proposaldevelopment(){
        return $this->hasMany(Proposaldevelopment::class);
    }

    public function psubmission(){
        return $this->hasMany(Psubmission::class);
    }

    public function typemain(){
        return $this->belongsTo(Typemain::class, 'research_type_main_id');
    }
}
