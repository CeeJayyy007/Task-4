<?php
  // Start the session
  session_start();

  // Define variables and initialize with empty values
  $fName = $lName = $title = $credit = $email = $password = $confirm = $new_password = $password_1 = $confirm_1 = $courses = $course = $id = $userid = "";

  $error = array('fName' => '', 'lName' => '', 'email' => '', 'password' => '', 'confirm' => '', 'new_password' => '', 'course' => '', 'credit' => '', 'userid' => '', 'edit' => '');

  $comment = array('message' => '');



// connect to database
$db = mysqli_connect('localhost', 'root', '', 'task4');

//register user
if (isset($_POST['submit'])) {

if (empty($_POST['fName'])){

  $error['fName'] = 'Enter your first name';

  }else {

  $fName = mysqli_real_escape_string($db, $_POST['fName']);
}

if (empty($_POST['lName'])){

  $error['lName'] = 'Enter your last name';

  }else {

  $lName = mysqli_real_escape_string($db, $_POST['lName']);
}

if (empty($_POST['email'])){

    $error['email'] = 'Enter your email address';

    }else {

    $user_check_query = "SELECT * FROM users";

    $result = mysqli_query($db, $user_check_query);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($users as $user){

    if ($user['email'] === $_POST['email']) {

    // $id = $user['id'];

    $error['email'] = 'Email already in use';

    }else{

    $email = mysqli_real_escape_string($db, $_POST['email']);

      }

    }

  }

if (empty($_POST['password'])){

    $error['password'] = 'Enter your password';

    }else {

    $password = mysqli_real_escape_string($db, $_POST['password']);
}

if ((!empty($password)) && (empty($_POST['confirm']))){

    $error['confirm'] = 'Confirm your password';

    }else {

    $confirm = mysqli_real_escape_string($db, $_POST['confirm']);

    if ($confirm !== $password) {

    $error['confirm'] = 'The two passwords do not match';

    }

    }

  if (array_filter($error)){
    // $password_1 = md5($password);
    // $confirm_1 = md5($confirm);
    }else {

    $query = "INSERT INTO users (first_name, last_name, email, password, confirm_password)

    VALUES('$fName', '$lName', '$email', '$password', '$confirm')";

    mysqli_query($db, $query);

    $id = $db->insert_id;

    $_SESSION['username'] = $fName;

    $_SESSION['email'] = $email;

    $_SESSION['id'] = $id;

    $_SESSION['success'] = "You are now registered!";

    header('Location: welcome.php');

  }

}



// login
if (isset($_POST['login'])){

  $email = mysqli_real_escape_string($db, $_POST['email']);

  $password = mysqli_real_escape_string($db, $_POST['password']);

  $user_check_query = "SELECT * FROM users";

  $result = mysqli_query($db, $user_check_query);

  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

  foreach($users as $user){

  $data_email = $user['email'];

  $data_password = $user['password'];

  if (empty($email)){

  $error['email'] = 'Enter a registered email';

  }elseif ($email !== $data_email ){

  $error['email'] = 'Invalid username or password';

  }elseif (($email == $data_email ) && ($password !== $data_password )){

  $error['email'] = 'Valid email but wrong password';

  // $error['password'] = 'Wrong password entered';

  }elseif (($email == $data_email ) && ($password == $data_password )){

  $_SESSION['id'] = $user['id'];

  $_SESSION['username'] = $user['first_name'];

  $_SESSION['email'] = $email;

  $_SESSION['success'] = "You are now logged in!";

  header('Location: welcome.php');

  }else{

  $error['email'] = 'Oops! something went wrong';

  }

  }

}



// reset
if (isset($_POST['reset'])){

  $email = $_SESSION['email'];

  $password = mysqli_real_escape_string($db, $_POST['password']);

  $new_password = mysqli_real_escape_string($db, $_POST['new_password']);

  $confirm = mysqli_real_escape_string($db, $_POST['confirm']);

  $user_check_query = "SELECT * FROM users WHERE email = '$email'";

  $result = mysqli_query($db, $user_check_query);

  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);


  if (($email === $users['0']['email']) & ($password !== $users['0']['password'])) {

    $error['password'] = 'Incorrect password entered';

  }

  if (empty($new_password) && (empty($confirm))){

  $error['new_password'] = 'Enter a new password';

  }

  if (empty($confirm) && (!empty($new_password))){

  $error['confirm'] = 'Enter verification password';

  }

  if (empty($new_password)){

  $error['confirm'] = 'Enter a new password first';

  }

  if (($new_password !== $confirm) && (!empty($confirm))){

  $error['confirm'] = 'New password and verification password do not match';

  }

  if (($new_password == $confirm) && (!empty($new_password))) {

    if (($email === $users['0']['email']) & ($password === $users['0']['password'])) {

  $sql = "UPDATE users SET password = $new_password, confirm_password = $confirm WHERE email = '$email'";

  if ($db->query($sql) === TRUE) {

    $_SESSION['success'] = "Password reset successful!";

    header('Location: welcome.php');

    } else {

    echo $error['confirm'] = "Error updating record: " . $db->error;

  }

  }

  }

}



//register courses
if (isset($_SESSION['username'])) {

  $id = $_SESSION['id'];

	$sql = "SELECT * FROM courses WHERE userid = '$id'";

	// get the result set (set of rows)
	$result = mysqli_query($db, $sql);

	// fetch the resulting rows as an array
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

  }

  if (isset($_POST['course_reg'])) {

  if (empty($_POST['course'])){

      $error['course'] = 'Enter your course';

    }elseif (array_filter($users)){


      foreach($users as $user){

      if ($user['course'] === $_POST['course']) {

      $error['course'] = 'Course already registered';

      }else{

        $course = mysqli_real_escape_string($db, $_POST['course']);

      }

      }

    }else{
      $course = mysqli_real_escape_string($db, $_POST['course']);

    }

    if (empty($_POST['credit'])){

      $error['credit'] = 'Enter course credit unit';

    }else {

      $credit = mysqli_real_escape_string($db, $_POST['credit']);

    }

    if (array_filter($error)){

    }else {

      $query = "INSERT INTO courses (course, credit, userid)

      VALUES('$course', '$credit', '$id')";

      mysqli_query($db, $query);

      $comment['message'] = "Course registered successfully! (Kindly refresh the page to view update)";

      $_SESSION['success'] = "";

    }

  }


// edit courses
// check GET request id param
	if(isset($_GET['id'])){

		// escape sql chars
		$id = $_GET['id'];

		// make sql
		$sql = "SELECT * FROM courses WHERE id = $id";

		// get the query result
		$result = mysqli_query($db, $sql);

		// fetch result in array format
		$user = mysqli_fetch_assoc($result);


    $userid = $_SESSION['id'];

    $sqli = "SELECT course, credit FROM courses WHERE userid = '$userid'";

    $edit_course = $db->query($sqli);

    // mysqli_free_result($result);

    // mysqli_close($conn);

  }

  if (isset($_POST['edit-course'])){

    $id = $_GET['id'];

    $course = mysqli_real_escape_string($db, $_POST['course']);

    if (empty($course)){

    $error['course'] = 'Enter course title to edit';

    }

    if ($edit_course->num_rows > 0) {
      // output data of each row
      while($row = $edit_course->fetch_assoc()) {

        if ($row['course'] === ($course)) {

          $error['course'] = 'Course already registered';

        }

      }

    }

    if (array_filter($error)) {

    }else{

    $sqli = "UPDATE courses SET course = '$course' WHERE id = '$id'";

    if ($db->query($sqli) === TRUE) {

    $comment['message'] = "Course title edited successfully! (Kindly refresh page to view update)";

    $_SESSION['success'] = "";
    }

  }

  }

  if (isset($_POST['edit-credit'])){

    $id = $_GET['id'];

    $credit = mysqli_real_escape_string($db, $_POST['credit']);

    if (empty($credit)){

    $error['course'] = 'Enter credit unit to edit';

    }


    if (array_filter($error)) {

    }else{

    $sqli = "UPDATE courses SET credit = '$credit' WHERE id = '$id'";

    if ($db->query($sqli) === TRUE) {

    $comment['message'] = "Credit unit edited successfully! (Kindly refresh page to view update)";

    $_SESSION['success'] = "";
    }

  }

  }



// delete courses
if (isset($_POST['delete'])) {

  $id_to_delete = mysqli_real_escape_string($db, $_POST['id_to_delete']);

  $sql = "DELETE FROM courses WHERE id = $id_to_delete";

  if(mysqli_query($db, $sql)){

  header('Location: welcome.php');

  $_SESSION['success'] = "Course deleted!";

  } {

    echo 'query error: ' . mysqli_error($db);

  }
  }


  // log out
  if (isset($_POST['logout'])){

    session_destroy();

    unset($_SESSION['username']);

    unset($_SESSION['success']);

    header('Location: index.php');

  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zuri Task 4</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
</html>
