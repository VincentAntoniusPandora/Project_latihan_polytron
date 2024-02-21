<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataModel;
use App\Models\EmployeeDataModel;
use CodeIgniter\HTTP\ResponseInterface;

class EditController extends BaseController
{
    public function index()
    {
        return view('company_list');
    }

    public function removeEmployee($employee_id)
    {
        $dataModel = new EmployeeDataModel();
        $employee = $dataModel->where('employee_id', $employee_id)->first();
        $dataModel->delete($employee_id);
        if ($employee) {
            $company_id = $employee['company_id'];
        }

        return redirect()->to("/employeeList/$company_id");
    }

    public function editEmployee($employee_id)
    {
        $dataModel = new EmployeeDataModel();

        $isi = [
            'edit' => $dataModel->find($employee_id)
        ];

        return view('edit_employee', $isi);
    }

    public function updateEmployee($employee_id)
    {
        $dataModel = new EmployeeDataModel();

        $employee = $dataModel->where('employee_id', $employee_id)->first();
        if ($employee) {
            $company_id = $employee['company_id'];
        }

        $dataModel->save([
            'employee_id' => $employee_id,
            'employee_name' => $this->request->getVar('employee_name'),
            'employee_gender' => $this->request->getVar('employee_gender'),
            'employee_birthday' => $this->request->getVar('employee_birthday'),
            'employee_picture' => $this->request->getVar('employee_picture'),
            'employee_phone' => $this->request->getVar('employee_phone')
        ]);

        return redirect()->to("/employeeList/$company_id");
    }

    public function removeCompany($company_id)
    {
        $dataModel = new DataModel();
        $dataModel->delete($company_id);

        return redirect()->to('/');
    }

    public function editCompany($company_id)
    {
        $dataModel = new DataModel();


        $isi = [
            'edit' => $dataModel->find($company_id)
        ];

        return view('edit_company', $isi);
    }

    public function updateCompany($company_id)
    {
        $dataModel = new DataModel();

        $dataModel->save([
            'company_id' => $company_id,
            'company_name' => $this->request->getVar('company_name'),
            'company_phone' => $this->request->getVar('company_phone'),
            'company_address' => $this->request->getVar('company_address')
        ]);

        return redirect()->to('/');
    }
}
