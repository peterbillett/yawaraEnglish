<div class="container">
  <div class="row">
    <div class="col-12">
      <h2>Quizes</h2>
    </div>

    <?php 
      include('config.php');

      if(isset($_GET['grade'])){
          $stmt = $db->prepare("SELECT quiz.id, quiz.title, quiz.pageInfo FROM quiz JOIN units ON quiz.wwid = units.id WHERE units.grade = ? ORDER BY quiz.id");
          $stmt->execute(array($_GET['grade']));

          if($stmt->rowCount() > 0) {
              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach ($rows as $quiz) {
                echo '<div class="col-12 col-md-4"><div class="card" id="quiz', $quiz["id"], '"><a class="card-body btn btn-primary alert-danger" href="?category=quiz&grade=', $_GET["grade"], '&id=', $quiz["id"], '"><h5 class="card-title">', $quiz["title"], '</h5><p class="card-text">', $quiz["pageInfo"], '</p></a></div></div>';
              }
            }
        }
    ?>

  </div>
</div>