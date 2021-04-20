<?php
    include "./class/Student.php";

    $method = $_SERVER["REQUEST_METHOD"];
    $student = new Student();
    
    switch($method) 
    {
        case 'GET':
            $id = $_GET['id'];
            if (isset($id))
            {
                $result = $student->find($id);
                $json_encode = json_encode(array('state' => true, 'student' => $result), true);
            }
            else
            {
                $result = $student->all();
                $json_encode = json_encode(array('state' => true, 'students' => $result), true);
            }
            header("Content-Type: application/json");
            echo($json_encode);
            break;

        case 'POST':
            $body = file_get_contents("php://input");
            $json_decoded = json_decode($body, true);

            $student->create($json_decoded["id"], $json_decoded["name"], $json_decoded["surname"], $json_decoded["sidi_code"], $json_decoded["tax_code"]);

            $json_encode = json_encode(array('state' => true), true);
            header("Content-Type: application/json");
            echo($json_encode);
            break;

        case 'DELETE':
            $body = file_get_contents("php://input");
            $json_decoded = json_decode($body, true);

            $student->delete($json_decoded["id"]);

            $json_encode = json_encode(array('state' => true), true);
            header("Content-Type: application/json");
            echo($json_encode);
            break;

        case 'PUT':
            $body = file_get_contents("php://input");
            $json_decoded = json_decode($body, true);

            $student->put($json_decoded["id"], $json_decoded["name"], $json_decoded["surname"], $json_decoded["sidi_code"], $json_decoded["tax_code"]);

            $json_encode = json_encode(array('state' => true), true);
            header("Content-Type: application/json");
            echo($json_encode);
            break;

        default:
            break;
    }
?>
