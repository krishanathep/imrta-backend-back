<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'User_prefix_id',
        'name',
        'User_LName',
        'User_DepartmentID',
        'user_position',
        'email', 
        'User_Mobile',
        'User_Status',
        'User_GroupID'
        //thest
    ];

    public function shoppinglist(){
        return $this->hasMany(Shoppinglist::class);
    }

    public function department(){
        return $this->belongsTo(Department::class, 'User_DepartmentID');
    }

    public function prefix(){
        return $this->belongsTo(Prefix::class, 'User_prefix_id');
    }

    public function position(){
        return $this->belongsTo(Position::class, 'User_Position_id');
    }

    public function addtional(){
        return $this->hasMany(Addtional::class);
    }

    public function progress(){
        return $this->hasMany(Progress::class);
    }

    public function groupuser(){
        return $this->belongsTo(Groupuser::class, 'User_GroupID');
    }
}
