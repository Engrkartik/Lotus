<?php
include('includes/header.php');
?>

<div class="page-content-wrapper">
      <!-- Live Chat Intro-->
      <div class="live-chat-intro mb-3">
        <p>Start a conversation</p><img src="img/bg-img/9.jpg" alt="">
        <div class="status online">We're online</div>
        <!-- Use this code for "Offline" Status-->
        <!-- .status.offline We’ll be back soon-->
      </div>
      <!-- Support Wrapper-->
      <div class="support-wrapper py-3">
        <div class="container">
          <!-- Live Chat Wrapper-->
          <div class="live-chat-wrapper">
            <!-- Agent Message Content-->
            <div class="agent-message-content d-flex align-items-center">
              <!-- Agent Thumbnail-->
              <div class="agent-thumbnail me-2"><img src="img/bg-img/9.jpg" alt=""></div>
              <!-- Agent Message Text-->
              <div class="agent-message-text">
                <p>Hi there! You can start asking your question below. I am ready to help.</p><span>12:00</span>
              </div>
            </div>
            <!-- User Message Content-->
            <div class="user-message-content">
              <!-- User Message Text-->
              <div class="user-message-text">
                <p>Hi there!</p><span>12:09</span>
              </div>
            </div>
            <!-- Agent Message Content-->
            <div class="agent-message-content d-flex align-items-center">
              <!-- Agent Thumbnail-->
              <div class="agent-thumbnail me-2"><img src="img/bg-img/9.jpg" alt=""></div>
              <!-- Agent Message Text-->
              <div class="agent-message-text">
                <p>How can I help you with?</p><span>12:13</span>
              </div>
            </div>
            <!-- User Message Content-->
            <div class="user-message-content">
              <!-- User Message Text-->
              <div class="user-message-text">
                <p>I like your template. How can I buy this?</p><span>12:18</span>
              </div>
            </div>
            <!-- Agent Message Content-->
            <div class="agent-message-content d-flex align-items-center">
              <!-- Agent Thumbnail-->
              <div class="agent-thumbnail me-2"><img src="img/bg-img/9.jpg" alt=""></div>
              <!-- Agent Message Text-->
              <div class="agent-message-text">
                <p>- - -</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <!-- Type Message Form-->
    <div class="type-text-form">
      <form action="#">
        <div class="form-group file-upload mb-0">
          <input type="file"><span class="lni lni-cloud-upload"></span>
        </div>
        <textarea class="form-control" name="message" cols="30" rows="10" placeholder="Type your message ..."></textarea>
        <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
      </form>
    </div>
<?php
include('includes/footer.php');
?>