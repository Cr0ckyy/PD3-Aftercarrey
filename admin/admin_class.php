<?php

// creates a session or resumes the current one based on a session identifier
//  passed via a GET or POST request, or passed via a cookie.
session_start();

// Action
Class Action {

    public $db;

    public function __construct() {

             // This function will turn output buffering on. 
        // While output buffering is active no output 
        // is sent from the script (other than headers), 
        // instead the output is stored in an internal buffer.
        ob_start();
        include 'db_connect.php';

        $this->db = $conn;
    }

// destruct
    public function __destruct() {
        $this->db->close();

        // The ob_end_flush() function deletes 
        // the topmost output buffer and outputs all of its contents. 
        // The output may be caught by another output buffer, or, 
        // if there are no other output buffers, sent directly to the browser.
        ob_end_flush();
    }

// login
    public function login() {
        
         // The extract() function imports variables into the local symbol table from an array.
        // This function uses array keys as variable names and values as variable values. 
        // For each element it will create a variable in the current symbol table.
        // This function returns the number of variables extracted on success.
        extract($_POST);

        $query = $this->db->query("SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "' ");
        if ($query->num_rows > 0) {
            foreach ($query->fetch_array() as $key => $value) {
                // is_numeric — Finds whether a variable is a number or a numeric string
                if ($key != 'password' && !is_numeric($key)) {
                    $_SESSION['login_' . $key] = $value;
                }
            }
            return 1;
        } else {
            return 3;
        }
    }

// login2
    public function login2() {
        extract($_POST);
        $query = $this->db->query("SELECT * FROM users where username = '" . $email . "' and password = '" . sha1($password) . "' ");

        if ($query->num_rows > 0) {
            foreach ($query->fetch_array() as $key => $value) {
                if ($key != 'password' && !is_numeric($key)) {
                    $_SESSION['login_' . $key] = $value;
                }
            }
            return 1;
        } else {
            return 3;
        }
    }

// logout
    public function logout() {

        // session_destroy — Destroys all data registered to a session
        session_destroy();
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }
        // //The header() function sends a raw HTTP header to a client
        header("location:login.php");
    }

// logout2
    public function logout2() {
        session_destroy();
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }

        header("location:../index.php");
    }

// save_user
    public function save_user() {
        extract($_POST);

        $data = " name = '$name' ";
        $data .= ", username = '$username' ";
        $data .= ", password = '$password' ";
        $data .= ", type = '$type' ";

        if (empty($id)) {
            $save = $this->db->query("INSERT INTO users SET " . $data);
        } else {
            $save = $this->db->query("UPDATE users SET " . $data . " WHERE id = " . $id);
        }
        if ($save) {
            return 1;
        }
    }



    // delete user
    public function delete_user() {
        extract($_POST);
        $delete = $this->db->query("DELETE FROM users WHERE id = " . $id);
        if ($delete) {
            return 1;
        }
    }




    // signup
    public function signup() {
        extract($_POST);

        $data = " name = '$name' ";
        $data .= ", contact = '$contact' ";
        $data .= ", address = '$address' ";
        $data .= ", username = '$email' ";
        $data .= ", password = '" . sha1($password) . "' ";
        $data .= ", type = 3";

        $check = $this->db->query("SELECT * FROM users WHERE username = '$email' ")->num_rows;

        if ($check > 0) {
            return 2;
            exit;
        }

        $save = $this->db->query("INSERT INTO users SET " . $data);

        if ($save) {
            $query = $this->db->query("SELECT * FROM users WHERE username = '" . $email . "' AND password = '" . sha1($password) . "' ");
            if ($query->num_rows > 0) {
                
                foreach ($query->fetch_array() as $key => $value) {
                    if ($key != 'password' && !is_numeric($key)) {
                        $_SESSION['login_' . $key] = $value;
                    }
                    
                }
            }
            return 1;
        }
    }

    // save settings
    public function save_settings() {

        extract($_POST);

        // The str_replace() function replaces some characters with some other characters in a string.
        $data = " name = '" . str_replace("'", "&#x2021;", $name) . "' ";
        $data .= ", email = '$email' ";
        $data .= ", contact = '$contact' ";

        // htmlentities - Convert some characters to HTML entities
        $data .= ", about_content = '" . htmlentities(str_replace("'", "&#x2021;", $about)) . "' ";

        if ($_FILES['img']['tmp_name'] != '') {

            // strtotime - Parse English textual datetimes into Unix timestamps:
            $file_name = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];

            // move_uploaded_file — Moves an uploaded file to a new location
            $move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/img/' . $file_name);
            $data .= ", cover_img = '$file_name' ";
        }

 // echo "INSERT INTO system_settings set ".$data;
        $check = $this->db->query("SELECT * FROM system_settings");

        if ($check->num_rows > 0) {
            $save = $this->db->query("UPDATE system_settings SET " . $data);
        } else {
            $save = $this->db->query("INSERT INTO system_settings SET " . $data);
        }

        if ($save) {
            $query = $this->db->query("SELECT * FROM system_settings LIMIT 1")->fetch_array();

            foreach ($query as $key => $value) {
                if (!is_numeric($key)) {
                    $_SESSION['setting_' . $key] = $value;
                }
            }

            return 1;
        }
    }

    public function save_category() {
        extract($_POST);

        $data = " name = '$name' ";

        if (!empty($_FILES['img']['tmp_name'])) {

            // strtotime — Parse about any English textual datetime description into a Unix timestamp
            $file_name = strtotime(date("Y-m-d H:i")) . "_" . $_FILES['img']['name'];

            // The move_uploaded_file() function moves an uploaded file to a new destination.
            $move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/img/' . $file_name);

            if ($move) {
                $data .= ", img_path = '$file_name' ";
            }
        }
        if (empty($id)) {
            $save = $this->db->query("INSERT INTO medical_specialty SET " . $data);
        } else {
            $save = $this->db->query("UPDATE medical_specialty SET " . $data . " WHERE id=" . $id);
        }
        if ($save) {
            return 1;
        }
    }

    public function delete_category() {

        extract($_POST);

        $delete = $this->db->query("DELETE FROM medical_specialty WHERE id = " . $id);
        if ($delete) {
            return 1;
        }
    }


    // save doctor
    public function save_doctor() {
        extract($_POST);
        
        $data = " name = '$name' ";
        $data .= ", name_pref = '$name_pref' ";
        $data .= ", clinic_address = '$clinic_address' ";
        $data .= ", contact = '$contact' ";
        $data .= ", email = '$email' ";

        if (!empty($_FILES['img']['tmp_name'])) {

            $file_name = strtotime(date("Y-m-d H:i")) . "_" . $_FILES['img']['name'];
            $move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/img/' . $file_name);

            if ($move) {
                $data .= ", img_path = '$file_name' ";
            }
        }

        // implode - Join array elements with a string:
        $data .= " , specialty_ids = '[" . implode(",", $specialty_ids) . "]' ";
        
        if (empty($id)) {
            $save = $this->db->query("INSERT INTO doctors_list SET " . $data);
            $did = $this->db->insert_id;
        } else {
            $save = $this->db->query("UPDATE doctors_list SET " . $data . " WHERE id=" . $id);
        }

        if ($save) {
            $data = " username = '$email' ";

            if (!empty($password)) {
                $data .= ", password = '" . $password . "' ";
            }

            $data .= ", name = 'Dr." . $name . ', ' . $name_pref . "' ";
            $data .= ", contact = '$contact' ";
            $data .= ", address = '$clinic_address' ";
            $data .= ", type = 2";

            if (empty($id)) {
                $check = $this->db->query("SELECT * FROM users WHERE username = '$email ")->num_rows;

                if ($check > 0) {
                    return 2;
                    exit;
                }

                $data .= ", doctor_id = '$did'";

                $save = $this->db->query("INSERT INTO users SET " . $data);
            } else {

                $check = $this->db->query("SELECT * FROM users WHERE username = '$email' AND doctor_id != " . $id)->num_rows;
                if ($check > 0) {
                    return 2;
                    exit;
                }

                $data .= ", doctor_id = '$id'";
                $check2 = $this->db->query("SELECT * FROM users WHERE doctor_id = " . $id)->num_rows;

                if ($check2 > 0) {
                    $save = $this->db->query("UPDATE users SET " . $data . " WHERE doctor_id = " . $id);
                } else {
                    $save = $this->db->query("INSERT INTO users SET " . $data);
                }
            }
            return 1;
        }
    }

    // delete doctor
    public function delete_doctor() {
        extract($_POST);
        $delete = $this->db->query("DELETE FROM doctors_list WHERE id = " . $id);
        if ($delete) {
            return 1;
        }
    }

    // save schedule
    public function save_schedule() {
        extract($_POST);
        foreach ($days as $key => $value) {

            $data = " doctor_id = '$doctor_id' ";
            $data .= ", day = '$days[$key]' ";
            $data .= ", time_from = '$time_from[$key]' ";
            $data .= ", time_to = '$time_to[$key]' ";

            if (isset($check[$key])) {
                if ($check[$key] > 0) {
                    $save[] = $this->db->query("UPDATE doctors_schedule SET " . $data . " WHERE id =" . $check[$key]);
                } else {
                    $save[] = $this->db->query("INSERT INTO doctors_schedule SET " . $data);
                }
            }
        }

        if (isset($save)) {
            return 1;
        }
    }

    // set appointment
    public function set_appointment() {
        extract($_POST);

        $doctor = $this->db->query("SELECT * FROM doctors_list WHERE id = " . $doctor_id);
        $schedule = date('Y-m-d', strtotime($date)) . ' ' . date('H:i', strtotime($time)) . ":00";
        $day = date('l', strtotime($date));
        $time = date('H:i', strtotime($time)) . ":00";
        $doctor_scheduled_check = $this->db->query("SELECT * FROM doctors_schedule WHERE doctor_id = $doctor_id AND day = '$day' AND ('$time' BETWEEN time_from AND time_to )");

        if ($doctor_scheduled_check->num_rows <= 0) {
            return json_encode(array('status' => 2, "msg" => "Appointment schedule is not valid for the doctor's schedule selected."));
            exit;
        }

        $data = " doctor_id = '$doctor_id' ";
        if (!isset($patient_id)) {
            $data .= ", patient_id = '" . $_SESSION['login_id'] . "' ";
        } else {
            $data .= ", patient_id = '$patient_id' ";
        }

        $data .= ", schedule = '$schedule' ";
        if (isset($status)) {
            $data .= ", status = '$status' ";
        }

        if (isset($id) && !empty($id)) {
            $save = $this->db->query("UPDATE appointment_list SET " . $data . " WHERE id = " . $id);
        } else {
            $save = $this->db->query("INSERT INTO appointment_list SET " . $data);
        }

        if ($save) {
            return json_encode(array('status' => 1));
        }
    }

    // delete appointment
    public function delete_appointment() {
        extract($_POST);
        $delete = $this->db->query("DELETE FROM appointment_list WHERE id = " . $id);

        if ($delete) {
            return 1;
        }
    }

    // delete message
    public function delete_message() {
        extract($_POST);

        $delete = $this->db->query("DELETE FROM messages WHERE id = " . $id);
        if ($delete) {
            return 1;
        }
    }

}
