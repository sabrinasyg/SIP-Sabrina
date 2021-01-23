<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'name'     => $row[0],
            'username' => $row[1],
            'email'    => $row[2],
            'password' => Hash::make($row[3]),
            'address'  => $row[4],
            'grade'    => $row[5],
            'department'  => $row[6],
            'role_id'  => $row[7],
        ]);
    }
}
