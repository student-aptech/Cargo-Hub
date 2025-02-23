<?php
include('connection.php');
session_start();
if(!isset($_SESSION['user_email'])){
   
  echo "<script>

  window.location.href = './user/login.php';
  </script>";

}
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

  <!-- =======================================================
  * Template Name: Logis
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
 .message{
   position: absolute;
   top:10% !important;right: 25%;
   background-color: #eee;
   padding:3rem;
   display: flex;
   align-items: center;
   gap:1rem;
   justify-content: space-between;
}

.message.form{
   width: 50%;
   margin: 0 auto;
   background-color:#eee;
   top: 2rem;
   border-radius: .5rem;
   height: 20px;
   /* padding: 15px; */
}

.message span{
   font-size: 1.2rem;
   color:var(--black);
}

.message i{
   font-size: 2rem;
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
              <h2>Post a Courier</h2>
              <p>"At [Courier Cargo Hub], we specialize in swift and reliable parcel delivery services. Our commitment to punctuality and secure handling ensures your packages reach their destination on time, every time. Experience hassle-free shipping with us – your trusted courier partner."</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Get a Quote</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->
   
    <!-- ======= Get a Quote Section ======= -->
    <section id="get-a-quote" class="get-a-quote">
      <div class="container" data-aos="fade-up">

        <div class="row g-0">

          <div class="col-lg-5 quote-bg" style="background-image: url(assets/img/quote-bg.jpg);"></div>
   
          <div class="col-lg-7" >

            <form action="#" method="post" class="form-control p-5 form-desgin">
              <h3>Get a courier</h3>
              <p>"Swift, secure, and reliable courier services—your parcels' journey begins and ends with our commitment to excellence in every delivery."</p>
              <div class="row gy-4">

                <div class="col-lg-12">
                  <h4>Sender / Reciver Information</h4>
                </div>

                <div class="col-md-12">
                <input type="text" name="uname" value="<?php echo $_SESSION['U_id']?>" readonly  style="width: 100%; padding: 12px; border: 1px solid #ccc; display:none; ">
                </div>

                <div class="col-md-12">
                <input type="text" name="sname"   required placeholder="Sender Name" pattern="[A-Za-z\s]{3,}" style="width: 100%; padding: 12px; border: 1px solid #ccc; ">
                </div>

                <div class="col-md-12">
                <input type="text" name="rname" required placeholder="Reciever Name" pattern="[A-Za-z\s]{3,}" style="width: 100%;
                padding: 12px; border: 1px solid #ccc;" >
                </div>

                <div class="col-md-12 ">
                <input type="email" name="semail"  required placeholder="Sender Email" pattern="[a-z _\-\.]+[0-9]+[@][a-z]+[\.][a-z]{2,3}" style="width: 100%;
                padding: 12px; border: 1px solid #ccc;">
                </div>

                <div class="col-md-12 ">
                <input type="email" name="remail" required placeholder="Receiver Email" pattern="[a-z _\-\.]+[0-9]+[@][a-z]+[\.][a-z]{2,3}" style="width: 100%;
                padding: 12px; border: 1px solid #ccc;">
                </div>

                <div class="col-md-12">
                <input type="text" name="scontact" required placeholder=" Sender Contact" pattern="[0-9]{11}" style="width: 100%;
                padding: 12px; border: 1px solid #ccc;">
                </div>

                <div class="col-md-12">
                <input type="text" name="rcontact" required placeholder=" Reciever Contact" pattern="[0-9]{11}" style="width: 100%;
                padding: 12px; border: 1px solid #ccc;">
                </div>


                <div class="col-md-12">
                <div class="col-md-12">
                <select id="cities" name="areas" onchange="populateAreas()" style="width: 100%;
                padding: 12px; border: 1px solid #ccc;">
        <option >Sender form</option>
    </select>
                </div>
                </div>

                <div class="col-md-12">
                <div class="col-md-12">
                <select id="city" name="rareas" onchange="populateAreas()" style="width: 100%;
                padding: 12px; border: 1px solid #ccc;">
        <option value="">Select a City</option>
    </select>
                </div>
                </div>

                <div class="col-md-12">
                <input type="text" name="saddress" required placeholder="Sender Address" style="width: 100%;
                padding: 12px; border: 1px solid #ccc;">
                </div>

                <div class="col-md-12">
                <input type="text" name="raddress" required placeholder="Receiver Address" style="width: 100%;
                padding: 12px; border: 1px solid #ccc;">
                </div>

                <div class="col-lg-12">
                  <h4>Add Info</h4>
                </div>
                <div class="col-md-6">
                <select id="" name="couriertype" style="width: 100%;
                padding: 12px; border: 1px solid #ccc;">
                <option value="" disabled selected  >Courier Type </option>
                <option value="Send">Send</option>
                <option value="Recieve">Recieve</option>
                 </select>
                </div>

                <div class="col-md-6">
                <input type="text" name="cweight" required placeholder="Enter courier weight (Kg)"  style="width: 100%;
                padding: 12px; border: 1px solid #ccc;">
                </div>

                <div class="col-md-6">
                <input type="text" name="cheight" required placeholder="Enter courier height (Ft)" style="width: 100%;
                padding: 12px; border: 1px solid #ccc;">
                </div>

                <input type="submit" name="btnregister" value="Register Now" class="form-btn">


              </div>
       
            </form>
            

            <?php
include("connection.php");
$prefix = 'COURIER';
$random = rand(1000, 9999);
$referenceNumber = $prefix . '-'  . $random;

if(isset($_POST['btnregister'])){
    $s_name = $_POST['sname'];
    $r_name = $_POST['rname'];
    $s_email = $_POST['semail'];
    $r_email = $_POST['remail'];
    $s_no = $_POST['scontact'];
    $r_no = $_POST['rcontact'];
    $s_area = $_POST['areas'];
    $r_area = $_POST['rareas'];
    $s_add = $_POST['saddress'];
    $r_add = $_POST['raddress'];
    $ctype = $_POST['couriertype'];
    $we = $_POST['cweight'];
    $he = $_POST['cheight'];
    $name = $_POST['uname'];

    $sql = "INSERT INTO tbl_courier(Order_No, sender_name, reciver_name, sender_email, reciver_email, sender_phone, reciver_phone, sender_area, reciver_area, sender_address, reciver_address, courier_type, weight, height,u_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssssssssssss", $referenceNumber, $s_name, $r_name, $s_email, $r_email, $s_no, $r_no, $s_area, $r_area, $s_add, $r_add, $ctype, $we, $he,$name);

    if($stmt->execute()){
      echo "<script> 
alert('Thanks for the Courier Request! Your CONSIGNMENT-NO:$referenceNumber')
</script>";
  }
    else{
        echo "Error placing Order: " . $stmt->error;
    }
    $stmt->close();
    $con->close();
}
?>


          </div><!-- End Quote Form -->

          <div id="popup" class="popup-container">
        <div class="popup-content">
            <p>Thanks for the courier request!</p>
            <a href="#popup" id="btn" onclick="document.getElementById('popup').style.display='none'">Ok</a>
        </div>
    </div>

        </div>

      </div>
    </section><!-- End Get a Quote Section -->

   

  </main><!-- End #main -->

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

</body>

        </html>

        <script>
        var pakistanCities = {
            "Karachi": ["Clifton", "Saddar", "Gulshan-e-Iqbal", "Defence", "Korangi", "Malir", "Gulistan-e-Johar", "North Nazimabad", "Liaquatabad", "Nazimabad", "Shah Faisal Town", "Gulzar-e-Hijri", "Landhi", "Surjani Town", "Orangi Town", "Saddar Town", "Lyari", "Gulshan-e-Maymar", "New Karachi", "Gulshan-e-Hadeed"],
            "Lahore": ["Gulberg", "Model Town", "Johar Town", "DHA", "Township", "Garden Town", "Iqbal Town", "Cantt", "Shadman", "Sabzazar", "Wapda Town", "Faisal Town", "Samanabad", "Askari", "Allama Iqbal Town", "Mughalpura", "Gulshan Ravi", "Ichhra", "Gulberg", "Raiwind"],
            "Islamabad": ["F-6", "F-7", "F-8", "G-5", "G-6", "G-7", "G-8", "G-9", "G-10", "G-11", "G-12", "G-13", "G-14", "G-15", "G-16", "G-17", "G-18", "G-19", "G-20", "G-21", "G-22"],
            "Rawalpindi": ["Saddar", "Rawat", "Peshawar Road", "Chaklala", "Westridge", "Gulraiz Housing Scheme", "Bahria Town", "Dhok Kala Khan", "Adiala Road", "Committee Chowk", "Satellite Town", "Lalazar", "New Lalazar", "Morgah", "Afshan Colony", "Pindi Cantt", "Shamsabad", "Kahuta", "Taxila", "Gujar Khan"],
            "Faisalabad": ["D Ground", "Jinnah Colony", "Gulberg", "Madina Town", "Iqbal Stadium", "Peoples Colony", "Ghulam Muhammad Abad", "Millat Town", "Samanabad", "Nishatabad", "Sargodha Road", "Gulistan Colony", "Chenab Gardens", "Gulfishan Colony", "Mansoorabad", "Batala Colony", "Kohinoor City", "Railway Road", "Jaranwala Road", "Jhang Road"],
            "Multan": ["Bosan Road", "Cantonment", "Shalimar Colony", "Gulgasht Colony", "Nawan Shehr", "Gulshan Market", "Dera Adda", "Shah Rukn-e-Alam Colony", "Sabzazar Colony", "Chungi No. 9", "Buch Executive Villas", "Model Town", "Chowk Kumharanwala", "Bosan Road", "Mumtazabad", "Mughal Pura", "M.D.A. Chowk", "Makhdumpur", "Khanewal Road", "New Multan"],
            "Peshawar": ["University Town", "Hayatabad", "Shami Road", "Cantt", "Saddar", "Warsak Road", "Charsadda Road", "Jamrud Road", "Dalazak Road", "Hashtnagri", "Pakha Ghulam", "Landi Arbab", "Khyber Bazaar", "Mall Road", "Urmar", "Shaheen Town", "Bana Mari", "Wazir Bagh", "Dalazak Road", "University of Peshawar"],
            "Quetta": ["Jinnah Town", "Zarghoon Road", "Sariab Road", "Cantt", "Chiltan Housing Scheme", "Hazara Town", "Arbab Town", "Airport Road", "Spini Road", "Joint Road", "Nawan Killi", "Toghi Road", "Gulistan Road", "Mehr Abad", "Samungli Road", "Prince Road", "Kasi Road", "Musa Colony", "Kakar Town", "Sarina Housing"],
            "Sialkot": ["Daska Road", "Cantt", "Satellite Town", "Wazirabad Road", "Pacca Garha", "Model Town", "Shahabpura", "Mughalpura", "Bhopalwala", "Aziz Bhatti Shaheed Road", "Nawaz Sharif Interchange", "Dhaarowal", "Adda Pasrur", "Gohad Pur", "Roras Road", "Purana Shujabad Road", "Kashmir Road", "Khiali", "Rangpura", "Badiana"],
            "Gujranwala": ["Cantt", "Satellite Town", "Model Town", "Khiali", "Wapda Town", "People's Colony", "Sheikhupura Road", "Trust Colony", "Gulshan-e-Ravi", "Alipur Chatha", "Shahpur", "Alipur", "Nowshera Virkan", "Gondlanwala", "Kunjah", "Nandi Pur", "Qila Didar Singh", "Qadirabad", "Rasoolpur", "Shadman Town"],
            "Abbottabad": ["Jinnahabad", "Mandian", "Kakul Road", "Supply", "Kala Pul", "Nawansher", "Ilyasi Masjid Road", "Link Road", "Kakul", "Mansehra Road", "Hazara Road", "PMA Kakul", "Nawan Shehr", "Havelian", "Mirpur", "Sarban Chowk", "Bilal Town", "Sadar Bazar", "Dor Galli", "Makrai"],
            "Sargodha": ["University Road", "Cantt", "Shahpur City", "Bhera Road", "Satellite Town", "Sahiwal", "Bhalwal", "Liaquat Road", "Kirana Hills", "Farooqabad", "Wazirabad Road", "Mandi Shah Jehangir", "Sillanwali", "Khushab Road", "Jhang Road", "Qudratabad", "Nawaz Chowk", "Rabwah", "Shahpur Sadar", "Rukanpur"],
            "Bahawalpur": ["Model Town A", "Model Town B", "Cantt", "Shadman Colony", "Farid Gate", "Mumtazabad", "Ahmedpur Road", "Hasilpur Road", "Yazman Road", "Circular Road", "Mall Road", "Zikriya Town", "Shahbazpur Road", "Jhangi Wala Road", "Bhutta Chowk", "Noor Mehal Road", "Dring Stadium Road", "Dera Nawab Sahib", "New Ghalla Mandi Road", "Bukhari Colony"],
            "Sukkur": ["Barrage Colony", "Minara Road", "Old Sukkur", "Military Road", "Shikarpur Road", "Station Road", "Jacobabad", "Rohri", "Pano Aqil", "Saleh Pat", "Saddar", "Airport Road", "Sukkur Bypass", "Guddu Barrage", "Shalimar Link Road", "New Pind", "Gambat", "Khudaabad", "Salehpat", "Kandhkot"],
            "Jhang": ["Civil Lines", "Allama Iqbal Colony", "Shah Jewana Road", "Satellite Town", "Abdali Road", "Bhowana", "Ahmed Pur Sial", "Ahmed Pur Road", "Shorkot Road", "Gojra Road", "Chiniot Road", "Railway Road", "Jhang Sadar", "Athara Hazari", "Chund Bharwana", "Shah Jiwana", "Mochi Wala Road", "Dijkot Road", "Chak Janobi", "Hakimwala"],
            "Sheikhupura": ["Faisalabad Road", "Lahore Road", "Safdarabad Road", "Muridke Road", "Batti Chowk", "Jandiala Road", "Sargodha Road", "Hiran Minar Road", "Narang Mandi", "Nankana Road", "Farooqabad Road", "Kot Abdul Malik Road", "Bhikhi Road", "Warburton Road", "Nizamabad Road", "Sharaqpur Road", "Safdarabad", "Muridke", "Sharaqpur", "Ferozewala"],
            "Gujrat": ["Model Town", "Satellite Town", "Kacheri Road", "GT Road", "Sheikhupura Road", "Hafiz Hayat", "Bhimber Road", "Makhdumpur", "Ghazanfarabad", "Chah Sultan", "Dinga Road", "Railway Road", "Gujrat Sargodha Road", "Jalalpur Jattan Road", "Ahmed Nagar", "Rahwali", "Kharian Cantt", "Dinga", "Bhun", "Kharian"],
            "Larkana": ["Bilawal Road", "Ratodero Road", "Ratodero", "Larkana Road", "Kambar", "Naudero", "Bakrani", "Miro Khan", "Dokri", "Kamber Ali Khan", "Rato Dero", "Bakrani", "Ratodero", "Nawabshah Road", "Shikarpur Road", "Ratodero Bypass", "Naudero Road", "Larkana Bypass", "Ratodero Bypass", "Naudero Road"],
        };

        function populateCities() {
            var select = document.getElementById('cities');

            select.innerHTML = '';

            var defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.text = 'Sender Form';
            select.appendChild(defaultOption);

            for (var city in pakistanCities) {
                var option = document.createElement('option');
                option.value = city;
                option.text = city;
                select.appendChild(option);
            }

            // Trigger the change event to populate areas for the default selected city
            select.dispatchEvent(new Event('change'));
        }

        populateCities();
    </script>

<!-- to  -->
<script>
        var pakistanCities = {
            "Karachi": ["Clifton", "Saddar", "Gulshan-e-Iqbal", "Defence", "Korangi", "Malir", "Gulistan-e-Johar", "North Nazimabad", "Liaquatabad", "Nazimabad", "Shah Faisal Town", "Gulzar-e-Hijri", "Landhi", "Surjani Town", "Orangi Town", "Saddar Town", "Lyari", "Gulshan-e-Maymar", "New Karachi", "Gulshan-e-Hadeed"],
            "Lahore": ["Gulberg", "Model Town", "Johar Town", "DHA", "Township", "Garden Town", "Iqbal Town", "Cantt", "Shadman", "Sabzazar", "Wapda Town", "Faisal Town", "Samanabad", "Askari", "Allama Iqbal Town", "Mughalpura", "Gulshan Ravi", "Ichhra", "Gulberg", "Raiwind"],
            "Islamabad": ["F-6", "F-7", "F-8", "G-5", "G-6", "G-7", "G-8", "G-9", "G-10", "G-11", "G-12", "G-13", "G-14", "G-15", "G-16", "G-17", "G-18", "G-19", "G-20", "G-21", "G-22"],
            "Rawalpindi": ["Saddar", "Rawat", "Peshawar Road", "Chaklala", "Westridge", "Gulraiz Housing Scheme", "Bahria Town", "Dhok Kala Khan", "Adiala Road", "Committee Chowk", "Satellite Town", "Lalazar", "New Lalazar", "Morgah", "Afshan Colony", "Pindi Cantt", "Shamsabad", "Kahuta", "Taxila", "Gujar Khan"],
            "Faisalabad": ["D Ground", "Jinnah Colony", "Gulberg", "Madina Town", "Iqbal Stadium", "Peoples Colony", "Ghulam Muhammad Abad", "Millat Town", "Samanabad", "Nishatabad", "Sargodha Road", "Gulistan Colony", "Chenab Gardens", "Gulfishan Colony", "Mansoorabad", "Batala Colony", "Kohinoor City", "Railway Road", "Jaranwala Road", "Jhang Road"],
            "Multan": ["Bosan Road", "Cantonment", "Shalimar Colony", "Gulgasht Colony", "Nawan Shehr", "Gulshan Market", "Dera Adda", "Shah Rukn-e-Alam Colony", "Sabzazar Colony", "Chungi No. 9", "Buch Executive Villas", "Model Town", "Chowk Kumharanwala", "Bosan Road", "Mumtazabad", "Mughal Pura", "M.D.A. Chowk", "Makhdumpur", "Khanewal Road", "New Multan"],
            "Peshawar": ["University Town", "Hayatabad", "Shami Road", "Cantt", "Saddar", "Warsak Road", "Charsadda Road", "Jamrud Road", "Dalazak Road", "Hashtnagri", "Pakha Ghulam", "Landi Arbab", "Khyber Bazaar", "Mall Road", "Urmar", "Shaheen Town", "Bana Mari", "Wazir Bagh", "Dalazak Road", "University of Peshawar"],
            "Quetta": ["Jinnah Town", "Zarghoon Road", "Sariab Road", "Cantt", "Chiltan Housing Scheme", "Hazara Town", "Arbab Town", "Airport Road", "Spini Road", "Joint Road", "Nawan Killi", "Toghi Road", "Gulistan Road", "Mehr Abad", "Samungli Road", "Prince Road", "Kasi Road", "Musa Colony", "Kakar Town", "Sarina Housing"],
            "Sialkot": ["Daska Road", "Cantt", "Satellite Town", "Wazirabad Road", "Pacca Garha", "Model Town", "Shahabpura", "Mughalpura", "Bhopalwala", "Aziz Bhatti Shaheed Road", "Nawaz Sharif Interchange", "Dhaarowal", "Adda Pasrur", "Gohad Pur", "Roras Road", "Purana Shujabad Road", "Kashmir Road", "Khiali", "Rangpura", "Badiana"],
            "Gujranwala": ["Cantt", "Satellite Town", "Model Town", "Khiali", "Wapda Town", "People's Colony", "Sheikhupura Road", "Trust Colony", "Gulshan-e-Ravi", "Alipur Chatha", "Shahpur", "Alipur", "Nowshera Virkan", "Gondlanwala", "Kunjah", "Nandi Pur", "Qila Didar Singh", "Qadirabad", "Rasoolpur", "Shadman Town"],
            "Abbottabad": ["Jinnahabad", "Mandian", "Kakul Road", "Supply", "Kala Pul", "Nawansher", "Ilyasi Masjid Road", "Link Road", "Kakul", "Mansehra Road", "Hazara Road", "PMA Kakul", "Nawan Shehr", "Havelian", "Mirpur", "Sarban Chowk", "Bilal Town", "Sadar Bazar", "Dor Galli", "Makrai"],
            "Sargodha": ["University Road", "Cantt", "Shahpur City", "Bhera Road", "Satellite Town", "Sahiwal", "Bhalwal", "Liaquat Road", "Kirana Hills", "Farooqabad", "Wazirabad Road", "Mandi Shah Jehangir", "Sillanwali", "Khushab Road", "Jhang Road", "Qudratabad", "Nawaz Chowk", "Rabwah", "Shahpur Sadar", "Rukanpur"],
            "Bahawalpur": ["Model Town A", "Model Town B", "Cantt", "Shadman Colony", "Farid Gate", "Mumtazabad", "Ahmedpur Road", "Hasilpur Road", "Yazman Road", "Circular Road", "Mall Road", "Zikriya Town", "Shahbazpur Road", "Jhangi Wala Road", "Bhutta Chowk", "Noor Mehal Road", "Dring Stadium Road", "Dera Nawab Sahib", "New Ghalla Mandi Road", "Bukhari Colony"],
            "Sukkur": ["Barrage Colony", "Minara Road", "Old Sukkur", "Military Road", "Shikarpur Road", "Station Road", "Jacobabad", "Rohri", "Pano Aqil", "Saleh Pat", "Saddar", "Airport Road", "Sukkur Bypass", "Guddu Barrage", "Shalimar Link Road", "New Pind", "Gambat", "Khudaabad", "Salehpat", "Kandhkot"],
            "Jhang": ["Civil Lines", "Allama Iqbal Colony", "Shah Jewana Road", "Satellite Town", "Abdali Road", "Bhowana", "Ahmed Pur Sial", "Ahmed Pur Road", "Shorkot Road", "Gojra Road", "Chiniot Road", "Railway Road", "Jhang Sadar", "Athara Hazari", "Chund Bharwana", "Shah Jiwana", "Mochi Wala Road", "Dijkot Road", "Chak Janobi", "Hakimwala"],
            "Sheikhupura": ["Faisalabad Road", "Lahore Road", "Safdarabad Road", "Muridke Road", "Batti Chowk", "Jandiala Road", "Sargodha Road", "Hiran Minar Road", "Narang Mandi", "Nankana Road", "Farooqabad Road", "Kot Abdul Malik Road", "Bhikhi Road", "Warburton Road", "Nizamabad Road", "Sharaqpur Road", "Safdarabad", "Muridke", "Sharaqpur", "Ferozewala"],
            "Gujrat": ["Model Town", "Satellite Town", "Kacheri Road", "GT Road", "Sheikhupura Road", "Hafiz Hayat", "Bhimber Road", "Makhdumpur", "Ghazanfarabad", "Chah Sultan", "Dinga Road", "Railway Road", "Gujrat Sargodha Road", "Jalalpur Jattan Road", "Ahmed Nagar", "Rahwali", "Kharian Cantt", "Dinga", "Bhun", "Kharian"],
            "Larkana": ["Bilawal Road", "Ratodero Road", "Ratodero", "Larkana Road", "Kambar", "Naudero", "Bakrani", "Miro Khan", "Dokri", "Kamber Ali Khan", "Rato Dero", "Bakrani", "Ratodero", "Nawabshah Road", "Shikarpur Road", "Ratodero Bypass", "Naudero Road", "Larkana Bypass", "Ratodero Bypass", "Naudero Road"],
        };

        function populateCities() {
            var select = document.getElementById('city');

            select.innerHTML = '';

            var defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.text = 'Reciever To';
            select.appendChild(defaultOption);

            for (var city in pakistanCities) {
                var option = document.createElement('option');
                option.value = city;
                option.text = city;
                select.appendChild(option);
            }

            // Trigger the change event to populate areas for the default selected city
            select.dispatchEvent(new Event('change'));
        }



        populateCities();
    </script>