<?php

namespace App\Controllers\Dokter;

use App\Models\Dokter\DokterModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DokterController extends BaseController
{
    protected $dokterModel;

    public function __construct()
    {
        $this->dokterModel = new DokterModel();
    }

    public function index()
    {
        $data['dokter'] = $this->dokterModel->findAll();
        return view('Admin/Dokter/v_dokter', $data);
    }

    public function store()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nama' => $this->request->getPost('nama'),
            'spesialis' => $this->request->getPost('spesialis'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        if ($id) {
            // Update data
            $this->dokterModel->update($id, $data);
            session()->setFlashdata('success', 'Data berhasil diperbarui.');
        } else {
            // Insert new data
            $this->dokterModel->insert($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        }

        return redirect()->to('/dokter');
    }

    public function destroy($id)
    {
        $this->dokterModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/dokter');
    }
}
