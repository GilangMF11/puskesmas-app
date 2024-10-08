<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('Auth/v_login');
    }

    public function register()
    {
        return view('Auth/v_register');
    }

    public function loginProses()
    {
        $validation = \Config\Services::validation();
        $validationRules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return view('Auth/v_login', ['validation' => $validation]);
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session()->set('user_id', $user['id']);
                session()->set('role', $user['roles']);
                session()->set('isLoggedIn', true);
                session()->setFlashdata('success', 'Login berhasil');
                return redirect()->to('/dashboard');
            } else {
                return view('Auth/v_login', ['validation' => $validation, 'error' => 'Password salah']);
            }
        } else {
            return view('Auth/v_login', ['validation' => $validation, 'error' => 'Username tidak ditemukan']);
        }
    }

    public function registerProses()
    {
        log_message('debug', 'registerProses called');
        $data = [];

        if ($this->request->getMethod() === 'post') {
            log_message('debug', 'POST method detected');

            $validation = \Config\Services::validation();
            $validationRules = [
                'username' => 'required|alpha_numeric|min_length[3]',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]',
                'confirm_password' => 'required|matches[password]',
            ];

            if (!$this->validate($validationRules)) {
                $data['validation'] = $validation;
                return view('Auth/v_register', $data);
            }

            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $notelp = $this->request->getPost('notelp');
            $alamat = $this->request->getPost('alamat');

            $userData = [
                'username' => htmlspecialchars($username, ENT_QUOTES, 'UTF-8'),
                'email' => htmlspecialchars($email, ENT_QUOTES, 'UTF-8'),
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'roles' => 'User',
                'notelp' => $notelp ?? null,
                'alamat' => $alamat ?? null,
            ];

            log_message('debug', 'User data: ' . json_encode($userData));
            if ($this->userModel->insert($userData)) {
                log_message('debug', 'User inserted successfully');
                session()->setFlashdata('success', 'Pendaftaran berhasil, silakan login.');
                return redirect()->to('/login');
            } else {
                log_message('debug', 'Validation errors: ' . implode('<br>', $this->userModel->errors()));
                $data['error'] = implode('<br>', $this->userModel->errors());
                $data['username'] = $username;
                $data['email'] = $email;
            }
        }

        return view('Auth/v_register', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
