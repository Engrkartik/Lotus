 @extends('layouts.default')
@section('content')


    <div class="page-content-wrapper">
      <div class="container">
        <!-- Privacy Policy-->
        <div class="privacy-policy-wrapper py-3">
          
          <h6> FAQ</h6>
          <br>
          <button class="accordion">Where I can find my order reports?</button>
          <div class="panel">
            <p>As is true of most websites, we gather certain information (such as mobile provider, operating system, etc.) automatically and store it in log files. We use this information, which does not identify individual users, to analyze trends, to administer the website, to track users movements around the website and to gather demographic information about our user base as a whole. We may link some of this automatically-collected data to certain Personally Identifiable Information.</p>
          </div>
         <button class="accordion">Where I can find my customers?</button>
          <div class="panel">
            <p>As is true of most websites, we gather certain information (such as mobile provider, operating system, etc.) automatically and store it in log files. We use this information, which does not identify individual users, to analyze trends, to administer the website, to track users movements around the website and to gather demographic information about our user base as a whole. We may link some of this automatically-collected data to certain Personally Identifiable Information.</p>
          </div>
          <button class="accordion">How to integrate a payment gateway?</button>
          <div class="panel">
            <p>As is true of most websites, we gather certain information (such as mobile provider, operating system, etc.) automatically and store it in log files. We use this information, which does not identify individual users, to analyze trends, to administer the website, to track users movements around the website and to gather demographic information about our user base as a whole. We may link some of this automatically-collected data to certain Personally Identifiable Information.</p>
          </div>
          <button class="accordion">I am not able to check refunds.</button>
          <div class="panel">
            <p>As is true of most websites, we gather certain information (such as mobile provider, operating system, etc.) automatically and store it in log files. We use this information, which does not identify individual users, to analyze trends, to administer the website, to track users movements around the website and to gather demographic information about our user base as a whole. We may link some of this automatically-collected data to certain Personally Identifiable Information.</p>
          </div>
          <br>
          <p>Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.Some dummy text. or rules.</p>
        </div>
      </div>
    </div>

    <script type="text/javascript">
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
    </script>

    @stop