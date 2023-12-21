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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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
            <?php if (date('Y-m-d') < '2023-05-01'){?>
              <br><br><br><br><br><br>
              <h4>The promo will start soon. Stay tuned for more updates 
                <!-- <br> on May 1, 2023 -->
              </h4>

            <?php } elseif(date('Y-m-d') > '2023-12-31'){?>
              <br><br><br><br><br><br>
              <h1>This promo has ended on December 31, 2023</h1>

            <?php } else {?>
              
              <form action="<?php echo base_url(); ?>submit_entry" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6">
                    <input
                      type="text"
                      name="fname"
                      placeholder="First Name"
                      required
                    />
                  </div>
                  <div class="col-6">
                    <input
                      type="text"
                      name="lname"
                      placeholder="Last Name"
                      required
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <input
                      type="text"
                      name="mobile"
                      placeholder="Mobile Number"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
                      pattern="^(09|\+639)\d{9}$" 
                      maxlength="11"
                      required
                    />
                    <p>Please make sure to enter your correct number</p>
                  </div>
                </div>
                <div class="row">
                  <?php
                    $time = new DateTime('now');
                    $newtime = $time->modify('-18 year')->format('Y-m-d');
                  ?>
                  <div class="col-6"><p>Birthday</p></div>
                  <div class="col-6">
                    <input 
                    type="date" 
                    id="bday" 
                    name="bday" 
                    onchange="ageApplicant()" 
                    max="<?= $newtime ?>" 
                    value="<?= $newtime ?>" 
                    required />
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <input
                      type="email"
                      name="email"
                      placeholder="Email Address"
                      pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                      required
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <input
                      type="text"
                      name="address"
                      placeholder="Complete Address"
                      required
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <select name="where" id="station-select" required>
                      <option value="" selected hidden disabled>
                        Where did you hear about the promo?
                      </option>
                      <?php foreach($referral_type as $data): ?>
                      <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <input
                      type="text"
                      name="station"
                      id="station-code-select"
                      placeholder="Station Code"
                      hidden
                    />
                  </div>
                </div>
                <table>
                  <tr>
                    <td style="width: 50px">
                      <input type="checkbox" name="agree" required />
                    </td>
                    <td>
                      <p id="terms">
                        I agree to the terms and conditions and privacy policy of
                        <a href="<?= base_url()?>policy">TOTAL Philippines</a>
                      </p>
                    </td>
                  </tr>
                </table>
                <input type="submit" value="Submit" id="submit" />
              </form>
            <?php } ?>
          </center>
        </div>
        <div id="footer">
          <div class="row">
            <div class="col-12">
                <a href="<?= base_url()?>mechanics">Mechanics</a> | <a href="<?= base_url()?>policy">Policy</a> |
                <a href="<?= base_url()?>stations">Stations</a>
              <p id="dti">
                Per DTI Fair Trade Permit No. FTEB-165723 Series of 2023 <br />
                Promo Duration: May 1 - December 31, 2023
              </p>
            </div>
          </div>
        </div>
      </div>
    </center>

    <!-- Modal -->
    <div
      id="error"
      class="modal fade"
      id="staticBackdrop"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <h2>Oops!</h2>
            <p id="err_msg">
              <!-- Duplicate Receipt Number -->

              <?php if($this->session->flashdata('error') == "already_exists"): ?>
                You have already registered in this promo.
              <?php endif ?>

              <?php if($this->session->flashdata('error') == "station_code"): ?>
                Invalid Station Code
              <?php endif ?>

              <?php if($this->session->flashdata('error') == "below_200"): ?>
                You did not reach the minimum purchase requirement to get 
                the freebie. Spend more and register again to get the P25 free fuel
                voucher!
                <br />
                Thank You!
              <?php endif ?>

              <?php if($this->session->flashdata('error') == "receipt_no"): ?>
                Duplicate Receipt Number
              <?php endif ?>

              <?php if($this->session->flashdata('error') == "no_cycle"): ?>
                Unfortunately there is no active cycle for now. Please try again later.
              <?php endif ?>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="sampleReceipt"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="sampleReceiptLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <center>Sample Receipt</center>
            <img id="img_sample_receipt" class="img-fluid" src="<?php echo base_url(); ?>assets/img/receipts.png" />
          </div>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">

    $(document).ready(function(){
      $("#station-select").change(function(){
        // alert("The text has been changed.");
        // $("#station-code-select").prop('required',true);
        // $('#aioConceptName').find(":selected").val();
        if($('#station-select').find(":selected").val() == "3") {
          $("#station-code-select").prop('required',true);
          $("#station-code-select").prop('hidden',false);
        }
        else {
          $("#station-code-select").prop('required',false);
          $("#station-code-select").prop('hidden',true);
          $("#station-code-select").val("");
        }

      });
    });
    $(window).on("load", function () {
      <?php if($this->session->flashdata('error') != ""): ?>
        $("#error").modal("show");
      <?php endif ?>
    });


    function ageApplicant() {
        var today = new Date();

        var birthDate = new Date( $("#bday").val() );
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
        {
            age--;
        }

        $("#age").val(age);
      }
  </script>

  
</html>