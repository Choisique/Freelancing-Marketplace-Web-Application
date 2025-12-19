<?php
include_once("./includes/header.php");

if(isset($_POST["login"])){
  $form_process_response = process_login_form();
  write_debug_html($form_process_response, "Form Process Response");
}
?>
  <main>
    <h2 class="display-6 text-center mb-4">Sign In</h2>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <p class="fs-5 text-muted">Sign in with your account credentials to use our platform</p>
      <?php
        if(isset($form_process_response)){
      ?>
      <div class="alert text-start <?php echo $form_process_response["status"] == FORM_PROCESS_SUCCESS ? "alert-success" : "alert-danger"; ?>" role="alert">
        <h6 class="alert-heading"><?php echo $form_process_response["message"]; ?></h6>
        <?php if(!empty($form_process_response["errors"])){
        ?>
          <ul>
          <?php foreach($form_process_response["errors"] as $error){
            echo "<li> {$error} </li>";
          }
          ?>
        </ul>
        <?php
        }
        ?>
      </div>
      <?php
        }
      ?>
    </div>
    <form class="needs-validation" novalidate action="login" method="post">
      <input type="hidden" name="login"/>
      <div class="row g-3">
        <div class="col-12">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" <?php form_input_text_default_value("email"); ?> placeholder="you@example.com" required>
          <div class="invalid-feedback">
            Please enter a valid email address.
          </div>
        </div>

        <div class="col-12">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
          <div class="invalid-feedback">
            Please enter a password.
          </div>
        </div>

      </div>

      <br/>

      <hr class="my-4">

      <button class="w-100 btn btn-primary btn-lg" type="submit">Sign In</button>
    </form>
    
  </main>

<?php
include_once("./includes/footer.php");
?>