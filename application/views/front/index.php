<style>
	.request-form .form-control {
		color: #645c5c !important;
		border: 1px solid #645c5c !important;
	}

	.error {
		border: 2px solid red;
	}

	.valid {
		border: 2px solid green;
	}
</style>
<div class="hero-wrap ftco-degree-bg" style="background-image: url('assets/front/images/e-parking.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
			<div class="col-lg-8 ftco-animate">
				<div class="text w-100 text-center mb-md-5 pb-md-5">
					<h1 class="mb-4">Fast &amp; Easy Way To Find Parking</h1>
					<p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
					<a href="#" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="ion-ios-play"></span>
						</div>
						<div class="heading-title ml-5">
							<span>Easy steps for find parking</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-12	featured-top">
				<div class="row no-gutters">
					<div class="col-md-4 d-flex align-items-center">

						<form class="request-form ftco-animate bg-primary" action="<?php echo 'front/checkBookDetails' ?>" style="width: 100%;background: #fff !important;" enctype="multipart/form-data" method="post">
							<h2 style="color: #1f1f1f;">Find Your Parking</h2>
							<div class="form-group">
								<label for="" class="label" style="color: #1f1f1f;">Choose Parking Location</label>
								<input type="text" class="form-control common_radius pickatime" name="location" id="address-input" placeholder="Type an address..." />
								<div id="results-dropdown" class="dropdown-content"></div>

							</div>

							<div class="d-flex">
								<div class="form-group">
									<label for="" class="label" style="color: #1f1f1f;">Parking date</label>
									<input type="date" class="form-control common_radius pickatime" name="parking_date" id="book_pick_dates" placeholder="Start Date" required>
								</div>
								<script>
									document.addEventListener('DOMContentLoaded', function() {
										var today = new Date();
										var day = String(today.getDate()).padStart(2, '0');
										var month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0
										var year = today.getFullYear();

										var todayDate = year + '-' + month + '-' + day;
										document.getElementById('book_pick_dates').setAttribute('min', todayDate);
									});
								</script>

							</div>

							<div class="form-group">
								<?php
								// Generate time options in 24-hour format with 15-minute intervals
								$timeOption = [];
								for ($h = 0; $h < 24; $h++) {
									for ($m = 0; $m < 60; $m += 15) {
										$time = sprintf('%02d:%02d', $h, $m);
										$timeOption[$time] = $time;
									}
								}
								?>
								<label for="" class="label" style="color: #1f1f1f;">Parking Start Time</label>
								<select name="parking_time" class="form-control common_radius" id="timeSelect" required>
									<option value="">Select Time</option>
									<?php foreach ($timeOption as $time) : ?>
										<option value="<?= $time ?>"><?= $time ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="" class="label" style="color: #1f1f1f;">Parking End Time</label>
								<select name="parking_end_time" class="form-control common_radius" id="timeendSelect" required>
									<option value="">Select Time</option>
									<?php foreach ($timeOption as $time) : ?>
										<option value="<?= $time ?>"><?= $time ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<input type="submit" value="Find A Parking" class="btn btn-secondary py-3 px-4">
							</div>
						</form>
					</div>
					<script>
						document.getElementById('timeInput').addEventListener('input', function() {
							var input = this.value;
							var pattern = /^(0[1-9]|1[0-2]):[0-5][0-9] (AM|PM)$/i;
							var errorMessage = document.getElementById('error-message');

							if (pattern.test(input)) {
								this.classList.remove('error');
								this.classList.add('valid');
								errorMessage.style.display = 'none';
							} else {
								this.classList.remove('valid');
								this.classList.add('error');
								errorMessage.style.display = 'block';
							}
						});

						document.getElementById('timeendInput').addEventListener('input', function() {
							var input = this.value;
							var pattern = /^(0[1-9]|1[0-2]):[0-5][0-9] (AM|PM)$/i;
							var errorMessage = document.getElementById('error-message1');

							if (pattern.test(input)) {
								this.classList.remove('error');
								this.classList.add('valid');
								errorMessage.style.display = 'none';
							} else {
								this.classList.remove('valid');
								this.classList.add('error');
								errorMessage.style.display = 'block';
							}
						});
					</script>
					<div class="col-md-8 d-flex align-items-center">
						<div class="services-wrap rounded-right w-100">
							<h3 class="heading-section mb-4">Better Way to Find Your Perfect Parking</h3>
							<div class="row d-flex mb-4">
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
										<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
										<div class="text w-100">
											<h3 class="heading mb-2">Choose Your Parking Location</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
										<div class="icon d-flex align-items-center justify-content-center"><img src="<?= base_url('assets/pin.png') ?>" width="40" height="40"></div>
										<div class="text w-100">
											<h3 class="heading mb-2">Select the Best Parking</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
										<div class="icon d-flex align-items-center justify-content-center"><img src="<?= base_url('assets/parking-sign.png') ?>" width="40" height="40"></div>
										<div class="text w-100">
											<h3 class="heading mb-2">Reserve Your Parking</h3>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
</section>


<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">What we offer</span>
				<!-- <h2 class="mb-2">Parking Place</h2> -->
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="carousel-car owl-carousel">
					<div class="item">
						<div class="car-wrap rounded ftco-animate">
							<div class="img rounded d-flex align-items-end" style="background-image: url(assets/front/images/shopping_mall.jpg);">
							</div>
							<div class="text">
								<h2 class="mb-0"><a href="#">Shopping Mall</a></h2>
								<div class="d-flex mb-3">
									<!-- <p class="price ml-auto">$100 <span>/hour</span></p> -->
								</div>
								<!-- <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p> -->
							</div>
						</div>
					</div>
					<div class="item">
						<div class="car-wrap rounded ftco-animate">
							<div class="img rounded d-flex align-items-end" style="background-image: url(assets/front/images/hospital.jpg);">
							</div>
							<div class="text">
								<h2 class="mb-0"><a href="#">Hospital</a></h2>
								<div class="d-flex mb-3">

									<!-- <p class="price ml-auto">$150 <span>/hour</span></p> -->
								</div>
								<!-- <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p> -->
							</div>
						</div>
					</div>
					<div class="item">
						<div class="car-wrap rounded ftco-animate">
							<div class="img rounded d-flex align-items-end" style="background-image: url(assets/front/images/hall.jpg);">
							</div>
							<div class="text">
								<h2 class="mb-0"><a href="#">Community Hall</a></h2>
								<div class="d-flex mb-3">
									<!-- <p class="price ml-auto">$200 <span>/hour</span></p> -->
								</div>
								<!-- <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p> -->
							</div>
						</div>
					</div>
					<div class="item">
						<div class="car-wrap rounded ftco-animate">
							<div class="img rounded d-flex align-items-end" style="background-image: url(assets/front/images/Street_Parking.jpg);">
							</div>
							<div class="text">
								<h2 class="mb-0"><a href="#">Street Parking</a></h2>
								<div class="d-flex mb-3">

									<!-- <p class="price ml-auto">$100 <span>/hour</span></p> -->
								</div>
								<!-- <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-about">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/front/images/about.jpg);">
			</div>
			<div class="col-md-6 wrap-about ftco-animate">
				<div class="heading-section heading-section-white pl-md-5">
					<span class="subheading">About us</span>
					<h2 class="mb-4">Welcome to EParking</h2>

					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
					<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
					<p><a href="#" class="btn btn-primary py-3 px-4">Search Parking</a></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Services</span>
				<h2 class="mb-3">Our Latest Services</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="services services-2 w-100 text-center">
					<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
					<div class="text w-100">
						<h3 class="heading mb-2">Real-time Availability</h3>
						<p>Show real-time parking space availability.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="services services-2 w-100 text-center">
					<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
					<div class="text w-100">
						<h3 class="heading mb-2">Advanced Reservations</h3>
						<p>Allow users to reserve parking spots in advance.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="services services-2 w-100 text-center">
					<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
					<div class="text w-100">
						<h3 class="heading mb-2">Safety and Security Features</h3>
						<p>Provide secure parking facilities with surveillance cameras.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="services services-2 w-100 text-center">
					<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
					<div class="text w-100">
						<h3 class="heading mb-2">Customer Support</h3>
						<p>Provide 24/7 customer support through chat, phone, or email.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-intro" style="background-image: url(assets/front/images/bg_3.jpg);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-6 heading-section heading-section-white ftco-animate">
				<h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
				<?php
				$user_type = $this->session->userdata('user_type');

				if (!empty($user_type)) {
				?>
					<a href="#" class="btn btn-primary btn-lg">Become A Customer</a>
				<?php } else { ?>
					<a href="<?= base_url('front/register') ?>" class="btn btn-primary btn-lg">Become A Customer</a>
				<?php  }
				?>

			</div>
		</div>
	</div>
</section>




<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Blog</span>
				<h2>Recent Blog</h2>
			</div>
		</div>
		<div class="row d-flex">
			<div class="col-md-4 d-flex ftco-animate">
				<div class="blog-entry justify-content-end">
					<a href="blog-single.html" class="block-20" style="background-image: url('assets/front/images/eparking.jpg');">
					</a>
					<div class="text pt-4">

						<h3 class="heading mt-2"><a href="#">Eliminating Traffic jams in UK</a></h3>

					</div>
				</div>
			</div>
			<div class="col-md-4 d-flex ftco-animate">
				<div class="blog-entry justify-content-end">
					<a href="blog-single.html" class="block-20" style="background-image: url('assets/front/images/eparking1.jpg');">
					</a>
					<div class="text pt-4">

						<h3 class="heading mt-2"><a href="#">How Does a Self-Parking Car Work</a></h3>

					</div>
				</div>
			</div>
			<div class="col-md-4 d-flex ftco-animate">
				<div class="blog-entry">
					<a href="blog-single.html" class="block-20" style="background-image: url('assets/front/images/eparking2.jpg');">
					</a>
					<div class="text pt-4">

						<h3 class="heading mt-2"><a href="#">Mechanism of Automated parking system</a></h3>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-counter ftco-section img bg-light" id="section-counter">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
				<div class="block-18">
					<div class="text text-border d-flex align-items-center">
						<strong class="number" data-number="5">0</strong>
						<span>Year <br>Experienced</span>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
				<div class="block-18">
					<div class="text text-border d-flex align-items-center">
						<strong class="number" data-number="<?= count(getParkingCounts()) ?>">0</strong>
						<span>Total <br>Parking</span>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
				<div class="block-18">
					<div class="text text-border d-flex align-items-center">
						<strong class="number" data-number="<?= count(getUsrsCounts()) ?>">0</strong>
						<span>Happy <br>Customers</span>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
				<div class="block-18">
					<div class="text d-flex align-items-center">
						<strong class="number" data-number="<?= count($parking_type_master) ?>">0</strong>
						<span>Total <br>Parking Type</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<style>
	#results-dropdown {
		position: absolute;
		background: white;
		border: 1px solid lightgray;
		color: #000;
		z-index: 9999;
		padding: 5px;
		width: 317px;
		/* Adjust width according to input field */
		max-height: 200px;
		overflow-y: auto;
		/* Scrollbar for Y-axis */
		display: none;
		/* Hidden by default */
	}

	#results-dropdown .dropdown-item {
		padding: 8px;
		cursor: pointer;
	}

	#results-dropdown .dropdown-item:hover {
		background-color: #f0f0f0;
	}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		$('#address-input').on('input', function() {
			let query = $(this).val();

			if (query.length > 5) { // Start searching after 2 characters
				$.ajax({
					url: 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + encodeURIComponent(query) + '.json',
					data: {
						access_token: 'sk.eyJ1Ijoic2hydXRoaWVsdXJpIiwiYSI6ImNsenJqdmFkNTF4bXMyanF1YjgzMGo0YjMifQ.S_hYTfeYscErPJURGX-Jwg',
						country: 'gb', // Specify country or other filters as needed
						types: 'address,postcode,place,poi' // Filter types
					},
					success: function(data) {
						let dropdown = $('#results-dropdown');
						dropdown.empty().show(); // Clear previous results and show dropdown

						if (data.features && data.features.length > 0) {
							$.each(data.features, function(index, feature) {
								dropdown.append('<div class="dropdown-item" data-coordinates="' + feature.geometry.coordinates + '">' + feature.place_name + '</div>');
							});
						} else {
							dropdown.append('<div class="dropdown-item">No results found</div>');
						}
					}
				});
			} else {
				$('#results-dropdown').hide();
			}
		});

		// Handle selecting an item from the dropdown
		$(document).on('click', '.dropdown-item', function() {
			let address = $(this).text();
			let coordinates = $(this).data('coordinates');

			$('#address-input').val(address);
			$('#results-dropdown').hide();

			// Use the coordinates if needed
			console.log('Selected Address:', address);
			console.log('Coordinates:', coordinates);
		});

		// Hide the dropdown if clicked outside
		$(document).click(function(e) {
			if (!$(e.target).closest('#address-input').length) {
				$('#results-dropdown').hide();
			}
		});
	});
</script>