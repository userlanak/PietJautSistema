<!DOCTYPE html>
<html>
<body>

<!-------------------------------------------------------------------------------------------------------------------------------------------------->

<?php
if (isset($_POST['submit'])){

// Informācija
$servername = "localhost:3308";
$user = "root";
$password = "";
$dbname = "pjs_db";

$kludas = 0;

// Savienojums
$conn = new mysqli($servername, $user, $password, $dbname);

if ($conn->connect_error)
{
    die("Pieslēgums neizdevās: " . $conn->connect_error);
}
else
{
    echo "Pieslēgums veiksmīgs!" . "<br> <br>";
}

error_reporting (E_ALL ^ E_NOTICE);

// Lietotājvārda lauks
$autovards = "Nereģistrēts lietotājs";


// Jautājuma lauks
$jaut = $_POST['jautajums'];
if (strlen($jaut) < 10) {
	$kludas = 1;
    echo "Lūdzu, precizējiet jautājumu!" . "<br> <br>";;
}

// Faila lauks /////////////////////////////////////////////////////

// Vairāku failu augšupielāde

//$id = intval($_GET['id']); 
//$id = mysqli_insert_id($conn);

// Ja faili ir
if (is_countable ($_FILES['fails']['name'])) {
    $count = count($_FILES['fails']['name']);
	
	if ($count > 0) {
    
    foreach ($_FILES["fails"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $file_name = $_FILES['fails']['name'][$key];
            $file_tmp = $_FILES['fails']['tmp_name'][$key];
            $file_size = $_FILES['fails']['size'][$key];
            $file_error = $_FILES['fails']['error'][$key];
            $file_type = $_FILES['fails']['type'][$key];
            $file_ext = explode('.', $file_name);
            $file_act_ext = strtolower(end($file_ext));
            $allowed = array("jpg", "png", "doc", "pdf", "docx");
            $path = 'C:\wamp64\www\Test\UploadTest';
        
            if( !in_array($file_act_ext, $allowed) ){
                echo "Neatļauti failu tipi: " . $file_name;
                $kludas = 1;
                return 'Neatļauts faila tips!';
            } 
            
            if( $file_error != 0 ){
                echo "Kļūda augšupielādējot failu/-us: " . $file_name;
                $kludas = 1;
                return 'Kļūda augšupielādējot failu/-us.';
            }
            
            if( $file_size > 5000000 ){
                echo " Pārsniegts maksimālais pieļaujamais failu izmērs 5 MB: " . $file_name;
                $kludas = 1;
                return 'Maksimālais pieļaujamais failu izmērs 5 MB.';
            }
            
			
			} // if ($error == UPLOAD_ERR_OK)
        
    } // foreach
	
	// Ja ar visiem failiem viss ir kārtībā
	if ($kludas == 0) {
            // Ieraksta izveide
			$sql = "SELECT * FROM jautajumutb";
			$result = $conn->query($sql);

			$vards = mysqli_real_escape_string($conn, $_REQUEST['vards']);
			$epasts = mysqli_real_escape_string($conn, $_REQUEST['epasts']);
			$jautajums = mysqli_real_escape_string($conn, $_REQUEST['jautajums']);
			$statuss = "Neapstrādāts";
		   
			$sql = "INSERT INTO jautajumutb (vards, pasts, jaut, laiks, statuss) VALUES ('$vards', '$epasts', '$jautajums', NOW(), '$statuss')";
			
			$id = mysqli_insert_id($conn);

			if (mysqli_query($conn, $sql))
			{
				$kludas = 0;
				//echo "YAY!" . "<br> <br>";;
			}
			else
			{
				echo "Kļūda: " . mysqli_error($conn);
				$kludas = 1;
			}
				
			$id = mysqli_insert_id($conn);
			/////////////////////////////////////////////////////////////////////////
			foreach ($_FILES["fails"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
            $file_name = $_FILES['fails']['name'][$key];
            $file_tmp = $_FILES['fails']['tmp_name'][$key];
            $file_size = $_FILES['fails']['size'][$key];
            $file_error = $_FILES['fails']['error'][$key];
            $file_type = $_FILES['fails']['type'][$key];
            $file_ext = explode('.', $file_name);
            $file_act_ext = strtolower(end($file_ext));
            $allowed = array("jpg", "png", "doc", "pdf", "docx");
            $path = 'C:\wamp64\www\Test\UploadTest';
			
			$new_file_name = $file_name;
            $file_des = $path .'/'. $new_file_name;
        
            $move = move_uploaded_file($file_tmp, $file_des);
			
			if(!$move){
                echo "Kļūda augšupielādējot failu1/-us.";
                $kludas = 1;
                return "Failu augšupielādēt neizdevās." ; 
            }
        
            if ($key == 0) $sql = "UPDATE jautajumutb SET fails1 = '$file_des' WHERE id = '$id'";
            if ($key == 1) $sql = "UPDATE jautajumutb SET fails2 = '$file_des' WHERE id = '$id'";
            if ($key == 2) $sql = "UPDATE jautajumutb SET fails3 = '$file_des' WHERE id = '$id'";
            if ($key == 3) $sql = "UPDATE jautajumutb SET fails4 = '$file_des' WHERE id = '$id'";
            if ($key == 4) $sql = "UPDATE jautajumutb SET fails5 = '$file_des' WHERE id = '$id'";
            mysqli_query($conn, $sql);
			} //(if ($error == UPLOAD_ERR_OK)) Ja ar failiem viss kārtībā
			} // foreach, ja ar failiem viss kārtībā
            
	} // if ($kludas == 0)
	
} // if ($count > 0)
	

// Ja failu nav
} else { // if (is_countable)
	$sql = "SELECT * FROM jautajumutb";
	$result = $conn->query($sql);

    $vards = mysqli_real_escape_string($conn, $_REQUEST['vards']);
    $epasts = mysqli_real_escape_string($conn, $_REQUEST['epasts']);
    $jautajums = mysqli_real_escape_string($conn, $_REQUEST['jautajums']);
	$statuss = "Neapstrādāts";
   
	$sql = "INSERT INTO jautajumutb (vards, pasts, jaut, laiks, statuss) VALUES ('$vards', '$epasts', '$jautajums', NOW(), '$statuss')";
	
	$id = mysqli_insert_id($conn);

    if (mysqli_query($conn, $sql))
    {
        //header('Location: success.html');
		$kludas = 0;
		//echo "YAY!" . "<br> <br>";;
    }
    else
    {
        echo "Kļūda: " . mysqli_error($conn);
		$kludas = 1;
    }
}

if ($kludas == 0) {
	//header('Location: success.html');
	echo "Jautājums veiksmīgi nosūtīts!";
}
else {
	echo "Notikusi kļūda!";
}

$conn->close();

} //(isset($_POST['submit']))  

else { ?>
	
	<form id="jautf" action="" method="post" enctype="multipart/form-data">

		<!-- Lietotājvārds -->
		  <label for="vards">Vārds:</label><br>
		  <input type="text" id="vards" name="vards" 
		  value="<?php echo $autovards="Nereģistrēts lietotājs"; ?>"
		  required readonly>
		  <br><br>
		  
		<!-- E-pasts -->
		  <label for="epasts">E-pasts:</label><br>
		  <input type="email" id="epasts" name="epasts" value="<?php echo isset($_POST["epasts"]) ? $_POST["epasts"] : ''; ?>" required>
		  <br><br>
		  
		<!-- Jautājums -->
		  <label for="jautajums">Jautājums:</label><br>
		  <textarea class="textarea" name="jautajums" id="jautajums" rows="10" cols="30" minlength="10"
		  placeholder="Brīvā formā uzrakstiet savu jautājumu!" required>
		  <?php if(isset($_POST['jautajums'])) {echo htmlentities ($_POST['jautajums']); }?>
		  </textarea>
		  <br><br>
		  
		<!-- Fails -->
		  <label for="fails">Augšupielādēt failu (Max. 5 MB):</label><br>
		  <label for="fails">Atļautie failu tipi: .jpg; .png; .doc; .pdf</label><br>
		  <input type="file" id="fails" name="fails[]" multiple>
		  <!-- <input type="submit" value="Augšupielādēt" name="submit"> -->
		  <br><br>
		  
		<!-- Poga -->
		  <input type="submit" value="Nosūtīt" name="submit">
		  <br><br>
	 
	</form>
	
<?php } //"else" for "(isset($_POST['submit']))" ?>


<!-------------------------------------------------------------------------------------------------------------------------------------------------->

<form id="jautf" action="" method="post" enctype="multipart/form-data">

<!-- Lietotājvārds -->
  <label for="vards">Vārds:</label><br>
  <input type="text" id="vards" name="vards" 
  value="<?php echo $autovards="Nereģistrēts lietotājs"; ?>"
  required readonly>
  <br><br>
  
<!-- E-pasts -->
  <label for="epasts">E-pasts:</label><br>
  <input type="email" id="epasts" name="epasts" value="<?php echo isset($_POST["epasts"]) ? $_POST["epasts"] : ''; ?>" required>
  <br><br>
  
<!-- Jautājums -->
  <label for="jautajums">Jautājums:</label><br>
  <textarea class="textarea" name="jautajums" id="jautajums" rows="10" cols="30" minlength="10"
  placeholder="Brīvā formā uzrakstiet savu jautājumu!" required>
  <?php if(isset($_POST['jautajums'])) {echo htmlentities ($_POST['jautajums']); }?>
  </textarea>
  <br><br>
  
<!-- Fails -->
  <label for="fails">Augšupielādēt failu (Max. 5 MB):</label><br>
  <label for="fails">Atļautie failu tipi: .jpg; .png; .doc; .pdf</label><br>
  <input type="file" id="fails" name="fails[]" multiple>
  <!-- <input type="submit" value="Augšupielādēt" name="submit"> -->
  <br><br>
  
<!-- Poga -->
  <input type="submit" value="Nosūtīt" name="submit">
  <br><br>
 
</form>

<!-------------------------------------------------------------------------------------------------------------------------------------------------->

</body>
</html>