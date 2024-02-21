<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataModel;
use CodeIgniter\HTTP\ResponseInterface;

class Data extends BaseController
{
    public function index()
    {
        $dataModel = new DataModel();
        $data = $dataModel->findAll();

        // cek tabel kosong atau tidak
        $rowCount = $dataModel->countAll();
        if ($rowCount === 0) {
            $message = "Database table is empty.";
        } else {
            $message = "";
        }

        $isi = [
            'data' => $data,
            'message' => $message
        ];

        return view('company_list', $isi);
    }

    public function addCompanyView(): string
    {
        return view('add_new_company');
    }

    public function addCompany()
    {
        $dataModel = new DataModel();

        $validation = \Config\Services::validation();


        $validation->setRules([
            'company_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Company Name field is required.'
                ]
            ],
            'company_phone' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'The Company Phone field is required.',
                    'numeric' => 'The Company Phone field must be number.'
                ]
            ],
            'company_address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Company Address field is required.'
                ]
            ]
        ]);


        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $dataModel->save([
            'company_name' => $this->request->getVar('company_name'),
            'company_phone' => $this->request->getVar('company_phone'),
            'company_address' => $this->request->getVar('company_address')
        ]);

        return redirect()->to('/');
    }
}
