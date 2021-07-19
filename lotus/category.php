<?php
include('include/header.php');
?>
 <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="javascript:;" onsubmit="new1()" method="POST">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Category Name</label><label style="color: red">*</label>
                        <input type="text" class="form-control" id="cat_name" placeholder="Enter ...">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Category Type</label><label style="color: red">*</label>
                        <select class="form-control" id="cat_type">
                          <option value="00">Select Category Type</option>
                          <option value="P" selected="">Primary</option>
                          <!-- <option value="A">Amount</option> -->
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <input type="file" id="img" class="form-control">
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <button class="btn btn-success" type="submit">Save</button>
                      <button class="btn btn-default" type="reset">Clear</button>

                    </div>
                  </div>
                  
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
              </div>
<script type="text/javascript">

 
function new1(){

        var fd = new FormData();
        var files = $('#img')[0].files[0];
        fd.append('file',files);
        // alert(fd);
        $.ajax({
            url: 'save_cat.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
             async: true,
            success: function(response){
              save_data(response);
                }
        });
      }


  function save_data(loc) {
    alert("Hello");
    var cat_name=document.getElementById('cat_name').value;
    var cat_type=document.getElementById('cat_type').value;
    var type="cat";
    var admin='<?=$admin_id?>';
    $.ajax({
      type:'POST',
      data:{'cat_name':cat_name,'cat_type':cat_type,'type':type,'loc':loc,'admin':admin},
      url:'save_cat.php',
      success:function(res) {
        alert(res);
        window.location.href="show_cat.php";
      }
    });
  }

</script>
          <?php
include ('include/footer.php');
          ?>