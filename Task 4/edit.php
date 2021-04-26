<?php include 'header.php';

?>

<body style = "display: block; margin-top: 100px;">




<?php

if (isset($_SESSION['username'])) : ?>

<nav class="navbar navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="images/jay.png" height="50px"/><strong> Edit course details</strong>
    </a>

    <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div class="d-flex">

      <h6 class="my-auto"> Hello, <strong><?php echo $_SESSION['username'] . "   [user id =  " . $_SESSION['id'] . "]"; ?></strong></h6>

      <a href="reset.php" class="mx-4 my-auto">Reset Password!</a>

      <button class="btn btn-sm btn-primary  btn-lg ml-2" name="logout" type="submit">Log out</button>

    </form>
  </div>
  </div>
</nav>

<div class="text-center container">

<h1><strong>EDIT COURSE DETAILS</strong></h1>
<hr>
<h4>Enter required details and edit</h4>

<form class="" action="edit.php?id=<?php echo $user['id'] ?>" method="post">

<div class="d-flex justify-content-center">

<input type="text" class="col-6 mx-2 my-4" name="course" placeholder="Enter course title" value="">

<button class="btn btn-sm btn-primary btn-lg my-auto ml-2 px-4" name="edit-course" type="submit">Edit course title</button>

</div>

<div class="">

<input type="number" class="col-6 mx-2 my-4" name="credit" placeholder="Enter credit unit (numbers only)" value="">

<button class="btn btn-sm btn-primary btn-lg my-auto ml-2 px-4" name="edit-credit" type="submit">Edit credit unit</button>

</div>

</form>


<div class="text-danger my-2">
  <?php echo $error['course'] . "<br>";?>
</div>

<div class="text-primary my-3 pb-3 h5">

    <?php echo $comment['message'] . "<br>";?>

</div>

<?php endif ?>

<?php

?>
 <div class="container">
 		<div class="row">

 				<div class="col-sm-10 mb-5 course-card mx-auto">
 					<div class="card shadow pt-4">
 						<div class="card-content center my-3 px-2">
 							<h3><strong>Course title: </strong><?php echo htmlspecialchars($user['course']); ?></h3>
 						</div>
            <div class="mb-2"><h3><strong>Credit unit: </strong><?php echo htmlspecialchars($user['credit']); ?></h3>
            </div>
            <hr>
 						<div class="card-action mb-4">
              <form class="" action="edit.php" method="post">

                <input type="hidden" name="id_to_delete" value="<?php echo $user['id'] ?>">

                <input type="submit" name="delete" class="btn btn-sm btn-danger btn-lg" value="Delete course">

              </form>
            </div>
 					</div>
 				</div>

<?php ?>
<div class="offset-sm-1">

  <a href="welcome.php" class="text-danger mx-4 my-auto">< Back to Dashboard</a>

</div>

 		</div>
 	</div>

<?php include 'footer.php'; ?>
</div>
  </body>
</html>
