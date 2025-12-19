<?php
include_once("./includes/header.php");
$listings = get_available_listings();
?>
  <main>
    <h2 class="display-6 text-center mb-4">Available Listings</h2>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <?php
        if($listings == QUERY_RESULTS_EMPTY){
          echo '<p class="fs-5 text-muted">There are no available listings at this time, please check back later</p>';
        } else {
          echo '<p class="fs-5 text-muted">See available job listings below</p>';
        }

        echo get_single_read_session_as_bootstrap_alert(LOGIN_SUCCESS);
      ?>
    </div>

    <?php
      if($listings != QUERY_RESULTS_EMPTY){
        foreach($listings as $listing) {
          $price = number_format(((double) $listing["Price"])/100, 2);
    ?>
        <div class="card mb-3">
          <h5 class="card-header">
            <?php echo $listing["Title"] ?>
          </h5>
          <div class="card-body">
            <div class="card-title"> <?php echo "NGN {$price}"; ?> <span class="text-muted">&nbsp; <?php echo "{$listing['Category']} - {$listing['Location']}"; ?></span></div>
            <p class="card-text"><?php echo $listing["Description"]; ?></p>

            <a href="<?php echo "./view-listing?listing-id={$listing['Id']}"; ?>" class="btn btn-primary">View listing</a>
          </div>
        </div>

    <?php
        }
      }
    ?>

  </main>

<?php
include_once("./includes/footer.php");
?>