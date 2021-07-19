<?php
include('include/header.php');
?>

<div class="page has-sidebar-left  height-full">
<header class="blue accent-3 relative nav-sticky">
    <div class="container-fluid text-white">
      <div class="row p-t-b-10 ">
        <div class="col">
       <h4><i class="icon-th-list"></i>Categories</h4>
       </div>
      </div>
        <div class="row justify-content-between">
          <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
          <li><a class="nav-link" id="v-pills-all-tab" href="category.php"><i class="icon icon-list-alt"></i> Categories</a></li>
          <li class="float-right"><a class="nav-link active"  href="parent_cat.php" ><i class="icon icon-user-plus"></i> Add Parent Category</a></li>
          </ul>
       </div>
    </div>
</header>
<div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                  <div class="card-body">
                     <h2 class="card-title" style="text-decoration: underline;">Parent Category</h2>
                     <form action="javascript:;" onsubmit="new2()" method="POST">
                                <div class="form-row">
                                  <div class="col-md-4">
                                        <div class="form-group m-0">
                                            <label for="name" class="col-form-label s-6">Category Name</label>
                                            <input id="cat_name" placeholder="Enter category name" class="form-control r-0 light s-6 " type="text" required="">
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                            <div class="form-group m-0">
                                            <label for="name" class="col-form-label s-6">Category Type</label>
                                           <select class="form-control" id="cat_type">
                                            <option value="00">Select Category Type</option>
                                            <option value="P" selected="">Primary</option>
                                          </select>
                                        </div> 
                                        </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                        <div class="col-md-4">
                                        <input hidden name="file" id="img" />
                                        <div class="dropzone dropzone-file-area pt-4 pb-4">
                                            <div class="dz-default dz-message">
                                                <span>Drop an image.</span>
                                                <div>(You can also click to open file browser.)</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save</button>
                                <button class="btn btn-default" type="reset">Clear</button>
                               </div>
                              </form>
                            </div>
                            </div>                            
                            
                        </div>
                      </div>
                    </div>

<script type="text/javascript">

function new2(){

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
        window.location.href="category.php";
      }
    });
  }
</script>
    <?php
    include('include/footer.php');
    ?>