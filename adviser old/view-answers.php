<?php

include './auth.php';
include '../includes/db_connection.php';
$user_id = $_GET['id'];

$sql = "select * FROM user_details JOIN application ON user_details.user_id = application.user_id JOIN answers ON application.user_id = answers.user_id where application.user_id = $user_id; ";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result)) {

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?php echo $row['first_name'] . ' ' . $row['last_name'] ; ?></title>

    <?php include '../includes/links.php'; ?>

    <link rel="stylesheet" href="../css/all-styles.css" />
    <link rel="stylesheet" href="../css/dashboard.css" />
    <link rel="stylesheet" href="../css/navbar.css" />

    <script src="../tailwind/tailwind-cdn.js"></script>

    
  </head>
  <body>
    <div class="container mx-auto my-16">
      <div class="pb-16">
        <div class="float-left">
          <a
            class="text-lg text-gray-700 hover:bg-gray-200 hover:px-5 hover:rounded hover:p-2 hover:no-underline hover:text-black hover:decoration-none"
            href="./applicants.php"
          >
            <i class="fa fa-chevron-left"></i> &nbsp; Back to Application
          </a>
        </div>

        <div class="float-right">
          <div class="text-lg uppercase">Application review</div>
        </div>
      </div>

      <div class="bg-gray-100 p-7 rounded pb-9">
        <div class="float-left mr-16 pr-16">
          <small>Student:</small>
          <p
            class="text-2xl text-gray-700 font-semibold uppercase tracking-wide"
          >
          <?php echo $row['first_name'] . ' ' . $row['last_name'] ; ?>
          </p>
        </div>

        <div class="ml-16">
          <div class="float-left mr-16 pr-16">
            <small class="">Program: </small>
            <p class="text-xl text-gray-600 font-medium">
              Masters in   <?php echo $row['program'];; ?>
            </p>
          </div>

          <div class="ml-16">
            <small class=""> Application status: <br /> </small>
            <span
              class="<?php if($row['status'] == "approved") {echo "bg-green-500"; } else if($row['status'] == "pending") {echo "bg-gray-500"; }?> text-white text-xs font-bold mr-2 px-2.5 py-0.5 rounded"
              >  <?php echo $row['status']; ?></span
            >
          </div>
        </div>
      </div>

      <div class="mt-16">
        <?php include './components/answers.php'; ?>
      </div>
    </div>
  </body>
</html>

<?php
}
?>