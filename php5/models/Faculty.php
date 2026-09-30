<?php

class Faculty
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM faculty";
        $result = $this->conn->query($sql);

        $faculty = [];

        while ($row = $result->fetch_assoc()) {
            $faculty[] = $row;
        }

        return $faculty;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM faculty WHERE faculty_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function create($data)
    {
        $sql = "INSERT INTO faculty
                (first_name, middle_name, last_name, age, gender, address, position, salary)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "sssisssd",
            $data['first_name'],
            $data['middle_name'],
            $data['last_name'],
            $data['age'],
            $data['gender'],
            $data['address'],
            $data['position'],
            $data['salary']
        );

        return $stmt->execute();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE faculty SET
                first_name = ?,
                middle_name = ?,
                last_name = ?,
                age = ?,
                gender = ?,
                address = ?,
                position = ?,
                salary = ?
                WHERE faculty_id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "sssisssdi",
            $data['first_name'],
            $data['middle_name'],
            $data['last_name'],
            $data['age'],
            $data['gender'],
            $data['address'],
            $data['position'],
            $data['salary'],
            $id
        );

        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM faculty WHERE faculty_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}
?>