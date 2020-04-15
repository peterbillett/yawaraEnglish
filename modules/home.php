<main role="main" class="container">

	    <?php
	    	include('config.php');
			$stmt = $db->prepare("SELECT message.content FROM message WHERE message.id = 1");
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				echo $result["content"];
			} else{
				exit();
			}
	    ?>

</main>
