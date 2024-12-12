<?php

namespace App\Controllers;

use App\Models\EMP_model;
use App\Models\WP_model;

class Home extends BaseController
{
    public function index(): string
    {   
        $model = new EMP_model();
        $modelWP = new WP_model();
        
        $data['emp'] = $model->getEmployee();
        $data['emp_total'] = $model->countData("employee");
        $data['cr_total'] = $model->countData("criteria_data");
        $data['wg_total'] = $model->countData("weight_data");
        $data['pref_rank'] = $modelWP->calculatePreferences();

        echo view('dashboard/header');
        echo view('dashboard/nav', $data);
        echo view('dashboard/content', $data);
        echo view('dashboard/footer');
        return 0;
    }
}
