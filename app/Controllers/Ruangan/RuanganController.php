<?php

namespace App\Controllers\Ruangan;

use App\Controllers\BaseController;
use App\Models\Ruangan\RuanganModel;
use CodeIgniter\HTTP\ResponseInterface;


class RuanganController extends BaseController
{
    protected $ruanganModel;

    public function __construct() {
        $this->ruanganModel = new RuanganModel();
    }
    
    public function index()
    {
        $data['ruangan'] = $this->ruanganModel->findAll();
        return view('Admin/Ruangan/v_ruangan', $data);
    }

    public function store()
    {
        $id = $this->request->getPost('id');
        $data = [
            'kd_ruangan' => $this->request->getPost('kd_ruangan'),
            'nm_ruangan' => $this->request->getPost('nm_ruangan'),
        ];

        if ($id) {
            // Update data
            $this->ruanganModel->update($id, $data);
        } else {
            // Insert data
            $this->ruanganModel->save($data);
        }

        return redirect()->to('/ruangan');
    }


    public function destroy($id)
    {
        $this->ruanganModel->delete($id);
        return redirect()->to('/ruangan');
    }

}
