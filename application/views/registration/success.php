<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Total Extreme Deals and Freebies</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/styles.css" />
  </head>
  <body>
    <center>
      <div id="main">
        <div id="header">
          <img id="header_img" src="<?php echo base_url(); ?>assets/img/logo.png" />
        </div>
        <div id="content">
          <center>
            <img id="station_img" src="<?php echo base_url(); ?>assets/img/station.png" />
            <h1 id="register_now">Register Now!</h1>
            <h5 id="be_informed">
              Be informed of our latest promos <br />
              and special offers
            </h5>
            <br />
            <br />
            <h1 id="thanks">
              Thank you for your <br />
              Registration!
            </h1>
            <div id="reg_num_container">
              <h6 id="reg_num_header">Here is your registration number:</h6>
              <h1 id="reg_num"><?= $registration_number ?></h1>
            </div>
            <p id="voucher">
              Your Free <?= $voucher_win ?> Fuel Voucher was sent to your registered number. 
            
              <br /><br />

              We will keep in touch and inform you of our latest promotions and special offers via SMS.

              <br /><br />

              Hope to see you again soon at your favorite Total Station!
            </p>
            
            <a href="<?php echo base_url(); ?>register">
            <input value="Exit" id="submit" />
            </a>
          </center>
        </div>
        <div id="footer">
          <div class="row">
            <div class="col-12">
              <p>
                <a href="<?= base_url()?>mechanics">Mechanics</a> | <a href="<?= base_url()?>policy">Policy</a> |
                <a href="<?= base_url()?>stations">Stations</a>
              </p>
              <p id="dti">
                Per DTI Fair Trade Permit No. FTEB-165723 Series of 2023 <br />
                Promo Duration: May 1 - December 31, 2023
              </p>
            </div>
          </div>
        </div>
      </div>
    </center>

    <div
      class="modal fade"
      id="spinWheel"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="spinWheelLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-sm ">
        <div class="modal-content modal-content-success">
          <div class="modal-body modalSpinWheel" id="modalSpinWheel">
            <br />
            <p class="txt-instruction-spin-wheel">
            Tap "Go" for a chance to get up to P25 FUEL VOUCHER
            </p>
            <br /><br /><br />
            <!-- =========================================================================== -->
            <input type="text" id="spin_value" hidden/>
            <div id="mainbox" class="mainbox">
              <div id="line"></div>
              <div id="box" class="box">
                <!-- <div class="box1">
                  <span class="span1"><b>P20</b></span>
                  <span class="span2"><b>P20</b></span>
                  <span class="span3"><b>P10</b></span>
                  <span class="span4"><b>P10</b></span>
                </div>
                <div class="box2">
                  <span class="span5"><b>P25</b></span>
                  <span class="span6"><b>P25</b></span>
                  <span class="span7"><b>P15</b></span>
                  <span class="span8"><b>P15</b></span>
                </div> -->
                <img class="img-wheel" src="<?= base_url()?>/assets/img/wheel/Updated wheel.png">
              </div>

              
              <button class="spin" onclick="spinFunction()">GO</button>
              <div class="spin-pointer">   
              </div>
              
              <div id="output"></div>
            </div>
            <!-- =========================================================================== -->
          </div>
        </div>
      </div>
    </div>


    <div
      class="modal fade"
      id="finishWheel"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="finishWheelLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-sm">
        <div class="modal-content modalSuccessVoucher">
          <div class="modal-header modalSuccessVoucherHeader">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            
            <!-- =========================================================================== -->
            
            <?php if($voucher_win == "P10"): ?>
              <img class="img-voucher" src="<?= base_url()?>/assets/img/wheel/10.png">
            <?php elseif($voucher_win == "P15"): ?>
              <img class="img-voucher" src="<?= base_url()?>/assets/img/wheel/15.png">
            <?php elseif($voucher_win == "P20"): ?>
              <img class="img-voucher" src="<?= base_url()?>/assets/img/wheel/20.png">
            <?php elseif($voucher_win == "P25"): ?>
              <img class="img-voucher" src="<?= base_url()?>/assets/img/wheel/25.png">
            <?php elseif($voucher_win == "P50"): ?>
              <img class="img-voucher" src="<?= base_url()?>/assets/img/wheel/50.png">  
            <?php endif ?>
            <input value="Ok" id="submit" data-bs-dismiss="modal" aria-label="Close"/>
            <!-- =========================================================================== -->
          </div>
        </div>
      </div>
    </div>
    <form id="sms_form">
      <input name="registration_number" value="<?= $registration_number ?>" hidden/>
      <input name="voucher_code" value="<?= $voucher_code ?>" hidden/>
      <input name="valid_date" value="<?= $voucher_code_expiration ?>" hidden/>
      <input name="voucher" value="<?= $voucher_win ?>" hidden/>
      <input name="mobile" value="<?= $mobile ?>" hidden/>
    </form>
  </body>

  <script>
    $( document ).ready(function() {
      $("#spinWheel").modal("show");
    });
  </script>

  <script>

    var spinCount = 6;
    function spinFunction() {
      // if (spinCount > 3) {
      //   alert("No more Spins");
      //   return false;
      // }
      var x = 1024; //min value
      var y = 9999; // max value
      document.getElementById("output").innerHTML = ""; 

      // SPAN 1 = (360 * 3) + (45 * 2); CHECK 20
      // SPAN 2 = (360 * 3) + (45 * 6); CHECK 20
      // SPAN 3 = (360 * 3) + (45 * 4); CHECK 10
      // SPAN 4 = (360 * 3) + (45 * 0); CHECK 10
      // SPAN 5 = (360 * 3) + (45 * 5); CHECK 25
      // SPAN 6 = (360 * 3) + (45 * 1); CHECK 25
      // SPAN 7 = (360 * 3) + (45 * 7); CHECK 15
      // SPAN 8 = (360 * 3) + (45 * 3); CHECK 15


      switch("<?= $voucher_win?>") { 
        case "P10":
          var deg = (360 * 3) + (36 * 5); 
          break;
        case "P15":
          var deg = (360 * 3) + (36 * 4); 
          break;
        case "P20":
          var deg = (360 * 3) + (36 * 3);
          break;
        case "P25":
          var deg = (360 * 3) + (36 * 2);
          break;
        case "P50":
          var deg = (360 * 3) + (36 * 1);
          break;
        default:
      }

      document.getElementById('box').style.transform = "rotate(" + deg + "deg)"; 
      var element = document.getElementById('mainbox');
      element.classList.remove('animate');
      

      setTimeout(function() {
        element.classList.add('animate');

        $("#spinWheel").modal('toggle');

        $('#sms_form').ajaxSubmit(function() {
          $.ajax({
            url: '<?= base_url()?>registration/sms',
            type: 'POST',
            data:  $("#sms_form").serialize(),
            success: function(data) {
              $("#finishWheel").modal("show");
            } 
          });
		      
        });

      }, 5000); 
      spinCount++;
    }

  </script>
</html>
