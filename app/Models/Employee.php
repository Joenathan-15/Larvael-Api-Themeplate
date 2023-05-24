<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    //for store data to database
    public static function store($data){
        $employee = new Employee;
        $employee->name = $data->name;
        $employee->age = $data->age;
        $employee->hobby = $data->hobby;
        $employee->save();
    }
}
