<?php
include_once("./includes/header.php");
if(isset($_GET["listing-id"])){
  $listing = get_listing_by_id($_GET["listing-id"]);
}

if(!isset($listing) || $listing == QUERY_RESULTS_EMPTY){
?>
<main>
    <h2 class="display-6 text-center mb-4">Listing Not Found</h2>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <p class="fs-5 text-muted"></p>
    </div>
  </main>
<?php
}
else {
  $price = number_format(((double) $listing["Price"])/100, 2);
?>

  <main>
    <h2 class="display-6 text-center mb-4">View Listing</h2>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <p class="fs-5 text-muted"></p>
      <?php echo get_single_read_session_as_bootstrap_alert(LISTING_CREATED); ?>
    </div>

    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title"><?php echo $listing["Title"]; ?></h5>
        <h6 class="card-subtitle mb-4 text-muted"> <?php echo "NGN {$price} - {$listing['Category']} - {$listing['Location']}"; ?></h6>
        <p class="card-text mb-4"><?php echo $listing["Description"]; ?></p>
        <br/>
        <?php
            echo is_authenticated() ? '<a href="#" class="btn btn-primary mr-3"> Apply for this listing </a>' : '<a href="login" class="btn btn-secondary mr-3"> You need to be logged in to apply </a>'
        ?>
        &nbsp;
        <a href="./view-listings" class="ml-3 card-link text-muted">Similar listings</a>
      </div>
    </div>


  </main>

<?php
}
include_once("./includes/footer.php");
?>