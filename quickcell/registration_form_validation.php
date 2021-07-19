<?php
include('include/header.php');
$query=mysqli_query($con,"SELECT * FROM `admin` WHERE id='$admin_id'");
$row=mysqli_fetch_assoc($query);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<style type="text/css">
  input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
   cursor: pointer;
}
.remove:hover {
  background: white;
  color: grey;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
/*vvvv*/
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
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button {  

   opacity: 1;

}
</style>
 <div id="load" class="se-pre-con"></div>

 <div class="col-md-12">
 
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Register Form Validation</h3>
              </div>
          </div>
              <!-- /.card-header -->
             
              <div class="card-body">
                <div class="row" >
                  <?php
                    
                    $query=mysqli_query($con,"SELECT * FROM information_schema.columns WHERE table_name ='registration_form' AND ORDINAL_POSITION>2");
                   
                    
                    $query2=mysqli_query($con,"SELECT * FROM `registration_form` WHERE aid='$admin_id'");
                    $row2=mysqli_fetch_assoc($query2);
                    while($row=mysqli_fetch_assoc($query))
                    {
                      $col=$row['COLUMN_NAME'];
                    ?>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label><?php echo str_replace('_',' ',$row['COLUMN_NAME']);?>&nbsp;&nbsp;<i class="fa fa-edit" onclick="show_edit_row('<?=$row['COLUMN_NAME']?>','')"></i></label>
                    <div class="row" id="<?=$row['COLUMN_NAME']?>" style="display: none;">
                      <div class="col-md-6">
                        <input type="text" id="<?=$row['COLUMN_NAME']?>1" class="form-control" value="<?=str_replace('_',' ',$row['COLUMN_NAME'])?>"><br>
                      </div>
                      <div class="col-md-6">
                        <button class="btn btn-info" type="button" onclick="save_edit('<?=$row['COLUMN_NAME']?>1')">Save &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></button>
                        <button class="btn btn-secondary" type="button" onclick="show_edit_row('<?=$row['COLUMN_NAME']?>','none')">Close&nbsp;&nbsp;<i class="fa fa-times-circle" aria-hidden="true"></i></button>
                      </div>
                    </div>
                    <select class="form-control" onchange="save_validation('<?=$row['COLUMN_NAME']?>',this.value)">
                      <option value="00" selected="" disabled="">Select Option</option>
                      <option value="M" <?php if($row2[$col]=='M'){ echo  'selected="selected"';}?> >Mandatory</option>
                      <option value="N" <?php if($row2[$col]=='N'){ echo  'selected="selected"';}?> >Non-Mandatory</option>
                    </select>
                  </div>
                </div>
                  <?php }?>

               
                </div>
             
                 <div class="row">
                     <div class="col-sm-6" >
                      <div class="form-group">
                        <div class="field">
                        <button class="btn btn-success" type="button" style="margin-top: 25px;" data-toggle="modal" data-target="#exampleModal"> Add New Question</button>
                      </div>
                      </div>
                    </div>
                 </div>
                 <!-- <div class="row">
                  <div class="col-sm-6" >
                      <div class="form-group">
                        <div class="field">
                        <button class="btn btn-primary" type="button" >Save</button>
                        <a href="registration_form_validation.php">
                        <button class="btn btn-secondary" type="button">Reset</button>
                        </a>
                      </div>
                      </div>
                    </div>
                 </div> -->
         </div>
        
           

     </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <label>Question</label>
                <input type="text" id="new_question" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="save_ques()">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////// -->
<script type="text/javascript" src="jquery.js"></script>          
<script type="text/javascript">
 var load=document.getElementById('load');
function save_ques() {
  var new_question=document.getElementById('new_question').value;
  // alert(new_question);
  var type="add_ques";
  $.ajax({
    type:'POST',
    url:'update_reg_form.php',
    data:{'new_question':new_question,'type':type},
    success:function(res) {
      // alert(res);
      if(res==1)
      {
    window.location.href="registration_form_validation.php";
      }
      else{
        alert(res);
      }
    }
  });
}

function save_validation(col,val) {
  load.style.display='';
  var type='valid';
$.ajax({
  type:'POST',
  url:'update_reg_form.php',
  data:{'type':type,'col':col,'val':val},
  success:function(res) {
  load.style.display='none';
  if(res!=1)
  {
    alert(res);
  }
  }
});
}

function show_edit_row(show_row,str) {
  document.getElementById(show_row).style.display=str;
}

function save_edit(str) {
  var col_value=document.getElementById(str).value;
  var type='save_edit';
  // $.ajax({
  //   type:'POST',
  //   url:'update_reg_form.php',
  //   data:{'type':type,'col_value':col_value,'col':str},
  //   success:function(res) {
      
  //   }
  // });
}

$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
  });
</script>
<?php
  include ('include/footer.php');
?>