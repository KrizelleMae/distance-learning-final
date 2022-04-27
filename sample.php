<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Document</title>
   </head>
   <body>
      <form action="./sample.php" method="POST">
         <input
            type="text"
            name="link"
            pattern="^https(:\/\/)drive\.google\.com\/drive\/folders\/([a-zA-z0-9\-_?=]+)"
            title="Enter the valid Google drive link."
            required
         />

         <input type="submit" value="Submit" />
      </form>
   </body>
</html>

<?php
echo $_POST['link']?>
