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
        $arrQuestion = unserialize($_POST['array-data']);
        if(empty($arrQuestion)) redirect('index.php');
		$xhtml = '';
		if(!empty($arrQuestion)){
			$i = 1;
			foreach($arrQuestion as $value){
                $questionID = $_POST['question-'.$value['id']];
				$optionA = showAnswerCheck('option-0', $questionID, $value['answer'], $value['option-0']);
                $optionB = showAnswerCheck('option-1', $questionID, $value['answer'], $value['option-1']);
                $optionC = showAnswerCheck('option-2', $questionID, $value['answer'], $value['option-2']);
                $optionD = showAnswerCheck('option-3', $questionID, $value['answer'], $value['option-3']);

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
    ?>
	<div class="container list-quiz">
		<h1 class="page-header">Kết quả trắc nghiệm trực tuyến</h1>
		<form action="#" method="post" name="test-form" id="test-form" >
			<?= $xhtml ?>
			<div class="form-group">
				<a href="index.php" class="btn btn-primary">Làm lại</a>
			</div>
			
		</form>
		
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>