<strong>Copyright &copy; 2020-2021 <a href="http://ssssybertech.com/">SSS Syber Tech Pvt. Ltd</a>.</strong>
All rights reserved.
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- <script type="text/javascript" src=" {{ asset('public/jsnew/jquery-3.2.1.min.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('public/jsnew/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/jsnew/bootstrap.min.js') }} "></script>
<script type="text/javascript" src="{{ asset('public/jsnew/jquery.slimscroll.js') }} "></script>
<script type="text/javascript" defer src="{{ asset('public/jsnew/select-boxes.min.js') }} "></script>
<!-- <script type="text/javascript" src="{{ asset('public/jsnew/select2.min.js') }} "></script> -->
<!-- <script type="text/javascript" src="{{ asset('public/jsnew/multiselect.js') }} "></script> -->
<script type="text/javascript" src="{{ asset('public/jsnew/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/jsnew/bootstrap-datetimepicker.min.js') }}"></script>
<!-- DATATABLES -->
<script type="text/javascript" src="{{ asset('public/jsnew/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/jsnew/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/jsnew/fullcalendar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/jsnew/jquery.fullcalendar.js') }}"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js" type="text/javascript">
</script>
<script type="text/javascript" src="{{ asset('public/jsnew/app.js') }} "></script>
<script type="text/javascript" src="{{ asset('public/jsnew/custom.js') }} "></script>


<!-- new js for select 2-->



<script>
  // $.datetimepicker.setDefaults({
  //   format: "HH:mm",
  //   icons: {
  //     up: "fa fa-chevron-up",
  //     down: "fa fa-chevron-down"
  //   }

  // })
  //   $(document).ready(function(){
  //   $("#time").inputmask("h:s",{ "placeholder": "hh/mm" });
  // });​
  $(function () {
    $(".timepicker").datetimepicker({
      format: 'HH:mm',
      viewDate: false,
      stepping: 15,
      forceMinuteStep: true,
      icons: {
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down"
      }
    });
  });

  // });
  // $(document).on('click', '.timepicker', function () {
  //               // var refNum = aId[1];
  //   $(".timepicker").each(function () {


  //   });
  // });

  // });
</script>
<!-- FOR SELECT ALL -->

<script type="text/javascript">

  // $("select").on("click", function () {
  //   if ($(this).find(":selected").text() == "Select All") {
  //     if ($(this).attr("data-select") == "false")
  //       $(this).attr("data-select", "true").find("option").prop("selected", true);
  //     else
  //       $(this).attr("data-select", "false").find("option").prop("selected", false);
  //   }
  // });
</script>

<!-- FOR MULTIPLE SELECTION -->
<script type="text/javascript">
  jQuery(document).ready(function ($) {

    // Multiple Select
    $(".branches").select2({
      placeholder: "Select Branch"
    });
    $(".addbranches").select2({
      placeholder: "Select Branch"
    });
    $(".editbranches").select2({
      placeholder: "Select Branch"
    });
    $(".departments").select2({
      placeholder: "Select Department"
    });
    $(".designation").select2({
      placeholder: "Select Designation"
    });
    $(".employee").select2({
      placeholder: "Select Employee"
    });
    $(".modules").select2({
      placeholder: "Select Modules"
    });



  });
</script>

<!-- <div class="footer">
    <footer class="main-footer">
        
    </footer> -->
<script type="text/javascript">
  $(document).ready(function () {
    $(".alert").delay(5000).slideUp(300);
  });

  function change_st(id, table, val) {
    console.log(id + '*' + table + '*' + val);
    var url = '{{ route("change_status")}}';
    var token = "{{ csrf_token()}}";
    $.ajax({
      method: "post",
      url: url,
      data: {
        'table': table,
        'id': id,
        'val': val,
        '_token': token
      },
      dataType: 'json',
      success: function (response) {
        if (response.success == 'true') {
          alert(response.msg);
          console.log("success", response.msg);
          // window.location.href="employeelist";
        } else {
          alert(response.msg);
          console.log("failed", response.msg);

        }
      }
    });
  }
  //   $(document).ready(function(){
  //   $("#myInput").on("keyup", function() {
  //     var value = $(this).val().toLowerCase();
  //     $("#myTable tr").filter(function() {
  //       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  //     });
  //   });
  // });
  function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td");
      for (j = 0; j < td.length; j++) {
        console.log(td[j].textContent);
        if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
          found = true;
        }
      }
      if (found) {
        tr[i].style.display = "";
        found = false;
      } else {
        tr[i].style.display = "none";
      }
    }
  }
</script>
<script>
  $(document).ready(function () {
    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
      weekends: true
    });
  });
</script>

<script>
  $(document).ready(function () {
    if ($('#switch_sick').is(':checked')) {
            $('#cfblock').show(500);
            $('#carryforward').prop("disabled", false);
            $('#treatmentofleaves').prop("disabled", false);
            $('#m_cfinput').prop("disabled", false);
        } else {
            $('#cfblock').hide(500);
            $('#carryforward').prop("disabled", true);
            $('#treatmentofleaves').prop("disabled", true);
            $('#m_cfinput').prop("disabled", true);
            $('#cf_select').prop("disabled", true);
        }
  });
</script>

<!-- FOR NAVIGATION ACTIVE -->

<script>
  var selector = '.sidebar-menu ul li a ';
  var url = window.location.href;
  var target = url.split('/');
  $(selector).each(function () {
    if ($(this).find('a').attr('href') === ('/' + target[target.length - 1])) {
      // $(selector).removeClass('active');
      $(this).addClass('noti-dot');
      // $(this).removeClass('active').addClass('noti-dot');
    }
  });
</script>