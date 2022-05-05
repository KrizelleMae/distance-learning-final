<?php include './components/sidebar.php'; ?>

<div class="main">
  <div class="flex items-center md:mt-2 xl:mt-16 justify-center">
    <div
      class="bg-white text-center shadow shadow-gray-300 md:w-full xl:w-1/2 rounded-lg p-10"
    >
      <img src="../images/declined.png" alt="" class="h-64 mx-auto" />
      <br />
      <div class="text-2xl font-semibold text-gray-800 mb-2">
        Sorry, <?php echo  $_SESSION['first_name'] ?>!
      </div>
      <div class="text-md text-red-600">
        Your application has been <b>declined</b>.<br />
      </div>

      <div class="text-xs mt-9 text-gray-600">
        For more information, visit our
        <a href="http://wmsu-distance-learning.online/index.php" class="text-sky-800 font-bold">page</a>.
      </div>
    </div>
  </div>
</div>
