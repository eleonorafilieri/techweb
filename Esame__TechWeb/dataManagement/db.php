<?php

    //funzioni che eseguono le query nel db
    include("common.php");

    function checkEmail($email){
        try{
            $db = connectionToDb();
            $email = $db->quote($email);
            $row = $db->query("SELECT email FROM users WHERE email = $email");
        }catch(PDOException $error){
            die("Database error: " . $error->getMessage());
        }
        //FIXME: != NULL???? OPPURE countarows > 0
        if($row->rowCount() > 0){
            return true;
        }else{
            return false;
        }
        $db = null;
    }

    function checkUsername($username){
        try{
            $db = connectionToDb();
            $username = $db->quote($username);
            $row = $db->query("SELECT username FROM users WHERE username = $username");
        }catch(PDOException $error){
            die("Database error: " . $error->getMessage());
        }
        //FIXME: != NULL???? OPPURE countarows > 0
        if($row->rowCount() > 0){
            return true;
        }else{
            return false;;
        }
        $db = null;
    }


    function createUser($username, $email, $password){
        $db = connectionToDb();
        $user = $db->exec("INSERT INTO users(username, email, password, administrator) VALUES ('$username', '$email', '$password', '0')");
    }

    function connectionToDb(){
        $db = new PDO("mysql:host=localhost;dbname=progetto_tech_web", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    function checkPassword($username, $pwd) {
        try {
            $db = connectionToDb();
            $username = $db->quote($username);
            $rows = $db->query("SELECT password FROM users WHERE username = $username");
        } catch (PDOException $error) {
            die('Database error: ' . $error->getMessage());
        }
        if ($rows) {
            foreach ($rows as $row) {
                $password = $row["password"];
                return $pwd === $password;
            }
        } else {
        return false; //utente non trovato
        }
        //close connection
        $db = null;
    }

    function checkAdministrator($username){
        try {
            $db = connectionToDb();
            $username = $db->quote($username);
            $rows = $db->query("SELECT administrator FROM users WHERE username = $username");
        } catch (PDOException $error) {
            die('Database error: ' . $error->getMessage());
        }
        return $rows;
         $db = null;
    }

    function getmobili(){
        try {
            $db = connectionToDb();
            $rows = $db->query("SELECT p.id, p.name, p.price, p.type FROM mobili p");
        } catch (PDOException $error) {
            die('Database error: ' . $error->getMessage());
        }

        return $rows;

        $db = null;
    }

    function getProductCart(){
        try {
            $db = connectionToDb();
            $rows = $db->query("SELECT p.id, p.name, p.price, p.type FROM mobili p WHERE p.id IN (".implode(",",$_SESSION["cart"]).")");
        } catch (PDOException $error) {
            die('Database error: ' . $error->getMessage());
        }

        return $rows;

        $db = null;
    }

   function deleteProductAdmin($id){
        try {
            $db = connectionToDb();
            $rows = $db->query("DELETE FROM mobili WHERE id = $id");
        } catch (PDOException $error) {
            die('Database error: ' . $error->getMessage());
        }

        return $rows;
        $db = null;
    }

   function addProductAdmin($name, $price, $type){
        try {
            $db = connectionToDb();
            $rows = $db->query("INSERT INTO mobili (name, price, type) VALUES ('$name','$price','$type')");
        } catch (PDOException $error) {
            die('Database error: ' . $error->getMessage());
        }

        return $rows;
        $db = null;
    }

?>
