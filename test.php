<?php include 'header.php'; ?>

<form class="form-inline">
  <!-- <label class="sr-only" for="inlineFormInput">Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Jane Doe"> -->
  <button type="submit" class="btn btn-primary test2">Submit</button>
  <label class="sr-only" for="inlineFormInputGroup">Username</label>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0 my-test">
    <div class="input-group-addon test">@</div>
    <input type="text" class="form-control test1" id="inlineFormInputGroup" placeholder="Username">
  </div>

  <div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>

  <button type="submit" class="btn btn-primary test-btn">Submit</button>
</form>

<?php include 'footer.php'; ?>