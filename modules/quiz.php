<div class="container">
<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Student name</label>
    <input type="test" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>

  <span>Class</span>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
    <label class="form-check-label" for="inlineRadio1">1</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
    <label class="form-check-label" for="inlineRadio2">2</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
    <label class="form-check-label" for="inlineRadio3">3</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
    <label class="form-check-label" for="inlineRadio4">4</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
    <label class="form-check-label" for="inlineRadio5">5</label>
  </div>

  <div>
    <br><h1>Past participle 過去分詞</h1>
    <h3>(NEW HORIZON 3 ~ page 6-7)</h3>
  </div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Examples</button>

  <br><h3>Questions</h3>
  <hr/>

  <div class="row">
    <div class="form-group col-12 col-md-6">
      <label for="exampleFormControlSelect1">This painting is ________ by many people.</label>
      <select class="form-control" id="exampleFormControlSelect1">
        <?php 
          $options = array("loved", "love", "use", "used");
          shuffle($options);
          foreach ($options as $value) {
            echo "<option>", $value, "</option>";
          }
        ?>
      </select>
    </div>
    
    <div class="form-group col-12 col-md-6">
      <label for="exampleFormControlSelect1">Select the correct past participle form for "teach"</label>
      <select class="form-control" id="exampleFormControlSelect1">
        <?php 
          $options = array("taught", "teach", "teached", "teachhed");
          shuffle($options);
          foreach ($options as $value) {
            echo "<option>", $value, "</option>";
          }
        ?>
      </select>
    </div>
  </div>

  <hr/>

  <div class="row">
    <div class="form-group col-12 col-md-6">
      <label for="exampleFormControlTextarea1">Nara | visit | by many students</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
    </div>

    <div class="form-group col-12 col-md-6">
      <label for="exampleFormControlTextarea1">these books | read | around the world</label>
      <textarea class="form-control" id="exampleFormControlTextarea2" rows="1"></textarea>
    </div>

    <div class="form-group col-12 col-md-6">
      <label for="exampleFormControlTextarea1">A furoshiki is _________ in many ways.</label>
      <textarea class="form-control" id="exampleFormControlTextarea3" rows="1"></textarea>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
<br>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Auxiliary verb + past participle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Example auxiliary verbs: is, isn't, was, wasn't, are, aren't, were, weren't, has, hasn't, had, hadn’t, have, haven’t</p>
        <p>Example past participles: used, studied, closed, opened, cleaned, washed, asked, touched, started, invited, painted</p>

        <p><b>Example sentences:</b>
          <br>I have forgotten my homework!
          <br>Disneyland is loved in Japan.
          <br>Which light is turned off?<br>
        </p>

        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/" allowfullscreen></iframe>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>