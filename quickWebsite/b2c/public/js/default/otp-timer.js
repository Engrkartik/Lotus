(function ($) {
    'use strict';
    
    // :: OTP Code resend Timer
    var count = 60;
    var counter = setInterval(timer, 1000);
    //1000 will run it every 1 second

    function timer() {
        count = count - 1;
        if (count <= 0) {
            clearInterval(counter);
            document.getElementById("resendOTP").innerHTML = '<br> <br> <button class="btn btn-success btn-lg w-100" href="login" >Resend OTP</button>';
        } else {
            document.getElementById("resendOTP").innerHTML = '<br> Wait ' + count + ' secs';
        }
    }

})(jQuery);