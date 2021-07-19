<?php 
include('includes/header.php');
?>
  
    <div class="page-content-wrapper">
      <div class="container">
        <div class="section-heading mt-3">
          <h5 class="mb-1">Rate Us</h5>
          <p class="mb-4">Write to us. We will reply to you as soon as possible. But yes, it can take up to 24 hours.</p>
        </div>
        <!-- Contact Form-->
        <div class="contact-form mt-3 pb-3">
          <form action="#" method="">
            <input class="form-control mb-3" id="firmname" type="text" placeholder="Firm Name">
            <input class="form-control mb-3" id="phone" type="tel" placeholder="Phone Number">
             <textarea class="form-control mb-3" id="message" name="" cols="30" rows="10" placeholder="Address" id="address"></textarea>
              <input class="form-control mb-3" id="dist" type="text" placeholder="District">
               <input class="form-control mb-3" id="state" type="text" placeholder="State">
              <!-- feedback rating-->
              <div class="ratings-submit-form bg-white py-3">
              <div class="stars mb-3">
                <input class="star-1" type="radio" name="star" id="star1">
                <label class="star-1" for="star1"></label>
                <input class="star-2" type="radio" name="star" id="star2">
                <label class="star-2" for="star2"></label>
                <input class="star-3" type="radio" name="star" id="star3">
                <label class="star-3" for="star3"></label>
                <input class="star-4" type="radio" name="star" id="star4">
                <label class="star-4" for="star4"></label>
                <input class="star-5" type="radio" name="star" id="star5">
                <label class="star-5" for="star5"></label><span></span>
              </div>  
	        </div>
	        <br>
           <textarea class="form-control mb-3" id="message" name="" cols="30" rows="10" placeholder="Write something about us..."></textarea>
            <button class="btn btn-success btn-lg w-100">Send Now</button>
          </form>
        </div>
      </div>
    </div>


    <?php
    include('includes/footer.php');
    ?>