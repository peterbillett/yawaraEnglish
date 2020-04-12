<div class="container">
  <form id="quiz" action="">
    <?php
      echo '<input type="hidden" name="Grade" value="'.$_GET["grade"].'"/>';
      echo '<input type="hidden" name="Quiz" value="'.$_GET["id"].'"/>';
    ?>

    <?php
      include('config.php');
      if(isset($_GET['id'])){

        $stmt = $db->prepare("SELECT quiz.title, quiz.pageinfo FROM quiz WHERE quiz.id = ?");
        $stmt->execute(array( $_GET['id']));
        if($stmt->rowCount() > 0) {
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          echo '<br><h1>', $row["title"] , '</h1><h3>', $row["pageinfo"] , '</h3>';

          //CHECK IF THERE ARE ANY EXAMPLES
          $stmt = $db->prepare("SELECT example.title, example.content FROM example WHERE example.qid = ?");
          $stmt->execute(array( $_GET['id']));
          if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Examples</button>';
            echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">', $row["title"] , '</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">', $row["content"] , ' </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>';
          }

          echo '<br><div class="form-group">
            <label for="StudentName">Student name</label>
            <input type="test" class="form-control" name="StudentName" id="StudentName" placeholder="" required>
          </div>
          
          <span>Class</span>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Class" id="classRadio1" value="Class1" checked>
            <label class="form-check-label" for="classRadio1">1</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Class" id="classRadio2" value="Class2">
            <label class="form-check-label" for="classRadio2">2</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Class" id="classRadio3" value="Class3">
            <label class="form-check-label" for="classRadio3">3</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Class" id="classRadio4" value="Class4">
            <label class="form-check-label" for="classRadio4">4</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Class" id="classRadio5" value="Class5">
            <label class="form-check-label" for="classRadio5">5</label>
          </div>
          <h3>Questions</h3>';

          //MULTIPLE CHOICE QUESTIONS
          $stmt = $db->prepare("SELECT question.id, question.content, answer.content AS answercontent FROM question JOIN answer ON question.id = answer.qid WHERE question.qid = ?");
          $stmt->execute(array( $_GET['id']));
          if($stmt->rowCount() > 0) {
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo '<hr/><div class="row">';

            //Join answers to make a subarray
            $arr = array();
            foreach ($rows as $key => $item) {
               $arr[$item['id']][$key] = $item;
            }
            ksort($arr, SORT_NUMERIC);

            //For each question make a select -> loop each answer and make them an option for the select
            foreach ($arr as $question) {
              shuffle($question);
              echo '<div class="form-group col-12 col-md-6"><label for="exampleFormControlSelect', $question[0]["id"], '">', $question[0]["content"], '</label><select class="form-control" name="question', $question[0]["id"], '" id="exampleFormControlSelect', $question[0]["id"], '" required>';
              foreach ($question as $answer) {
                echo "<option>", $answer["answercontent"], "</option>";
              }
              echo '</select></div>';
            }
            echo '</div>';
          }
        }

        //WRITTEN ANSWER QUESTIONS
        $stmt = $db->prepare("SELECT question.id, question.content FROM question WHERE question.written = 1 AND question.qid = ?");
        $stmt->execute(array( $_GET['id']));
        if($stmt->rowCount() > 0) {
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
          shuffle($rows);
          echo '<hr/> <div class="row">';
          foreach ($rows as $question) {
            echo'<div class="form-group col-12 col-md-6"><label for="exampleFormControlTextarea', $question["id"], '">', $question["content"], '</label><textarea class="form-control" name="question', $question["id"], '" id="exampleFormControlTextarea', $question["id"], '" rows="1" required></textarea></div>';
          }
          echo '</div>';
        }
      }
    ?>

    <input id="submitQuiz" class="btn btn-primary" value="Submit" type="submit">
  </form>
</div>
<br>