<?php
include ('db.php');
  $query  = "SELECT * FROM chat order by 'date' DESC";
  $run = $link->query($query);

  while($row = $run->fetch_array()) :

 ?>
<div id = "chatData">
  <span style="color:red;"><?php echo $row['name']; ?></span>
  <span style="color:green;"><?php echo $row['msg']; ?></span>
  <span style="float: right;"><?php echo formatDate($row['date']); ?></span>

</div>
<?php endwhile; ?>
