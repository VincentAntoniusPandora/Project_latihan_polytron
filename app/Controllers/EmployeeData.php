<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataModel;
use App\Models\EmployeeDataModel;
use CodeIgniter\HTTP\ResponseInterface;

class EmployeeData extends BaseController
{
    public function index($foreignKey)
    {
        $dataModel = new EmployeeDataModel();
        $CompanyModel = new DataModel();
        // $data = $dataModel->findAll();
        $employeeCompanyName = $CompanyModel->find($foreignKey);
        $employeeWithCompnyId = $dataModel->where('company_id', $foreignKey)->findAll();

        // cek tabel kosong atau tidak
        $message = empty($employeeWithCompnyId) ? "There is no Employee." : "";


        $isi = [
            'data' => $employeeWithCompnyId,
            'message' => $message,
            'company_id' => $foreignKey,
            'company_name' => $employeeCompanyName
        ];

        return view('employee_list', $isi);
    }

    public function addEmployeeView($company_id): string
    {
        $data = [
            'company_id' => $company_id
        ];
        return view('add_new_employee', $data);
    }

    public function addEmployee($company_id)
    {
        $dataModel = new EmployeeDataModel();

        $validation = \Config\Services::validation();


        $validation->setRules([
            'employee_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Employee Name field is required.'
                ]
            ],
            'employee_gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Employee Gender field is required.'
                ]
            ],
            'employee_birthday' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Employee Birthday field is required.'
                ]
            ],
            'employee_phone' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'The Employee Phone field is required.',
                    'numeric' => 'The Employee Phone field must be number.'
                ]
            ],
        ]);


        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $dataModel->save([
            'employee_name' => $this->request->getVar('employee_name'),
            'company_id' => $company_id,
            'employee_gender' => $this->request->getVar('employee_gender'),
            'employee_birthday' => $this->request->getVar('employee_birthday'),
            'employee_picture' => $this->request->getVar('employee_picture'),
            'employee_phone' => $this->request->getVar('employee_phone')
        ]);

        return redirect()->to("/employeeList/$company_id");
    }

    public function getEmployeeDetails($employee_id)
    {

        $model = new EmployeeDataModel();


        $employee = $model->find($employee_id);


        return $this->response->setJSON($employee);
    }
}
