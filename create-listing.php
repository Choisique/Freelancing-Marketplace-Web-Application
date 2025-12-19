<?php
include_once("./includes/header.php");

if(isset($_POST["create-listing"])){
  $form_process_response = process_create_listing_form();
  write_debug_html($form_process_response, "Form Process Response");
}
?>
  <main>
    <h2 class="display-6 text-center mb-4">Create a New Listing</h2>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <p class="fs-5 text-muted">Have a job you want done to high standards? Create a new listing today to get one of our skilled artisans</p>
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
    <form class="needs-validation" novalidate action="create-listing" method="post">
      <input type="hidden" name="create-listing"/>
      <div class="row g-3">
        <div class="col-12">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" <?php form_input_text_default_value("title"); ?> placeholder="Build kitchen cabinets" required>
          <div class="invalid-feedback">
            Valid title is required.
          </div>
        </div>

        <div class="col-12">
          <label for="description" class="form-label">Description <span> <small class="text-muted">Enter a detailed description of what you want done</small></label>
          <textarea class="form-control" id="description" name="description" placeholder="I'd like a black kitchen cabinet built with a wooden frame" required><?php echo get_form_data_safely("description"); ?></textarea>
          <div class="invalid-feedback">
            Please enter a description.
          </div>
        </div>

        <div class="col-md-4">
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
            Please choose a category.
          </div>
        </div>

        <div class="col-md-4">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" id="category" name="category" required>
            <option value="">Select a category</option>
            <option <?php form_select_default_value("category", "Building and Handyman Services"); ?>>Building and Handyman Services</option>
            <option <?php form_select_default_value("category", "Information Technology"); ?>>Information Technology</option>
            <option <?php form_select_default_value("category", "Cleaning"); ?>>Cleaning</option>
            <option <?php form_select_default_value("category", "Laundry"); ?>>Laundry</option>
          </select>
          <div class="invalid-feedback">
            Please choose a category.
          </div>
        </div>

        <div class="col-md-4">
          <label for="price" class="form-label">Price (NGN &#8358;)</label>
          <input type="text" class="form-control" id="price" name="price" <?php form_input_text_default_value("price"); ?> placeholder="13000" required>
          <div class="invalid-feedback">
            Valid price  is required.
          </div>
        </div>

      <hr class="my-4">

      <button class="w-100 btn btn-primary btn-lg" type="submit">Create Listing</button>
    </form>
    
  </main>

<?php
include_once("./includes/footer.php");
?>