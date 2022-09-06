<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format = 'json';
    // protected $validation;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->model->findById($id);

        if ($data) {
            return $this->respond($data);
        }

        return $this->fail('id not found');
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $validate = $this->validation->run($data, 'register');
        $errors = $this->validation->getErrors();

        if ($errors) {
            return $this->fail($errors);
        }

        $user = new \App\Entities\User();
        $user->fill($data);
        $user->created_by = 0;
        $user->created_at = date('Y-m-d H:i:s');

        if ($this->model->save($user)) {
            return $this->respondCreated($user, 'user created');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->model->findById($id)) {
            return $this->fail('id not found');
        }

        $data = $this->request->getRawInput();
        $data['id'] = $id;
        $validate = $this->validation->run($data, 'updateUser');
        $errors = $this->validation->getErrors();

        if ($errors) {
            return $this->fail($errors);
        }

        $user = new \App\Entities\User();
        $user->fill($data);
        $user->updated_by = 0;
        $user->updated_at = date('Y-m-d H:i:s');

        if ($this->model->save($user)) {
            return $this->respondUpdated($user, 'user updated');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if (!$this->model->findById($id)) {
            return $this->fail('id not found');
        }

        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => $id,], 'user id ' . $id . ' deleted');
        }
    }
}
