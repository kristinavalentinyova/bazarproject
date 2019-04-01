<div class="row">
  <div class="col-md-3">
        <a href="#" class="btn btn-primary btn-lg disabled" tabindex="-1" role="button" aria-disabled="true">+nový inzerát</a>
        </div> 
         <div class="col-md-6">
            <button type="button" class="btn btn-light"><a class="nav-link active" href="../index.php?link=home.php">Home</a></button>
            <button type="button" class="btn btn-light"><a class="nav-link active" href="../index.php?link=kontakt.php">Kontakt</a></button>
            <button type="button" class="btn btn-light"><a class="nav-link" href="#">O nás</a></button>
            </div>
        <div class="col-md-3">
          <form action="index.php" method="get">
			  <div class="form-row">
				  <div class="col-md-8">
                  <input type="hidden" name="link" value="oblecenieaobuv.php">
					<input type="text" class="form-control" name="hladaj" placeholder="hľadaný text">
				  </div>
                    <div class="col-md-4">
					<button type="submit" class="btn btn-primary">Odoslať</button>
				  </div>
			  </div>
			
          </div>
          </div>


<?php
	// Set session variables
	$_SESSION["datumDnes"] = date("l, d.m.Y");

	$conn->query("SET CHARACTER SET utf8");
	//alebo v xampp/mysql/bin/my.ini   doplnit:
	//[mysqld]
	//character-set-server=utf8
	//collation-server=utf8_slovak_ci

	if($_GET["hladaj"]) $sql = "SELECT * FROM oblecenieaobuv WHERE Popis LIKE '%".$_GET["hladaj"]."%'";	//ak obsahuje h�adan� re�azec
	else $sql = "SELECT * FROM oblecenieaobuv";
	$result = $conn->query($sql);
?>
    <div class="row">
	<?php 
      while($row = $result->fetch_assoc())
		{ 
		 
	?>
        <div class="card mb-3" style="max-width: 540px;" style="max-heiht: 150px">
           <div class="row no-gutters">
            <div class="col-md-4">
            <img src="images/<?php echo $row["ObrazokOaO"]; ?>" class="card-img" alt="...">
            </div>
           <div class="col-md-8">
          <div class="card-body">
          <h5 class="card-title"><?php echo $row["Popis"]; ?></a></h5>
          <p class="card-text"><?php echo $row["Cena"]; ?></p>
          <p class="card-text"><?php echo $row["Lokalita"]; ?></p>
          </div>
         </div>
         </div>
        </div>
        

    <?php } ?>



      </div>

