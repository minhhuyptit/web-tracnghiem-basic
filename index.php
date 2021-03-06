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
			foreach($arrQuestion as $value){
				$optionA = showAnswer($value['id'], 'option-0', $value['option-0']);
				$optionB = showAnswer($value['id'], 'option-1', $value['option-1']);
				$optionC = showAnswer($value['id'], 'option-2', $value['option-2']);
				$optionD = showAnswer($value['id'], 'option-3', $value['option-3']);
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
		<h1 class="page-header">Trắc nghiệm trực tuyến</h1>
		<form action="result.php" method="post" name="test-form" id="test-form" >
			<?= $xhtml ?>
			<div class="form-group">
				<input type="hidden" name="array-data" value="<?= htmlentities(serialize($arrQuestion)) ?>">
				<button type="submit" class="btn btn-primary" disabled="disabled" >Hoàn thành</button>
			</div>
			
		</form>
		
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('input[type=radio]').change(function(){
				if($('input[type=radio]:checked').length == 5){
					$('button[type=submit]').removeAttr('disabled');
				}
			});
		});
	</script>

</body>
</html>