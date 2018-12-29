<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap 101 Template</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>

    <?php
		require_once "function.php";
		$arrQuestion = createQuestion();
		$xhtml = '';
		if(!empty($arrQuestion)){
			$i = 1;
			foreach($arrQuestion as $key => $value){
				$optionA = showAnswer($key, 'option-0', $value['option-0']);
				$optionB = showAnswer($key, 'option-1', $value['option-1']);
				$optionC = showAnswer($key, 'option-2', $value['option-2']);
				$optionD = showAnswer($key, 'option-3', $value['option-3']);
				$xhtml .= '<div class="form-group">
							<p>'.$i++.'. '.$value['question'].'</p>
							<div class="row">
								<div class="col-md-6">
									'.$optionA.$optionB.'
								</div>
								<div class="col-md-6">
									'.$optionC.$optionD.'
								</div>
							</div>
						</div>';
			}
		}

		echo phpinfo();
    ?>
	<!-- <div class="container list-quiz">
		<h1 class="page-header">Trắc nghiệm trực tuyến</h1>
		<form action="#" method="post" name="test-form" id="test-form" >
			<?= $xhtml ?>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Hoàn thành</button>
			</div>
			
		</form>
		
	</div> -->

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>