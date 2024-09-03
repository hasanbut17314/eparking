<!DOCTYPE html>
<html lang="en">

<head>
  <title>E-Parking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('assets/front/css/open-iconic-bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/front/css/animate.css') ?>">

  <link rel="stylesheet" href="<?= base_url('assets/front/css/owl.carousel.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/front/css/owl.theme.default.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/front/css/magnific-popup.css') ?>">

  <link rel="stylesheet" href="<?= base_url('assets/front/css/aos.css') ?>">

  <link rel="stylesheet" href="<?= base_url('assets/front/css/ionicons.min.css') ?>">

  <link rel="stylesheet" href="<?= base_url('assets/front/css/bootstrap-datepicker.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/front/css/jquery.timepicker.css') ?>">


  <link rel="stylesheet" href="<?= base_url('assets/front/css/flaticon.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/front/css/icomoon.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/front/css/style.css') ?>">
  <style>
    .dropbtn {



      padding: 16px;

      font-size: 16px;

      border: none;

    }



    .dropdown {

      position: relative;

      display: inline-block;

    }

    .hero-wrap.hero-wrap-2.js-fullheight {
      background-position: 50% 87%;
    }


    .dropdown-content {

      display: none;

      position: absolute;

      background-color: #f1f1f1;

      min-width: 160px;

      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);

      z-index: 1;

    }



    .dropdown-content a {

      color: black;

      padding: 12px 16px;

      text-decoration: none;

      display: block;

    }



    .dropdown-content a:hover {
      background-color: #ddd;
    }



    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>">E<span>Parking</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="<?= base_url('/') ?>" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="<?= base_url('front/about') ?>" class="nav-link">About</a></li>
          <li class="nav-item"><a href="<?= base_url('front/contact_us') ?>" class="nav-link">Contact</a></li>
          <?php if (!empty($this->session->userdata('email'))) { ?>

            <div class="dropdown nav-item">

              <button class="dropbtn" style="background: none;color: #fff;"><?= $this->session->userdata('name') ?></button>

              <div class="dropdown-content">

                <a href="<?= base_url('front/profile') ?>">Profile</a>
                <a href="<?= base_url('front/profiles') ?>">Mybookings </a>
                <a href="<?= base_url('front/logout') ?>">Logout</a>
                <a type="button" style="color: black;" data-toggle="modal" data-target="#reportModal">Report</a>

              </div>

            </div>

            <!-- Notification Bell Icon -->
            <div style="position: relative;">
              <?php
              $userId = $this->session->userdata('admin_id');
              $notificationCount = $this->db->where('user_id', $userId)->count_all_results('notifications');
              $notifications = $this->db->where('user_id', $userId)->order_by('created_at', 'DESC')->get('notifications')->result();
              ?>
              <button id="notification-bell" style="background: none; border: none; cursor: pointer; font-size: 20px; outline: none;" class="pt-2">
                🔔
                <?php if ($notificationCount > 0): ?>
                  <span id="notification-count" style="position: absolute; top: 6px; right: -2px; background-color: red; color: white; border-radius: 50%; padding: 1px 7px; font-size: 10px;"><?php echo $notificationCount; ?></span>
                <?php endif; ?>
              </button>

              <!-- Notification Container -->
              <div id="notification-container" style="display: none; flex-direction: column; position: absolute; top: 45px; right: 0; background-color: #fff; border: 1px solid #ccc; border-radius: 5px; width: 300px; max-height: 400px; min-height: 300px; overflow-y: auto; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); z-index: 1000; <?= empty($notifications) ? 'justify-content: center; align-items: center;' : '' ?>">
                <?php
                if (!empty($notifications)) {
                  echo '<div class="p-2 bg-light d-flex align-self-top">Notifications</div>';
                  foreach ($notifications as $notification) {
                    echo '<div style="padding: 8px; border-bottom: 1px solid #ccc;">' . $notification->message . '</div>';
                  }
                } else {
                  echo '<div style="padding: 8px; text-align: center;">No notifications</div>';
                }
                ?>
              </div>
            </div>


          <?php } else { ?>

            <li class="nav-item"><a onclick="routeChanger()" class="nav-link btn">Login/Register</a></li>

          <?php } ?>

        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <!-- Modal to send report message -->
  <div class="modal fade" id="reportModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="reportLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="reportLabel">Report a Problem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary sendReport">Send</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for thanks -->
  <div class="modal fade" id="thanksModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="thanksModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="thanksModalLabel">Report Sent</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Thanks for letting us know about your problem. We will look into it.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="/eparking/assets/js/jquery-1.7.1.min.js"></script>
  <script>
    function routeChanger() {
      window.location = "<?= base_url('front/login') ?>";
    }

    function validateReportForm() {
      var name = $("#name").val().trim();
      var message = $("#message").val().trim();

      if (name !== "" && message !== "") {
        $(".sendReport").prop("disabled", false);
      } else {
        $(".sendReport").prop("disabled", true);
      }
    }

    $("#name, #message").on("input", validateReportForm);

    $(document).on("click", ".sendReport", function() {
      var name = $("#name").val();
      var message = $("#message").val();

      $.ajax({
        method: "POST",
        url: "sendReport",
        data: {
          name: name,
          message: message
        },
        success: function(data) {
          if (data == 200) {
            $('#reportModal').modal('hide');
            $('#thanksModal').modal('show');
          } else {
            alert("Something went wrong! Please try again later.");
          }
        }
      });
    });

    $(document).ready(function() {
      validateReportForm();
    });

    // Toggle Notification Container
    document.getElementById('notification-bell').addEventListener('click', function() {
      var container = document.getElementById('notification-container');
      container.style.display = container.style.display === 'none' ? 'flex' : 'none';
    });
  </script>