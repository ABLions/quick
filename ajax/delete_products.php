<?php
	if (empty($_POST['delete_id'])){
		$errors[] = "Id required.";
	} elseif (!empty($_POST['delete_id'])){
	require_once ("../connection.php");//Contains function that connects to the database
	// escaping, additionally removing everything that could be (html/javascript-) code
    $id_producto=intval($_POST['delete_id']);
	

	// DELETE FROM  database
    $sql = "DELETE FROM  tblproduct WHERE id='$id_producto'";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "The product has been removed successfully.";
    } else {
        $errors[] = "Sorry, the removal failed. Please, come back and try again.";
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