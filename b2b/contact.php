<?php 
include('includes/header.php');
?>

 <div class="page-content-wrapper">
      <!-- Google Maps-->
      <div class="google-maps-wrap">
       <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d14009.574173744379!2d77.361556781982!3d28.61796501877484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d28.6057076!2d77.3668405!4m5!1s0x390cfbae7d01b6c3%3A0xbfe559d425caa53b!2ssss%20cybertech%20pvt%20ltd!3m2!1d28.6274044!2d77.3724847!5e0!3m2!1sen!2sin!4v1611577561311!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
      <div class="container">
        <div class="section-heading mt-3">
          <h5 class="mb-1">Contact Us</h5>
          <p class="mb-4">Write to us. We will reply to you as soon as possible. But yes, it can take up to 24 hours.</p>
        </div>
        <!-- Contact Form-->
        <div class="contact-form mt-3 pb-3">
          <form action="#" method="">
            <input class="form-control mb-3" id="username" type="text" placeholder="Your Name">
            <input class="form-control mb-3" id="email" type="email" placeholder="Enter email">
            <select class="mb-3 form-control form-select" id="topic" name="topic">
              <option value="">Buying &amp; Support</option>
              <option value="">Authors Help</option>
              <option value="">Buyer Help</option>
              <option value="">License</option>
            </select>
            <input class="form-control mb-3" id="username" type="text" placeholder="Include a relevant URL">
            <textarea class="form-control mb-3" id="message" name="" cols="30" rows="10" placeholder="Write something..."></textarea>
            <button class="btn btn-success btn-lg w-100">Send Now</button>
          </form>
        </div>
      </div>
    </div>

    <?php
    include('includes/footer.php');
    ?>