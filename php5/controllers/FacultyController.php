<?php

class FacultyController
{
    private $facultyModel;

    public function __construct($facultyModel)
    {
        $this->facultyModel = $facultyModel;
    }

    public function index()
    {
        $faculty = $this->facultyModel->getAll();

        require __DIR__ . "/../views/index.php";
    }

    public function create()
    {
        $data = [
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'age' => '',
            'gender' => '',
            'address' => '',
            'position' => '',
            'salary' => ''
        ];

        $errors = [];

        require __DIR__ . "/../views/form.php";
    }

    public function store()
    {
        $data = [
            'first_name' => trim($_POST['first_name'] ?? ''),
            'middle_name' => trim($_POST['middle_name'] ?? ''),
            'last_name' => trim($_POST['last_name'] ?? ''),
            'age' => trim($_POST['age'] ?? ''),
            'gender' => trim($_POST['gender'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
            'position' => trim($_POST['position'] ?? ''),
            'salary' => trim($_POST['salary'] ?? '')
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            require __DIR__ . "/../views/form.php";
            return;
        }

        $this->facultyModel->create($data);

        header("Location: index.php");
        exit;
    }

    public function edit($id)
    {
        $data = $this->facultyModel->getById($id);

        if (!$data) {
            die("Faculty not found.");
        }

        $errors = [];

        require __DIR__ . "/../views/form.php";
    }

    public function update($id)
    {
        $data = [
            'first_name' => trim($_POST['first_name'] ?? ''),
            'middle_name' => trim($_POST['middle_name'] ?? ''),
            'last_name' => trim($_POST['last_name'] ?? ''),
            'age' => trim($_POST['age'] ?? ''),
            'gender' => trim($_POST['gender'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
            'position' => trim($_POST['position'] ?? ''),
            'salary' => trim($_POST['salary'] ?? '')
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            $data['faculty_id'] = $id;

            require __DIR__ . "/../views/form.php";
            return;
        }

        $this->facultyModel->update($id, $data);

        header("Location: index.php");
        exit;
    }

    public function delete($id)
    {
        $this->facultyModel->delete($id);

        header("Location: index.php");
        exit;
    }

    private function validate($data)
    {
        $errors = [];

        if ($data['first_name'] === '') {
            $errors[] = "First name is required.";
        }

        if ($data['middle_name'] === '') {
            $errors[] = "Middle name is required.";
        }

        if ($data['last_name'] === '') {
            $errors[] = "Last name is required.";
        }

        if ($data['age'] === '') {
            $errors[] = "Age is required.";
        } elseif (!is_numeric($data['age']) || $data['age'] < 1 || $data['age'] > 120) {
            $errors[] = "Age must be between 1 and 120.";
        }

        if ($data['gender'] === '') {
            $errors[] = "Gender is required.";
        }

        if ($data['address'] === '') {
            $errors[] = "Address is required.";
        }

        if ($data['position'] === '') {
            $errors[] = "Position is required.";
        }

        if ($data['salary'] === '') {
            $errors[] = "Salary is required.";
        } elseif (!is_numeric($data['salary']) || $data['salary'] < 0) {
            $errors[] = "Salary must be a valid number.";
        }

        return $errors;
    }
}
?>