<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID required.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../connection.php");//Contains function that connects to the database
	// escaping, additionally removing everything that could be (html/javascript-) code
    $prod_code = mysqli_real_escape_string($con,(strip_tags($_POST["edit_code"],ENT_QUOTES)));
	$prod_name = mysqli_real_escape_string($con,(strip_tags($_POST["edit_name"],ENT_QUOTES)));
	$prod_ctry = mysqli_real_escape_string($con,(strip_tags($_POST["edit_category"],ENT_QUOTES)));
	$stock = intval($_POST["edit_stock"]);
	$price = floatval($_POST["edit_price"]);
	
	$id=intval($_POST['edit_id']);
	// UPDATE data into database
    $sql = "UPDATE tblproduct SET prod_code='".$prod_code."', prod_name='".$prod_name."', prod_ctry='".$prod_ctry."', price='".$price."',  prod_qty='".$stock."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "The product has been updated successfully.";
    } else {
        $errors[] = "Sorry, the update failed. Please, come back and try again.";
    }
		
	} else 
	{
		$errors[] = "Unknown.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Well done!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>