<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <?php
      echo '<li class="breadcrumb-item active" aria-current="page">'.$_GET["grade"].'年生</li>';
    ?>
  </ol>
</nav>

<?php 
  if(isset($_GET['grade'])){
    $grade = $_GET['grade'];
    echo "<div class=\"container\">
    <div class=\"row\">
      <div class=\"col-12 col-md-6\">
        <div class=\"card\">
          <a class=\"card-body btn btn-primary alert-primary\" href=\"?category=units&grade=", $grade, "\">
            <h5 class=\"card-title\">Units</h5>
            <p class=\"card-text\"></p>
          </a>
        </div>
      </div>

      <div class=\"col-12 col-md-6\">
        <div class=\"card\">
          <a class=\"card-body btn btn-primary alert-danger\" href=\"?category=tests&grade=", $grade, "\">
            <h5 class=\"card-title\">Quizes</h5>
            <p class=\"card-text\"></p>
          </a>
        </div>
      </div>

      <div class=\"col-12 col-md-6\">
        <div class=\"card\">
          <a class=\"card-body btn btn-primary alert-success\" href=\"?category=worksheets&grade=", $grade, "\">
            <h5 class=\"card-title\">Worksheets</h5>
            <p class=\"card-text\"></p>
          </a>
        </div>
      </div>

      <div class=\"col-12 col-md-6\">
        <div class=\"card\">
          <a class=\"card-body btn btn-primary alert-warning\" href=\"?category=videos&grade=", $grade, "\">
            <h5 class=\"card-title\">Videos</h5>
            <p class=\"card-text\"></p>
          </a>
        </div>
      </div>
    </div>
  </div>";

  }
?>
