<?php

  class sosialClass
  {
    private static function directoryFilesArray($dir){
      $ds= DIRECTORY_SEPARATOR;  //1
      $storeFolder = 'houseimages';   //2
      $targetPath = dirname( __FILE__ ) . $ds. $storeFolder. $ds . $dir . $ds;  //4
      $dirs = [];
      foreach (new DirectoryIterator($targetPath) as $file) {
        if ($file->isFile()) {
          $dirs[] = $file->getFilename();
        }
      }
      return $dirs;
    }

    public static function setNewHouse( $name,$description,$place,$street,$number,$owner,$renter,$houseFolder,$rented) {
      $db_connection = new mysqli( mysqlServer, mysqlUser, mysqlPass, mysqlDB);
      $db_connection->query( "SET NAMES 'UTF8'" );
      $statement = $db_connection->prepare( "INSERT INTO houses( name,description,place,street,number,owner,renter, house_folder, rented) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $statement->bind_param( 'ssssssssi', $name,$description,$place,$street,$number,$owner,$renter,$houseFolder,$rented);
      $statement->execute();
      $statement->close();
      $db_connection->close();
    }

    public static function getSearchOf($place, $street, $number) {
      $arr = array();
      $jsonData = '{"results":[';
      $db_connection = new mysqli( mysqlServer, mysqlUser, mysqlPass, mysqlDB);
      $db_connection->query( "SET NAMES 'UTF8'" );
      $statement = $db_connection->prepare( "SELECT username, chattext, chattime, color, session FROM messages WHERE chattext LIKE ? AND notification = 0 ORDER BY id DESC");
      $query = '%' . $info . '%';
      $statement->bind_param( 's', $query);
      $statement->execute();
      $statement->bind_result($username, $chattext, $chattime, $color, $session);
      $line = new stdClass;
      while ($statement->fetch()) {
        $line->username = $username;
        $line->chattext = $chattext;
        $line->session = $session;
        $line->color = $color;
        $line->chattime = date('H:i', strtotime($chattime));
        $line->chatdate = date('d M Y', strtotime($chattime));
        $arr[] = json_encode($line);
      }
      $statement->close();
      $db_connection->close();
      $jsonData .= implode(",", $arr);
      $jsonData .= ']}';
      return $jsonData;
    }
    public static function getUserHouses($user) {
      $arr = array();
      $jsonData = '{"results":[';
      $db_connection = new mysqli( mysqlServer, mysqlUser, mysqlPass, mysqlDB);
      $db_connection->query( "SET NAMES 'UTF8'" );
      $statement = $db_connection->prepare( "SELECT id, name, description, place, street, number, owner, renter, house_folder, rented FROM houses WHERE owner = ? OR renter = ?");
      $statement->bind_param( 'ss', $user, $user);
      $statement->execute();
      $statement->bind_result($id, $name, $description, $place, $street, $number,$owner,$renter,$houseFolder,$rented);
      $line = new stdClass;
      while ($statement->fetch()) {
        $line->id = $id;
        $line->name = $name;
        $line->description = $description;
        $line->place = $place;
        $line->street = $street;
        $line->number = $number;
        $line->owner = $owner;
        $line->renter = $renter;
        $line->houseFolder = self::directoryFilesArray($houseFolder);
        $line->rented = $rented;
        $arr[] = json_encode($line);
      }
      $statement->close();
      $db_connection->close();
      $jsonData .= implode(",", $arr);
      $jsonData .= ']}';
      return $jsonData;
    }
    public static function login($email,$pass){
      $db_connection = new mysqli( mysqlServer, mysqlUser, mysqlPass, mysqlDB);
      $db_connection->query( "SET NAMES 'UTF8'" );
      $statement = $db_connection->prepare( "SELECT username FROM users WHERE email = ? AND pass = ? ");
      $statement->bind_param( 'ss', $email,$pass);
      $statement->execute();
      $statement->bind_result($username);
      $line = new stdClass;
      if ($statement->fetch()) {
        $line->username = $username;
      }
      $statement->close();
      $db_connection->close();
      return $line;
    }
    public static function register($email,$nick,$name,$pass,$pass2){
      $db_connection = new mysqli( mysqlServer, mysqlUser, mysqlPass, mysqlDB);
      $db_connection->query( "SET NAMES 'UTF8'" );
      $statement = $db_connection->prepare( "SELECT email FROM users WHERE email = ? ");
      $statement->bind_param( 's', $email);
      $statement->execute();
      $statement->bind_result($mail);
      $line = new stdClass;
      if ($statement->fetch()) {
        $line->ok = 3;
        $statement->close();
        $db_connection->close();
        return $line;
      }
      $statement->close();
      $statement = $db_connection->prepare( "SELECT username FROM users WHERE username = ? ");
      $statement->bind_param( 's', $nick);
      $statement->execute();
      $statement->bind_result($username);
      if ($statement->fetch()) {
        $line->ok = 2;
        $statement->close();
        $db_connection->close();
        return $line;
      }
      $statement->close();
      $statement = $db_connection->prepare( "INSERT INTO users( email, username, name, pass) VALUES(?, ?, ?, ?)");
      $statement->bind_param( 'ssss',$email, $nick, $name, $pass);
      $statement->execute();
      $line->ok = 1;
      $statement->close();
      $db_connection->close();
      return $line;
    }
  }
?>
