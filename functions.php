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
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function getOwner($usrId){
        $dbh = dbConnect();
        $query = "SELECT nom, prenom, id FROM Users
        WHERE Users.id = :usrId";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':usrId', $usrId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function getBookings($objId){
        $dbh = dbConnect();
        $query = "SELECT date_debut, date_fin FROM emprunt
        WHERE FK_Object_Id = :objId";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':objId', $objId);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getCategorie($objFKCatId){
        $dbh = dbConnect();
        $query = "SELECT Cat_nom, icon FROM Categories
        WHERE Cat_Id = :objFKCatId";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':objFKCatId', $objFKCatId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function getAllCategories(){
        $dbh = dbConnect();
        $query = "SELECT Cat_nom, Cat_Id, icon, points FROM Categories";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

/*     function getProfile($userId){
        $dbh = dbConnect();
        $query = "SELECT * FROM Users
        WHERE Users.id = $userId";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam();
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } */

    function getAllUsers() {
        $dbh = dbConnect();
        $query= "SELECT * FROM Users";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getOwnedObjects($usrId) {
        $dbh = dbConnect();
        $query= "SELECT * FROM Objets
        WHERE FK_User_Id = :usrId";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':usrId', $usrId);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getACategorie($catId) {
        if ($catId == "All") {
            return getAllObjects();
        }
        $dbh = dbConnect();
        $query= "SELECT * FROM Objets
        WHERE FK_Cat_Id = :catId";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':catId', $catId);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getUser($userId) {
        $dbh = dbConnect();
        $query= "SELECT * FROM Users
        WHERE Users.id = :userId";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function createCat($nom, $icon, $points){
        $dbh = dbConnect();
        $query= "INSERT INTO categories (Cat_nom, icon, points) VALUES(:nom, :icon, :points)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':icon', $icon);
        $stmt->bindParam(':points', $points);
        $stmt->execute();
    }

    function deleteCat($Cat_Id){
        $dbh = dbConnect();
        $query= "DELETE FROM categories
        WHERE Cat_Id = :catId";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':catId', $Cat_Id);
        $stmt->execute();
    }

    function createObjet($prop, $nom, $desc, $img, $cat){
        $dbh = dbConnect();
        $query= "INSERT INTO objets (FK_User_Id, obj_nom, obj_description, obj_image, FK_Cat_Id) VALUES(:prop, :nom, :desc, :img, :cat)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':prop', $prop);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':cat', $cat);
        $stmt->execute();
    }

    function deleteObject($obj_id){
        $dbh = dbConnect();
        $query= "DELETE FROM objets
        WHERE object_id = :objId";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':objId', $obj_id);
        $stmt->execute();
    }

?>