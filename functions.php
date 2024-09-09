<?php 

    function dbConnect() {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=myloc', 'root', 'root');
            return $dbh;
        }catch(PDOException $e){
            echo 'ça marche pas' . $e;
        }
    }

    function getAllObjects(){
        $dbh = dbConnect();
        $query = "SELECT * FROM Objets";
        $stmt = $dbh->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function getOwner($usrId){
        $dbh = dbConnect();
        $query = "SELECT nom, prenom, id FROM Users
        WHERE Users.id = $usrId";
        $stmt = $dbh->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function getBookings($objId){
        $dbh = dbConnect();
        $query = "SELECT date_debut, date_fin FROM emprunt
        WHERE FK_Object_Id = $objId";
        $stmt = $dbh->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getCategorie($objFKCatId){
        $dbh = dbConnect();
        $query = "SELECT Cat_nom FROM Categories
        WHERE Cat_Id = $objFKCatId";
        $stmt = $dbh->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


/*     function getProfile($userId){
        $dbh = dbConnect();
        $query = "SELECT * FROM Users
        WHERE Users.id = $userId";
        $stmt = $dbh->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } */

    function getAllUsers() {
        $dbh = dbConnect();
        $query= "SELECT * FROM Users";
        $stmt = $dbh->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getOwnedObjects($usrId) {
        $dbh = dbConnect();
        $query= "SELECT * FROM Objets
        WHERE FK_User_Id = $usrId";
        $stmt = $dbh->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
?>