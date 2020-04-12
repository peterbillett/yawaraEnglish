<a class="navbar-brand" href="/">Yawara JHS English</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    
    <?php 
      $grades = array(1,2,3);
      foreach ($grades as $value){ 
        echo "<li class=\"nav-item dropdown\">
          <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
            $value 年生
          </a>
          <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
            <a class=\"dropdown-item\" href=\"?category=grade&grade=$value\">All</a>
            <div class=\"dropdown-divider\"></div>
            <a class=\"dropdown-item\" href=\"?category=units&grade=$value\">Units</a>
            <a class=\"dropdown-item\" href=\"?category=tests&grade=$value\">Quizes</a>
            <a class=\"dropdown-item\" href=\"?category=worksheets&grade=$value\">Worksheets</a>
            <a class=\"dropdown-item\" href=\"?category=videos&grade=$value\">Videos</a>
          </div>
        </li>";
        }
      ?>
    
  </ul>
      <a class="btn btn-outline-success my-2 my-sm-0" href="/?category=senseilogin">Teachers</a>
</div>
