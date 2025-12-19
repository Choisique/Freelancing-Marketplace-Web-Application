<?php
include_once("./includes/header.php");

write_debug_html(generate_guid(), "Sample Guid");

if(isset($_POST["register"])){
  $form_process_response = process_register_form();
  write_debug_html($form_process_response, "Form Process Response");
}
?>
  <main>
    <h2 class="display-6 text-center mb-4">Sign Up</h2>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <p class="fs-5 text-muted">Create your account today as an artisan or vendor to use our platform</p>
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
    <form class="needs-validation" novalidate action="register" method="post">
      <input type="hidden" name="register"/>
      <div class="row g-3">
        <div class="col-sm-4">
          <label for="firstName" class="form-label">First name</label>
          <input type="text" class="form-control" id="firstName" name="firstName" <?php form_input_text_default_value("firstName"); ?> placeholder="John" value="" required>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>

        <div class="col-sm-4">
          <label for="lastName" class="form-label">Last name</label>
          <input type="text" class="form-control" id="lastName" name="lastName" <?php form_input_text_default_value("lastName"); ?> placeholder="Doe" value="" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>

        <div class="col-sm-4">
          <label for="location" class="form-label">Location</label>
          <select class="form-select" id="location" name="location" required>
            <option value="">Select a location</option>
            <option <?php form_select_default_value("location", "Abuja"); ?>>Abuja</option>
            <option <?php form_select_default_value("location", "Lagos"); ?>>Lagos</option>
            <option <?php form_select_default_value("location", "Port Harcourt"); ?>>Port Harcourt</option>
            <option <?php form_select_default_value("location", "Ibadan"); ?>>Ibadan</option>
            <option <?php form_select_default_value("location", "Ogun"); ?>>Ogun</option>
          </select>
          <div class="invalid-feedback">
            Please choose a location.
          </div>
        </div>

        <div class="col-12">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" <?php form_input_text_default_value("email"); ?> placeholder="you@example.com" required>
          <div class="invalid-feedback">
            Please enter a valid email address.
          </div>
        </div>

        <div class="col-12">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Choose a password" required>
          <div class="invalid-feedback">
            Please enter a password.
          </div>
        </div>

        <div class="col-12">
          <label for="password" class="form-label">Repeat Password</label>
          <input type="password" class="form-control" id="repeatPassword" name="repeatPassword" placeholder="Repeat your password" required>
          <div class="invalid-feedback">
            Please repeat your password.
          </div>
        </div>

        <div class="col-12">
          <label for="address" class="form-label">Bio <span> <small class="text-muted">Tell us about yourself</small></label>
          <textarea class="form-control" id="bio" name="bio" placeholder="I'm a skilled carpenter and have done this professionally for 12 years. When I'm not woodworking, I'm enjoying some goat meat pepper soup" required><?php echo get_form_data_safely("bio"); ?></textarea>
          <div class="invalid-feedback">
            Please enter your bio.
          </div>
        </div>

      </div>

      <br/>

      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="artisan" name="isArtisan" <?php form_input_checkbox_default_value("isArtisan"); ?>>
        <label class="form-check-label" for="artisan">I want to bid for jobs on this platform</label>
      </div>

      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="vendor" name="isVendor" <?php form_input_checkbox_default_value("isVendor"); ?>>
        <label class="form-check-label" for="vendor">I have jobs and would like to be in touch with artisans</label>
      </div>

      <hr class="my-4">

      <button class="w-100 btn btn-primary btn-lg" type="submit">Create Account</button>
    </form>
    
  </main>

<?php
include_once("./includes/footer.php");
?>