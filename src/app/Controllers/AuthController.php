<?php

class AuthController
{
    use AuthValidator;
    public function login()
    {
        require_once '';
    }

    public function register()
    {
        require_once APP_DIR . 'views/register.php';
    }

    public function registerProcess()
    {
       $this->validate($_POST, [
           'name' => ['required', 'min:2', 'max:255'],
           'email' => ['required', 'email', 'min:6', 'max:255'],
           'password' => ['required', 'min:6', 'max:255', 'confirmed']
       ]);

       if ($this->errors) {
           Session::set('validation_errors', $this->errors);
           Response::redirect(Request::referer());
       }
    }
}