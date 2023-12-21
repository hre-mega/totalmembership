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
            <div class="scroll-container">
              <h6>
                PROMO MECHANICS <br />
                Promo duration: May 1 to December 31, 2023
              </h6>
              <ol type="I">
                <li>PROMO COUPONS</li>
                <ol>
                  <li>
                    The promo runs from May 1 to December 31, 2023 and is open to all Total Philippines customers who are 18 years old and above.
                  </li>
                  <li>
                    Customers can register even without prior purchase.
                  </li>
                  <li>
                    To access the registration page, the customer must scan the website’s QR code at the participating Total station or by link: membership.totalretailrewards.com
                  </li>
                  <li>
                    Registration details to provide:
                  </li>
                  <ul>
                    <li>
                      Full name
                    </li>
                    <li>
                      Valid mobile number
                    </li>
                    <li>
                      Email address
                    </li>
                    <li>
                      City address
                    </li>
                    <li>
                      Birthday
                    </li>
                    <li>
                      Where did you hear about the promo: station pump attendant, friend or relative, facebook, tiktok, SMS, Others
                    </li>
                    <li>
                      Station code of the participating Total station (if the answer to the previous question is “Station pump attendant)
                    </li>
                  </ul>
                  <li>
                    After completing registration, a pop-up game in the form of a spinning wheel will appear. Fuel voucher prizes with the following peso denominations: Php10, Php15, Php20, or Php25 are displayed across the wheel.
                  </li>
                  <li>
                    The customer can have the chance to win any of the fuel voucher prizes on the wheel by tapping the “Go” button. The voucher amount that randomly stops at the arrow of the wheel is the prize to be awarded to the customer.
                  </li>
                  <li>
                    The prize won by the customer will be displayed on the screen and sent via SMS to the registered mobile number. 
                  </li>
                  <li>
                    The Fuel voucher prize is valid for 5 days and can be redeemed at participating TOTAL stations. For the complete list, visit link: membership.totalretailrewards.com/stations
                  </li>
                  <li>
                    Only one-time registration and fuel voucher sending per customer.
                  </li>
                  <li>
                    Fuel Voucher prizes are transferable but not convertible to cash.
                  </li>
                  <li>
                    Total (Philippines) Corporation reserves the right to refuse to award the free fuel vouchers to transactions that are invalid and fraudulent such as but not limited to system glitch or collusion.
                  </li>
                  <li>
                    By joining the program, the participants agree to provide their personal data for use of Total (Philippines) Corporation for the purpose of the conduction of the program and in accordance with the provisions of the Privacy Act Law.
                  </li>
                </ol>
              </ol>
              <p>Per DTI Fair Trade Permit No. FTEB-165723 Series of 2023</p>
            </div>
            <br />
            <a href="<?= base_url()?>register">
              <button class="exit">Exit</button>
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
  </body>
</html>
