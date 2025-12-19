<?php
include_once("./includes/header.php");
?>
  <main>
    <h2 class="display-6 mb-4">Introduction</h2>
    <p class="fs-5 text-muted"> Workman is a freelancing network for built by Nigerians for Nigerians. We support local artisans and ensure that the work delivered is done to the best of standards while ensuring that everything from contracting to payments are smooth and hitchfree for both parties</p>
    <br/>
    <div>
      <img src="./assets/images/electrician.jpg" class="img-fluid rounded hero-img" alt="Workman">
    </div>
    <br/>
    <?php
        if(is_authenticated()){
    ?>
    <p class="fs-5 text-muted"><a href="view-listings">View listings</a> or <a href="create-listing">create a new listing</a> today</p>
    <?php
        } else {
    ?>
    <p class="fs-5 text-muted"><a href="login">Sign in</a> or <a href="register">create and account</a> to start using</p>
    <?php
        }
    ?>        
    
  </main>

<?php
include_once("./includes/footer.php");
?>