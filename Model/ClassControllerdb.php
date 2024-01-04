<?php 
function DocumentRender(){
    global $con;
    if(isset($_GET['class'])){
        $class = $_GET['class'];
        $sql = "SELECT * FROM documents WHERE id_class = :class";
             $statement  = $con->prepare($sql);
             $statement ->bindValue(":class", $class, PDO::PARAM_INT);
       if($statement->execute()) {
        $row = $statement->fetchAll();
        return $row;
       }else{
        return false;
       }
    }
}?>