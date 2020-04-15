<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}

	if(isset($_GET['grade']) == false){
		echo '<script type="text/JavaScript">window.location.href = "/?category=sensei";</script>';
		exit();
	}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  	<?php
	    echo '<li class="breadcrumb-item"><a href="?category=sensei">Main page</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=senseigrades&grade='.$_GET["grade"].'">'.$_GET["grade"].'年生</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=senseiunits&grade='.$_GET["grade"].'">Units</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=senseiunit&grade='.$_GET["grade"].'&id='.$_GET["id"].'">Unit</a></li>';
	    echo '<li class="breadcrumb-item active" aria-current="page">New quiz</li>';
    ?>
  </ol>
</nav>

<div class="container">
	<h1>NEW QUIZ</h1>
	<form method="post" action="/modules/postnewquiz.php">
		<div class="row justify-content-center">
			<div class="form-group col-12 col-md-6">
				<label for="title">Quiz title:</label>
			    <input type="text" class="form-control" name="title" id="title" placeholder="" required>
			</div>
			<div class="form-group col-12 col-md-6">
				<label for="pageinfo">Sub title:</label>
			    <input type="text" class="form-control" name="pageinfo" id="pageinfo" placeholder="">
			</div>
		</div>
		<div class="row justify-content-center" id="questionsmulti">
			<button type="button" class="btn btn-success col-12 addQuestion" id="addMoremulti" title="Add another question">
				<span class="glyphicon glyphicon-plus">Add multiple choice question</span>
			</button>
			<div class="col-12 form-inline">
				<input id="QuestionMContent" type="text" class="form-control col-10 col-md-11" placeholder="Question" value=" " style="display: none;" required/>
				<input type="button" class="btn btn-danger col-2 col-md-1 remove" value="X" style="display: none;"/>
				<input id="QuestionOption1" type="text" class="form-control col-12 col-md-6" placeholder="Option 1" value=" " style="display: none;" required/>
				<input id="QuestionOption2" type="text" class="form-control col-12 col-md-6" placeholder="Option 2" value=" " style="display: none;" required/>
				<input id="QuestionOption3" type="text" class="form-control col-12 col-md-6" placeholder="Option 3" value=" " style="display: none;" required/>
				<input id="QuestionOption4" type="text" class="form-control col-12 col-md-6" placeholder="Option 4" value=" " style="display: none;" required/>
			</div>
		</div>
		<hr>
		<div class="row justify-content-center" id="questionswritten">
			<button type="button" class="btn btn-success col-12 addQuestion" id="addMoreWritten" title="Add another question">
				<span class="glyphicon glyphicon-plus">Add written question</span>
			</button>
			<div class="col-12 form-inline">
				<input id="QuestionWContent" type="text" class="form-control col-10 col-md-11" placeholder="Question" value=" " style="display: none;" required/>
				<input type="button" class="btn btn-danger col-2 col-md-1 remove" value="X" style="display: none;"/>
			</div>
		</div>
		<hr>
		<?php
			echo '<input type="hidden" name="grade" value="'.$_GET["grade"].'"/>';
			echo '<input type="hidden" name="id" value="'.$_GET["id"].'"/>';
		?>
		<button class="btn btn-primary col-12">SUBMIT</button>
	</form>

	<br>
	<?php include("logoutbar.php")?>
</div>

<script type="text/javascript">
	$(function(){
		var questionCount = 0;

		$('.addQuestion').on('click', function() {
			var data = $(this).parent().children(".form-inline:first").clone(true).appendTo($(this).parent());
			data.find(".form-control").val('');
			$(this).parent().children(".form-inline:first").each(function () {
				$(this).children(".form-control").each(function () {
					console.log($(this));
					data.find("#"+$(this).attr('id')).attr('name', $(this).parent().parent().attr('id')+'['+questionCount+']['+$(this).attr('id')+']');
				});
				
				//data.find("#"+$(this).id()).name($(this).parent().id()+'['+questionCount+']['+$(this).id()+']');
			});
			questionCount++;
			data.find("input").show();
		});

		$(document).on('click', '.remove', function() {
			var trIndex = $(this).closest("div").index();
			if(trIndex>1) {
				$(this).closest("div").fadeOut("normal", function() {
			        $(this).remove();
			    });
			}
		});
	});
</script>