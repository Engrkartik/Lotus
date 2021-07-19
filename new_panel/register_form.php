<?php
include('include/header.php');
?>

<div class="page has-sidebar-left  height-full">
<header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-wpforms"></i>
                        Register Form Validation
                    </h4>
                </div>
            </div>
        </div>
    </header>
<div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                  <div class="card-body">
                   <div class="row">
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
                    <label><?php echo str_replace('_',' ',$row['COLUMN_NAME']);?>&nbsp;&nbsp;<i class="icon-edit" onclick="show_edit_row('<?=$row['COLUMN_NAME']?>','')"></i></label>
                    <div class="row" id="<?=$row['COLUMN_NAME']?>" style="display: none;">
                      <div class="col-md-6">
                        <input type="text" id="<?=$row['COLUMN_NAME']?>1" class="form-control" value="<?=str_replace('_',' ',$row['COLUMN_NAME'])?>"><br>
                      </div>
                      <div class="col-md-6">
                        <button class="btn btn-info" type="button" onclick="save_edit('<?=$row['COLUMN_NAME']?>1')">Save &nbsp;&nbsp;<i class="icon-save" aria-hidden="true"></i></button>
                        <button class="btn btn-secondary" type="button" onclick="show_edit_row('<?=$row['COLUMN_NAME']?>','none')">Close&nbsp;&nbsp;<i class="icon-window-close" aria-hidden="true"></i></button>
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
                            </div>
                            </div>                            
                            <hr>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal"><i class="icon-add"></i>Add New Question</button>
                            </div>
                        </div>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #33B5E5;">
        <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;">Add New Question</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <label style="font-weight: 600; font-size: 20px;">Question</label>
                <input type="text" id="new_question" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="save_ques()"><i class="icon-save mr-2"></i> Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 </div>
</div>
<script>
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
    window.location.href="register_form.php";
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
 
</script>
    <?php
    include('include/footer.php');
    ?>