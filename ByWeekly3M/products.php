<?php
include 'includes/header.php';
	require 'db_con.php';
	?>
	 <body>
	

    
        <h1>Products here</h1>
        <p>These are the products we have</p>
      </div>
    </div>

    <div class="container"></div>
      <!-- Example row of columns -->
      <div class="row"></div>
      
    <?php
	$query = "SELECT * FROM product";
			$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col-lg-4">';
					echo "<img width='50%' src='".$row['image']."'/><br>";
					echo "<a href='product.php?prodid=".$row['id']."'>".$row['name']."</a><br>";
					echo ' </div>';
				}

     ?>
       
    
</body>			
			//iveri.co.za
			//iverilite.co.za
			//NSA bullrun
			<?php
include 'includes/footer.php';
?>
