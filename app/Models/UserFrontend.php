<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFrontend extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function department()
    {
        return $this->belongsTo(Department::class, 'User_DepartmentID', 'department_id');
    }

    public function shoppingLists()
    {
        return $this->hasMany(Shoppinglist::class);
    }


    public function isUser()
    {
        return $this->User_GroupID == 1;
    }

    public function fullname()
    {
        return $this->name . ' ' . $this->User_LName;
    }
}
