<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>头像选择</title>
  <link rel="stylesheet" href="css/face.css">
  <script src="js/opener.js"></script>
</head>
<body>
  <div id="face">
    <h3>头像选择</h3>
    <dl>
      <?php
        foreach(range(1, 9) as $num) {
      ?>
      <dd><img src="face/m0<?php echo $num; ?>.gif" alt="头像0<?php echo $num; ?>" onclick="_opener(this.src);"></dd>
      <?php 
        }
      ?>
    </dl>
    <dl>
      <?php
        foreach(range(10, 64) as $num) {
      ?>
      <dd><img src="face/m<?php echo $num; ?>.gif" alt="头像<?php echo $num; ?>" onclick="_opener(this.src);"></dd>
      <?php 
        }
      ?>
    </dl>
  </div>
</body>
</html>