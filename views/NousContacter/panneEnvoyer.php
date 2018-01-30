<div id="DIYbody">
  <div class="">
    <h1><?php echo $title ?></h1>
  </div>
  <div class="">
    <p>
      <?php
      foreach ($_POST as $value) {
        print_r($value);
        echo "<br />";
      }
     ?>
   </p>
  </div>
</div>
