<?
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydb";


// Define POST case
switch (true) {
  case isset($_POST['add_user']:
  AddUser();
    break;
  case isset($_POST['del_user']:
  DeleteUser();
    break;
  case isset($_POST['get_all_users']:
  GetAllUsers();
    break;
  default:
    echo "Unknown request"
    break;
}


// Creating new connection to database
$connection = new mysqli($servername, $username, $password);

// Сheck if connection was established
if ($connection->connect_error) {
    die("Failed to connect to database: " . $connection->connect_error);
}

//FUnction for adding new user to database
public function AddUser() {
  if ($_POST["name"] && $_POST["lastname"] && $_POST["age"]) {
    $SQL = "INSERT INTO users (firstname, lastname, age, ) VALUES (htmlspecialchars($_POST["name"]),
                                                                  htmlspecialchars($_POST["lastname"]),
                                                                  htmlspecialchars($_POST["age"]))";

    if ($connection->query($SQL) === TRUE) {
      echo "User added succesfully.";
    } else {
      echo "Error adding user: " . $connnnection->error;
    }

  } else {
    echo "Not all required filled are filled or fit for usage";
  }
}

//Function for deleting specific user from database
public function DeleteUser() {
  $SQL = "DELETE FROM users WHERE id=".$_POST["id"];

  if ($connection->query($SQL) === TRUE) {
    echo "User deleted succesfully.";
  } else {
      echo "Error deleting user: " . $connnnection->error;
  }
}

//Get list of users from the base
public function GetAllUsers() {
  $SQL = "SELECT firstname, lastname, age FROM users";
  $result = $connection->query($SQL);

  $rows = array();

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $rows[] = $row;
      }
      return json_encode($rows);
  } else {
      echo "0 results";
  }
}

$connection->close();
?>
