<?php


if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_user = array(
            "firstname" => $_POST['firstname'],
            "lastname"  => $_POST['lastname'],
            "userID"  => $_POST['userID'],
            "age"       => $_POST['age'],
            "password"  => $_POST['password']
            
        );

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "users",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Dinotrove</title>

    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>

  <?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['firstname']; ?> successfully added.</blockquote>
<?php } ?>  
  
<form method="post">
	<label for="firstname">First Name</label>
	<input type="text" name="firstname" id="firstname">
	<label for="lastname">Last Name</label>
	<input type="text" name="lastname" id="lastname">
	<label for="userID">User ID</label>
	<input type="text" name="userID" id="userID">
  <label for="password">Password</label>
	<input type="text" name="password" id="password">
	<label for="age">Age</label>
	<input type="text" name="age" id="age">
	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>


  </body>
</html>