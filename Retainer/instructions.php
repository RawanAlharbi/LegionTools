<!-- Write your instructions here -->

<h2 class="instructions" style="margin-left:25px"><u>Instructions</u></h2>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include('php/_db.php');

  try {
      $dbh = getDatabaseHandle();
  } catch( PDOException $e ) {
      echo $e->getMessage();
  }


if( $dbh ) {

   $task = $_REQUEST['task'];

   $sql = "SELECT instructions FROM retainer WHERE task =:task";
   $sth = $dbh->prepare($sql); 
   $sth->execute(array(':task' => $task));
   $result = $sth->fetchAll();
   // print_r($result);
   echo nl2br($result[0]['instructions']);

   
}

?>
