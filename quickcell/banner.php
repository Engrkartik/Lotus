
<?php
include('include/header.php');
$today=date('Y-m-d');
$tomo = date("Y-m-d", time() + 86400);
?>
 <style type="text/css">

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

    .dropdown-content a:hover {background-color: #ddd;}

.dropdown:click .dropdown-content {display: block;}

.dropdown:click .dropbtn {background-color: blue;}
/*/////////////////////////////loader/////////////////////////////////////////////////////*/
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(images/Preloader_2.gif) center no-repeat #fff;
}
/*/////////////////////////////End loader/////////////////////////////////////////////////////*/
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<div class="se-pre-con"></div>

<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="dropdown">
                  <button type="button" class="btn btn-primary" data-toggle="dropdown" value="PENDING">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- <i class="fa fa-arrow-down"></i> --></button>
                  <div id="Demo" class="dropdown-menu">
                    <a href="" class="dropdown-item" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false">Top Banner</a><br>
                    <a href="" class="dropdown-item" data-toggle="modal" data-target="#exampleModal1" data-backdrop="static" data-keyboard="false">Video Banner</a><br>
                    <a href="" class="dropdown-item" data-toggle="modal" data-target="#exampleModal2" data-backdrop="static" data-keyboard="false">Discount Banner</a>

                  </div>
                </div>
               <!--  <h3 class="card-title"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false">Upload Banner</button></h3> -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Top Banner</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                        <div class="col-md-12">
                          <!-- <div class="row">
                          <div class="col-md-12">
                            <label>Banner Type</label>
                            <select class="form-control" id="slider">
                              <option value="Top Banner">Top Slider</option>
                              <option value="Middle Banner">Middle Slider</option>
                              <option value="Last Banner">Last Slider</option>
                            </select>
                          </div>
                        </div> -->
                        <div class="row">
                          <div class="col-md-12">
                            <label>Upload Image</label>
                            <input type="file" id="files" class="form-control" value="Upload" multiple="" >
                          </div>  
                          </div>
                          <!-- <div class="row">
                          <div class="col-md-12">
                            <label>Banner Priority</label>
                            <select class="form-control" id="priority">
                              <option value="1">High</option>
                              <option value="2">Midium</option>
                              <option value="3">Low</option>
                            </select>
                          </div>
                        </div> -->
                        </div>
                        </div>
                      <!-- </div> -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" onclick="save_data()">Upload</button>

                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
<!-- //////////////////////////////////////////////////video banner/////////////////////////////////////////////// -->
          <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Video Banner</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                        <div class="col-md-12">
                          <div class="row" id="vid">
                            <!-- <div class="col-md-12">
                              <label>Upload Video</label>
                              <input type="file" id="file" class="form-control" value="Upload" multiple="" >
                            </div>  -->
                          <?php 
                            $get=mysqli_query($con,"SELECT * FROM `banner` WHERE title = 'Video Banner' and status = 'A' and aid='$admin_id'");
                            $fetch_count = mysqli_num_rows($get);

                              if($fetch_count<1){
                          ?>
                            <div id="container">
                              <button class="btn btn-warning"><span id="pickfiles">Upload files</span></button>
                              </div>
                              <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div> 
                          <?php } else{ ?>

                              <h4 style="color: red">Please delete the existing video banner</h4>

                          <?php } ?>  
                          </div>
                        </div>
                      </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-primary" onclick="save_video()">Upload</button> -->
                          <a href="banner.php"><button type="button" class="btn btn-primary">Save</button></a>

                          <a href="banner.php"><button type="button" class="btn btn-secondary">Close</button></a>
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        </div>
                      </div>
                    </div>
                  </div>
<!-- ///////////////////////////////////////////// end video banner//////////////////////////////////////////// -->
<!-- /////////////////////////////Discount banner//////////////////////////////////////////// -->
          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Discount Banner</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card-body table-responsive p-0">
                              <table class="table table-hover text-nowrap" id="myTable">
                                <thead>
                                  <tr>
                                    <th>S.NO</th>
                                    <th>Discount Name</th>
                                    <th>Select</th>
                                  </tr>
                                </thead>
                                <?php
                                  $chk1=mysqli_query($con,"SELECT discount.id,discount.disc_id,COUNT(*) as item,discount.pid,discount.disc_type,discount.disc_name,discount.disc,DATE_FORMAT(discount.from_dt,'%d-%m-%Y') as from_dt,DATE_FORMAT(discount.to_dt,'%d-%m-%Y') as to_dt,discount.status FROM `discount` where discount.aid='1' AND ('$today' BETWEEN from_dt AND to_dt OR from_dt = '$tomo') and ap != 'A' group by disc_id order by id desc");
                                 while ($row1=mysqli_fetch_assoc($chk1)) {
                                  $snn++;
                                  $logo=$row1["disc_name"];
                                  $disc_id=$row1['disc_id'];
                                ?>
                                <tbody>
                                  <td><?php echo $snn;?></td>
                                  <td><?php echo $logo;?></td>
                                  <td><input type="checkbox" id="check" name="chk[]" value="<?=$disc_id?>"></td>                           
                                </tbody>
                                <?php } ?>
                              </table>
                            </div>
                          </div>
                        </div>
                        <br>
                        <!-- <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-danger form-control" onclick="check()">Add</button>
                          </div>
                        </div><br> -->
                        <div class="col-md-12">
                          <div class="row" id="vid">
                            <div class="col-md-12">
                              <label>Upload Image</label>
                              <input type="file" id="file1" class="form-control" value="Upload" multiple="" >
                            </div>  
                          </div>
                        </div>
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" onclick="save_disc()">Upload</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
<!-- ///////////////////////////// end discount banner//////////////////////////////////////////// -->
                <div class="card-tools">
                  <!-- <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" id="myInput" onkeyup="myFunction()" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div> -->
                </div>
              </div>
              <div style="display: none" class="alert alert-success" id="success-alert">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  <strong>Deleted Successfully! </strong>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="myTable">
                  <thead>
                    <tr>
                                        <th>S.NO</th>
                                        <th>BANNER NAME</th>
                                        <th>BANNER IMAGE</th>
                                        <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                                    <?php
                                        $query=mysqli_query($con,"SELECT * FROM `banner` WHERE aid='$admin_id' and status!='R' order by remark desc");
                                        while ($row=mysqli_fetch_assoc($query)) {
                                        $ve = $row['img'];
                                        $url = "http://34.72.9.224/quickcell/";
                                        $fi = $url.$ve;    
                                        $sn++;
                                    ?>
                                    <tr>
                                        <td><?php echo $sn;?></td>
                                        <td><?php echo $row['title'];?></td>
                                        <?php if($row['title']=="Video Banner"){ ?>
                                        <td><iframe src="<?=$fi?>" allowfullscreen frameborder="0" height="150" width="300"></iframe></td>
                                        <?php } else { ?>  
                                        <td><img src="<?=$row['img']?>" style="width:300px;height:150px;" ></td>
                                        <?php } ?>
                                        <?php	if($row['title']=="Discount Banner"){  ?>
                                        	<td><button onclick="del1(<?=$row['id']?>)"><i class="fa fa-trash" style="cursor: pointer;"></i></button>&nbsp;&nbsp;
                                        	<a href="edit_banner_discount.php"><button><i class="fa fa-edit"></i></button></a></td>
                                        <?php } else{ ?>
                                        	<td><button onclick="del(<?=$row['id']?>)"><i class="fa fa-trash" style="cursor: pointer;"></i></button>
                                        <?php } ?>		
                                    </tr>
                                    <?php }?>
                                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
<script type="text/javascript">
	function del1(td){
  // alert(td);
  var check = confirm("Want to delete?");
  var id = td;
  var type = "delete1";

  if(check){
  $.ajax({
    url:'save_banner.php',
    type:'POST',
    data:{'id':id,'type':type},
    success:function(res){
      // alert(res);
      if(res==0){
        // alert("success");
        window.location.href = "http://34.72.9.224/quickcell/banner.php";
        $("#success-alert").show(10000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        });
      }
      else{
        tempAlert("error",3000);
      }
    }
  });
}
}
          // function show_vid(){
          //   var selectBox = document.getElementById("slider1");
          //   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
          //   document.getElementById('img').style.display="block";

          // }
function save_disc(){
  var form_data = new FormData();
     var totalfiles = document.getElementById('file1').files.length;
       for (var index = 0; index < totalfiles; index++) {
          form_data.append("file1[]", document.getElementById('file1').files[index]);
        }
        // alert(totalfiles);
        if(totalfiles>0)
        {
        $.ajax({
            url: 'update_banner.php',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
             async: true,
            success: function(response){
              alert(response);
              check(response);
                }
        });
      }
    else{
      alert('Select Image');
}
}

var chk = [];
function check(loc){
  // var check = document.getElementById('check').value;
chk=[];
var checkboxes = document.getElementsByName('chk[]');
// var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        chk.push(checkboxes[i].value);
    }
}
  // alert(chk);
var slider="Discount Banner";
var type="att";
var admin='<?=$admin_id?>';
// var cat_id=document.getElementById('category').value;
$.ajax({
type:'POST',
url:'update_banner.php',
data:{'chk':JSON.stringify(chk),'type':type,'admin':admin,'slider':slider,'loc':loc},
success:function(res)
{
  if(res==1){
    alert("success");
    window.location.href="banner.php";
  }
}
});

}
        //clickable
function del(td){
  // alert(td);
  var check = confirm("Want to delete?");
  var id = td;
  var type = "delete";

  if(check){
  $.ajax({
    url:'save_banner.php',
    type:'POST',
    data:{'id':id,'type':type},
    success:function(res){
      // alert(res);
      if(res==0){
        // alert("success");
        window.location.href = "http://34.72.9.224/quickcell/banner.php";
        $("#success-alert").show(10000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        });
      }
      else{
        tempAlert("error",3000);
      }
    }
  });
}
}
// function store_img() {
//    // Read selected files
//    var totalfiles = document.getElementById('file').files.length;
//    for (var index = 0; index < totalfiles; index++) {
//       form_data.append("files[]", document.getElementById('file').files[index]);
//    }
// }
function save_video(){
    // var src=[];
     // var form_data = new FormData();
     // var totalfiles = document.getElementById('file').files.length;
     //   for (var index = 0; index < totalfiles; index++) {
     //      form_data.append("file[]", document.getElementById('file').files[index]);
     //    }
        // alert(totalfiles);
    //     if(totalfiles>0)
    //     {
    //     $.ajax({
    //         url: 'video.php',
    //         type: 'post',
    //         data: form_data,
    //         contentType: false,
    //         processData: false,
    //          async: true,
    //         success: function(response){

    //         if(response==0){
    //         	alert("To add a new Video Banner Please delete old one");
    //         	window.location.href="banner.php";
    //         }
    //         else{
    //         	final_data1(response);
    //         	// alert("rr");
    //         	window.location.href="banner.php";
    //        	}
    //        }
    //     });
    //   }
    // else{
    //   alert('Select Video');
    // }
  }
  function final_data1(loc) {
        var admin='<?=$admin_id?>';
        var slider="Video Banner";
        // var priority=document.getElementById('priority').value;
        var type="update";
        $.ajax({
          type:'POST',
          url:'video.php',
          data:{'admin':admin,'slider':slider,'type':type,'loc':loc},
          success:function(res) {
            alert(res);
            window.location.href="banner.php";
          }
        });
      }
 function save_data(){
    // var src=[];
    // alert("Hello");
     var form_data = new FormData();
     var totalfiles = document.getElementById('files').files.length;
       for (var index = 0; index < totalfiles; index++) {
          form_data.append("files[]", document.getElementById('files').files[index]);
        }
        // alert(totalfiles);
        if(totalfiles>0)
        {
        $.ajax({
            url: 'save_banner.php',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
             async: true,
            success: function(response){
              final_data(response);
                }
        });
      }
    else{
      alert('Select Image');
    }
    }
      function final_data(loc) {
        var admin='<?=$admin_id?>';
        // var slider=document.getElementById('slider').value;
        var slider="Top Banner";
        // var priority=document.getElementById('priority').value;
        var type="update";
        $.ajax({
          type:'POST',
          url:'save_banner.php',
          data:{'admin':admin,'slider':slider,'type':type,'loc':loc},
          success:function(res) {
            alert(res);
            window.location.href="banner.php";
          }
        });
      }
  ////////////////////////loader///////////////////////////////////////////////////
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
  /////////////////////////////////end loader////////////////////////////////////
        </script>

    <script src="plupload/js/plupload.full.min.js"></script>
    <script>
      window.addEventListener("load", function () {
        var path = "plupload/js/";
        var uploader = new plupload.Uploader({
          browse_button: 'pickfiles',
          container: document.getElementById('container'),
          url: 'upload11.php',
          chunk_size: '1000kb',
          max_retries: 2,
          filters: {
            max_file_size: '50mb',
            mime_types: [{title: "Video", extensions: "mp4,3gp,mov"}]
          },
          init: {
            PostInit: function () {
              document.getElementById('filelist').innerHTML = '';
            },
            FilesAdded: function (up, files) {
              plupload.each(files, function (file) {
                document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
              });
              uploader.start();
            },
            UploadProgress: function (up, file) {
              document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            },
            Error: function (up, err) {
              // DO YOUR ERROR HANDLING!
              console.log(err);
            }
          }
        });
        uploader.init();
      });
    </script>
<?php
include('include/footer.php');
?>