<?php

namespace App\Controllers;

use App\Models\DataModel;
use App\Models\EmployeeDataModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('company_list');
    }

    public function editEmployee(): string
    {
        return view('edit_employee');
    }

    public function editCompany(): string
    {
        return view('edit_company');
    }
}