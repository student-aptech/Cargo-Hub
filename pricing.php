<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cargo Hub</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/1.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <!-- <link href="assets/css/style.css" rel="stylesheet"> -->

  <!-- =======================================================
  * Template Name: Logis
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .message{
   position: sticky;
   top:0;bottom: 1%;
   background-color: #eee;
   padding:1rem;
   display: flex;
   align-items: center;
   gap:1rem;
   justify-content: space-between;
   
}

.message.form{
   /* max-width: 1200px */
   width: 60%;
   margin: 5px  auto;
   /* background-color: ; */
   top: 2rem;
   border-radius: .5rem;
   margin-bottom: 20px;
}

.message span{
   font-size: 1.2rem;
   color:var(--black);
}

.message i{
   font-size: 1.5rem;
   color:#e74c3c;
   cursor: pointer;
   transition: .2s linear;
}

.message i:hover{
   transform: rotate(90deg);
}

.empty{
   background-color: var(--white);
   border-radius: .5rem;
   padding: 1.5rem;
   text-align: center;
   width: 100%;
   font-size: 2rem;
   color: var(--red);
}
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>CARGO HUB</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <?php
                                if(!isset($_SESSION['user_email'])){
                                    echo " 
                                       <li> <a href='pricing.php' class='dropdown-item'>Track Shipment</a> </li>";
                                }
                                if(isset($_SESSION['user_email'])){
                                  echo "
                                  <li> <a href='./user/logout.php'style='display:none;' class='dropdown-item'>Logout</a> </li> ";
                              }
                            ?>
          <li><a href="contact.php">Contact</a></li>
          <?php
                                if(!isset($_SESSION['user_email'])){
                                    echo "  <div class='dropdown'>
                                    <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span><i class='fa-solid fa-users fs-5'></i></span></a>
                                    <ul class='dropdown-menu'>
                                       <li> <a href='./user/login.php' class='dropdown-item'>User Login</a> </li>
                                       <li> <a href='./admin/adminlogin.php' class='dropdown-item'>Admin Login</a> </li>
                                       <li> <a href='./agent/agentlogin.php' class='dropdown-item'>Agent Login</a> </li>
                                    </ul>
                                </div>";
                                }
                                if(isset($_SESSION['user_email'])){
                                  echo "<div class='dropdown'>
                                  <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'><span><i class='fa-solid fa-user fs-5'></i></span></a>
                                  <ul class='dropdown-menu'>
                                  <li> <a href='./user/logout.php' class='dropdown-item'>Logout</a> </li> 
                                  <li> <a href='./user/userprofile.php' class='dropdown-item'>User Dashboard</a> </li> 
                                  </ul>
                                  </div>"; 
                              }
                                
                            ?>
          <li><a class="get-a-quote" href="get-a-quote.php">send a courier</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Tracking!</h2>
              <p>Our courier company's beating heart, the cargo hub, blends strategic precision with advanced technology for seamless, rapid deliveries. Strategically located, it minimizes transit times, ensuring timely and efficient service. Elevate your shipping experience with our commitment to excellence at the core of our cargo hub operations.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Track Shippment</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->

    <section id="horizontal-pricing" class="horizontal-pricing pt-0 pb-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Track a Parcel</span>
          <h2>Track a Parcel</h2>

        </div>

      </div>
    </section>
 
    <div class="form-container">
    <form action="" method="post" class="form">
    
    <input type="text" name="cat" id="input" placeholder="Enter Your Tracking Number" >
    
    <input type="submit" value="Track Shippment" name="searchitem" class="track-btn">
    </form>
 
    
    
<?php
 if(isset($_POST['searchitem'])){
    
include("connection.php");


    $ser = $_POST['cat'];
    $query = "SELECT * FROM tbl_bills WHERE Courier_No = '$ser' ";
     $result = mysqli_query($con,$query);


       $record = "";      
?>

        <table border="1" class="c-table">
        <tbody id="tbody">

        <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message form">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>    
    
<?php

if (mysqli_num_rows($result)) {
  echo "<table border='1' class='c-table'>";
  echo "<tr>
          <th>Courier-No</th>
          <th>Sender-Name</th>
          <th>Reciever-Name</th>
          <th>Delivery-Date</th>
          <th>Courier-Type</th>
          <th>Status</th>
          <th>Option</th>
      </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>{$row['Courier_No']}</td>";
      echo "<td>{$row['s_name']}</td>";
      echo "<td>{$row['r_name']}</td>";
      echo "<td>{$row['c_date']}</td>";
      echo "<td>{$row['c_type']}</td>";
      echo "<td>{$row['c_status']}</td>";
   
      echo "<td>
      <button class='print-button'><a href='./assets/file/print.php'>Print Status</a></button>
      </td>";
      echo "</tr>";
  }

  echo "</table>";
}else {
  $message[] = 'No Record Found!';
  foreach($message as $message){
    echo '
    <div class="message form">
       <span>'.$message.'</span>
       <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>
    ';
 }
}

 };



 ?>


 </tbody>
</table>
</div>


<section class="section">
<div class="main-para">
  <div class="para">
    <h1>Cargo Hub Courier Tracking!</h1>
    <p><span>Cargo Hub</span> Tracking helps you trace the status of your shipments and parcels. Easily track your shipments online in just one click. Simply enter your tracking number and click on the Track Button. Our tracking is fast, simple and convenient. You can track your shipment easily from anywhere from any device. 
    <span>Cargo Tracking</span> is available round the clock with a simple and easy user interface.Cargo Hub tracking provides you with the most convenient way to track your parcel. Lcs tracking helps you to easily access the tracking system. Just enter your 9 digits tracking number to track the shipment. By <span>LCS tracking</span>, you can locate your parcel at each transit point until delivering the parcel.</p>

  </div>

  <div class="para">
    <h1>How to Track through LCS Tracking</h1>
    <p>Our Overnight and Cash On Delivery Services continues to deliver as per the customer’s expectation. Our services are best for speedy and urgent deliveries for customers. Customers can easily track their Overnight and COD shipments through our easy-to-use Cargo Hub online tracking. By entering their 14-digit Cargo Hub tracking number they can trace their parcels. Cargo Hub being the leader in providing Warehousing and Distribution solutions. They are providing the top E-commerce and online e-tailors with eFulfillment Services.</p>
    </div>

    <div class="para">
      <h1>Tracking eFulfillment Shipments with Lcs Tracking Number</h1>
      <p>Firstly customers can use the <span>Cargo Tracking</span> to track the status of their customer’s parcels once they have been picked and packed. Give your business a competitive edge with Cargo Hub and monitor your parcel by Cargo Hub online tracking. Give visibility into all your standard freight shipments. Secondly it can take up a few hours for status to appear in the LCS tracking system. Give it a bit of time then try again. The status will stay in our system for approximately 90 days.

Lay your International exporting fear to rest. Our shipping expert will help you to get better at the challenges of international shipping without breaking the bank. Just tell us where and when we will do the rest. <span>Cargo Tracking Number </span> will be provided to easily track the parcel end to end. Cargo Hub has developed the most affordable shipping solution to fit any need. Our reliable and cost-efficient overland service can deliver all of your heavy-weighted parcels across Pakistan.</p>
    
    </div>

    <div class="para">
      <h1>Quality Tracking with Cargo Hub </h1>
      <p>In Cargo Hub Courier Service, we pride ourselves on providing customer satisfaction and quality service. So get your documents attested by the Ministry of Foreign affairs at the agreed time. To monitor, track your documents by <span>Lcs Online Tracking </span>

      <span>Cargo Tracking Pakistan</span>: So you are authorized to use this tracking system solely to track shipments tendered by Cargo hub courier by, for, or to you. Cargo hub tracking is designed to track all of your domestic and international shipments easily at one platform to facilitate and simplify our customer’s life.

Our complete dedication to the excellence has remained constant ensuring that our customer service is there for you 24/7. For any inquiries, please call our helpline at 021 111 300 786 or approach to our 24/7 active social media.</p>
    
    </div>
</div>
</section>
  </main> 

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

<div class="container">
  <div class="row gy-4">
    <div class="col-lg-5 col-md-12 footer-info">
      <a href="index.php" class="logo d-flex align-items-center">
        <span>CARGO HUB</span>
      </a>
      <p>Our cargo hub stands as the heartbeat of efficiency for our courier company. Strategically located and technologically advanced, it ensures swift processing and real-time tracking, setting a new standard for seamless logistics and reliable deliveries. At the core of our operations, the cargo hub reflects our commitment to excellence in service.</p>
      <div class="social-links d-flex mt-4">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

    <div class="col-lg-2 col-6 footer-links">
      <h4>Useful Links</h4>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Terms of service</a></li>
        <li><a href="#">Privacy policy</a></li>
      </ul>
    </div>

    <div class="col-lg-2 col-6 footer-links">
      <h4>Our Services</h4>
      <ul>
        <li><a href="#">Web Design</a></li>
        <li><a href="#">Web Development</a></li>
        <li><a href="#">Product Management</a></li>
        <li><a href="#">Marketing</a></li>
        <li><a href="#">Graphic Design</a></li>
      </ul>
    </div>

    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
      <h4>Contact Us</h4>
      <p>
        Aptech Metro <br>
        star Gate Karachi<br>
        Pakistan <br><br>
        <strong>Phone:</strong> +123 456 789<br>
        <strong>Email:</strong> info@example.com<br>
      </p>

    </div>

  </div>
</div>

<div class="container mt-4">
  <div class="copyright">
    &copy; Copyright <strong><span>CargoHub</span></strong>. All Rights Reserved
  </div>
  </div>
</div>

</footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>

</body>

        </html>