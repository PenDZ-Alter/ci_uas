<?php
namespace App\Controllers;

use App\Models\EMP_model;

class Forms extends BaseController
{
  /** View Forms */
  // Employee Data
  public function viewFormEmp()
  {
    $model = new EMP_model();

    $data['emp'] = $model->getEmployee();

    echo view('dashboard/header');
    echo view('dashboard/nav');
    echo view('forms/emp', $data);
    echo view('dashboard/footer');
  }

  public function viewFormWP()
  {
    $model = new EMP_model();

    $data['alter'] = $model->getAlternativeRaw();
    $data['emp'] = $model->getEmployee();
    $data['miss_emp'] = $model->getMissingAlterUsers();
    $data['weight_c1'] = array_slice($model->getWeight(), 0, 4);
    $data['weight_c2'] = array_slice($model->getWeight(), 4, 4);
    $data['weight_c3'] = array_slice($model->getWeight(), 8, 4);
    $data['weight_c4'] = array_slice($model->getWeight(), 12, 4);
    $data['weight_c5'] = array_slice($model->getWeight(), 16, 4);

    echo view('dashboard/header');
    echo view('dashboard/nav');
    echo view('forms/wp', $data);
    echo view('dashboard/footer');
  }

  /** CRUD Data Logic */
  public function addEmp()
  {
    $model = new EMP_model();

    $name = $this->request->getPost('karyawan');
    $model->addEmployee($name);

    return redirect()->to(site_url("forms/emp"));
  }

  public function editEmp()
  {
    $model = new EMP_model();

    $id = $this->request->getPost('id');
    $name = $this->request->getPost('nama');

    $model->updateEmployee($id, $name);

    return redirect()->to(site_url("forms/emp"));
  }

  public function delEmp($id)
  {
    $model = new EMP_model();

    $model->deleteEmployee($id);

    return redirect()->to(site_url("forms/emp"));
  }

  public function addAlter()
  {
    $model = new EMP_model();

    $data['emp_id'] = $this->request->getPost("karyawan");
    $data['C1'] = $this->request->getPost("c1");
    $data['C2'] = $this->request->getPost("c2");
    $data['C3'] = $this->request->getPost("c3");
    $data['C4'] = $this->request->getPost("c4");
    $data['C5'] = $this->request->getPost("c5");

    $model->addAlter($data);

    return redirect()->to(site_url("forms/wp"));
  }

  public function delAlter($id)
  {
    $model = new EMP_model();

    $model->deleteAlter($id);

    return redirect()->to(site_url("forms/wp"));
  }
}