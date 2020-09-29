<?php

namespace App\Imports;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
		// print_r($row);
        return new User([
            'company_name'     => $row[0],
            'user_id'    => $row[1],
            'name'    => $row[2],
            'email'    => $row[3],
            'phone_number'    => $row[4],
            'gender'    => $row[5],
            'branch'    => $row[6],
            'designation'    => $row[7],
            'dob'    => $row[8],
            'doj'    => $row[9],
        ]);
    }
}
