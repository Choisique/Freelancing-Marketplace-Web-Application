<?php
include_once("./includes/header.php");
$listings_per_category = listings_per_category();
$listings_per_location = listings_per_location();
?>
  <main>
    <h2 class="display-6 text-center mb-4">Insights &amp; Analytics</h2>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <p class="fs-5 text-muted text-start">Insights and data are what makes our platform stand out. Artisans and Vendors have access to real time analytics of the market conditions, job availability, in demand skills so they can put in the best offers for the best value. </p>
    <p class="fs-5 text-muted text-start">This works by simply using SQL queries that GROUP BY location, category and the Javascript <a href = "https://www.chartjs.org/docs/latest/" target="_blank">Chart.js</a> library</p>
    </div>

    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Job listings available per location
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <canvas id="listingsPerLocation"></canvas>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Job listings available per category
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <canvas id="listingsPerCategory"></canvas>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Average price per category
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <canvas id="averageListingPricePerCategory"></canvas>
          </div>
        </div>
      </div>
  </div>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const listingsPerLocationCanvas = document.getElementById('listingsPerLocation');

    new Chart(listingsPerLocationCanvas, {
      type: 'bar',
      data: {
        labels: ['Abuja', 'Lagos', 'Port Harcourt', 'Ibadan', 'Ogun'],
        datasets: [{
          label: '# of Listings',
          data: [<?php echo "{$listings_per_location['Abuja']['Count']}, {$listings_per_location['Lagos']['Count']}, {$listings_per_location['Port Harcourt']['Count']}, {$listings_per_location['Ibadan']['Count']}, {$listings_per_location['Ogun']['Count']}"; ?>],
          // data: [12, 19, 3, 5, 2],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const listingsPerCategoryCanvas = document.getElementById('listingsPerCategory');

    new Chart(listingsPerCategoryCanvas, {
      type: 'doughnut',
      data: {
        labels: ['Building & Handyman', 'Information Technology', 'Cleaning', 'Laundry'],
        datasets: [{
          label: '# of Listings',
          data: [<?php echo "{$listings_per_category['Building and Handyman Services']['Count']}, {$listings_per_category['Information Technology']['Count']}, {$listings_per_category['Cleaning']['Count']}, {$listings_per_category['Laundry']['Count']}"; ?>],
          // data: [10, 20, 3, 5],
          backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(255, 205, 86)',
          'rgb(102, 153, 153)'
        ],
        hoverOffset: 4
        }]
      }
    });

    const averageListingPricePerCategoryCanvas = document.getElementById('averageListingPricePerCategory');

    new Chart(averageListingPricePerCategoryCanvas, {
      type: 'line',
      data: {
        labels: ['Building & Handyman', 'Information Technology', 'Cleaning', 'Laundry'],
        datasets: [{
          label: 'Average price per Category',
          data: [<?php echo "{$listings_per_category['Building and Handyman Services']['AveragePrice']}, {$listings_per_category['Information Technology']['AveragePrice']}, {$listings_per_category['Cleaning']['AveragePrice']}, {$listings_per_category['Laundry']['AveragePrice']}"; ?>],
          // data: [50000, 150000, 35000, 15000],
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        }]
      }
    });
    

  </script>

<?php
include_once("./includes/footer.php");
?>