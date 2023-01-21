<?php

    //funzioni che eseguono le query nel db
    include("common.php");
    //controlla che l'email inserita dall'utente nel form di login sia presente nel db
    function checkEmail($email){
        try{
            $db = connectionToDb();
            $email = $db->quote($email);
            $row = $db->query("SELECT email FROM users WHERE email = $email");
        }catch(PDOException $error){
            die("Database error: " . $error->getMessage());
        }

        if($row->rowCount() > 0){
            return true;
        }else{
            return false;
        }
        $db = null;
    }
    //controlla che l'username inserita dall'utente nel form di login sia presente nel db
    function checkUsername($username){
        try{
            $db = connectionToDb();
            $username = $db->quote($username);
            $row = $db->query("SELECT username FROM users WHERE username = $username");
        }catch(PDOException $error){
            die("Database error: " . $error->getMessage());
        }
        //avendo utilizzato il PDO per connetterci con il DB, 
        //il PDOException ci serve per gestire eventuali errori di connessione del db

        //controllo che il db non sia vuoto
        if($row->rowCount() > 0){
            return true;
        }else{
            return false;;
        }
        $db = null;
    }

//inserire un nuovo utente all'interno del db
    function createUser($username, $email, $password){
        $db = connectionToDb();
        $user = $db->exec("INSERT INTO users(username, email, password, administrator) VALUES ('$username', '$email', '$password', '0')");
    }
//funzione per connettersi al database
    function connectionToDb(){
        $db = new PDO("mysql:host=localhost;dbname=progetto_tech_web", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
//I PHP Data Objects (PDO) sono una raccolta di API utilizzate per accedere
//e lavorare con i database.

//controllo che la password inserita dall'utente nel login sia corretta; in questo caso il parametro $pwd
//passato dal file chechLogin corrisponde già alla pasword criptata.
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
//controlla quale valore è presente nella colonna "administrator" del db, dove viene
//salvato il valore 1 o 0 in base al fatto che l'utente in questione sia un admin o un utente semplice.
//Questo valore verrà poi passato alla pagina checkLogin.php per differenziare l'accesso.
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


//get mobili è una funzione che permette di recuperare le informazioni sui mobili presenti nel
//db ma non li stampa.
//La funzione di stampa dei dati ricevuti dal db si trova nel file homepage.js,
//che a sua volta riceve i dati ottenuti dal db convertiti in json dal file getProduct.php
    function getmobili(){
        try {
            $db = connectionToDb();
            $rows = $db->query("SELECT id, name, price, type FROM mobili");
        } catch (PDOException $error) {
            die('Database error: ' . $error->getMessage());
        }

        return $rows;

        $db = null;
    }
    //getProductCart è una funzione che permette di recuperare le informazioni sui prodotti inseriti 
    //nel carrello presenti nel db ma non li stampa.
    //La funzione di stampa dei dati ricevuti dal db si trova nel file carrello.js,
    //che a sua volta riceve i dati ottenuti dal db convertiti in json dal file getProductCart.php
    function getProductCart(){
        try {
            $db = connectionToDb();
            $rows = $db->query("SELECT id, name, price, type FROM mobili WHERE id IN (".implode(",",$_SESSION["cart"]).")");
        } catch (PDOException $error) {
            die('Database error: ' . $error->getMessage());
        }

        return $rows;

        $db = null;
    }
//funzione che elimina dal db degli articoli solo se l'accesso è stato effettuato da un admin. Non vi sono
//controlli poiché il button che permette l'eliminazione dei prodotti appare all'utente solo se ha già
//fatto l'accesso come admin.
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
//funzione che aggiunge nel db degli articoli solo se l'accesso è stato effettuato da un admin. Non vi sono
//controlli poiché il button che permette l'aggiunta di prodotti appare all'utente solo se ha già
//fatto l'accesso come admin.
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
