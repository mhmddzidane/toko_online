<?php

namespace App\Controllers;

class Barang extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        $barangModel = new \App\Models\BarangModel();
        $barangs = $barangModel->findAll();

        return view('barang/index', [
            'barangs' => $barangs
        ]);

        return view('barang/index');
    }

    public function view()
    {
        $id = $this->request->uri->getSegment(3);

        $barangModel = new \App\Models\BarangModel();

        $barang = $barangModel->find($id);

        return view('barang/view.php', [
            'barang' => $barang
        ]);
    }

    public function create()
    {
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'barang');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $barangModel = new \App\Models\BarangModel();

                $barang = new \App\Entities\Barang();

                $barang->fill($data);
                $barang->gambar = $this->request->getFile('gambar');
                $barang->created_by = $this->session->get('id');
                $barang->created_date = date('Y-m-d H:i:S');

                $barangModel->save($barang);

                $id = $barangModel->InsertID();

                $segments = ['barang', 'view', $id];

                return redirect()->to(site_url($segments));
            }
        }
        return view('barang/create');
    }

    public function update()
    {
        $id = $this->request->uri->getSegment(3);

        $barangModel = new \App\Models\BarangModel();

        $barang = $barangModel->find($id);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'barangupdate');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $b = new \App\Entities\Barang();
                $b->id = $id;
                $b->fill($data);

                if ($this->request->getFile('gambar')->isValid()) {
                    $b->gambar = $this->request->getFile('gambar');
                }

                $b->updated_by = $this->session->get('id');
                $barang->updated_date = date('Y-m-d H:i:S');

                $barangModel->save($b);

                $segments = ['barang', 'view', $id];

                return redirect()->to(site_url($segments));
            }
        }

        return view('barang/update', [
            'barang' => $barang
        ]);
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(3);

        $barangModel = new \App\Models\BarangModel();
        $delete = $barangModel->delete($id);

        return redirect()->to(site_url('barang/index'));
    }
}
