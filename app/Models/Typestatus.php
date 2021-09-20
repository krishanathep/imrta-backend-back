<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typestatus extends Model
{
    use HasFactory;

    protected $table = 'type_status';

    protected $primaryKey = 'type_status_id';

    protected $fillable = [
        'type_sub_id',
        'type_main_id',
        'type_status_text' ,
        'type_status_action',
        'status',
    ];

    public function typemain(){
        return $this->belongsTo(Typemain::class, 'type_main_id');
    }

    public function typesub(){
        return $this->belongsTo(Typesub::class, 'type_sub_id');
    }
}
