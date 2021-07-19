<style>
  .card-header{background-image: linear-gradient(to right, #ccabeafc, #f54fb200, #ccabeafc);}
  #set_btn, #discount_btn, #cat_btn, #brand_btn, #Attributes, #save{background-image: linear-gradient(to right ,#000000c7, transparent,#000000ba);}
  .modal-header{background-color: #ccc;}
  .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

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
  </style>

<?php
include('include/header.php');
$pid=$_GET['pid'];
$today=date('Y-m-d');
$query=mysqli_query($con,"SELECT product.* FROM `product` WHERE product.aid='$admin_id' and product.id='$pid'");
$row=mysqli_fetch_assoc($query);
$s_id=$row['set_id'];
$a_id=$row['att_id'];
$chk_size=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE s_id='$s_id' and aid='$admin_id'");
$row_chk=mysqli_fetch_assoc($chk_size);
// mysqli_query($con,"DELETE FROM `set_details_whole` WHERE s_id='1'");
?>

 <div id="load" class="se-pre-con"></div>

 <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title" style="float: none;text-align: center;font-weight:800;">Edit Item Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="add_product.php" method="POST" enctype="multipart/form-data">
                  <div class="row" style="margin-left: 10px;">
                    <?php 
                    $prod_img=$row['img'];
                    $pro_img=mysqli_query($con,"SELECT * FROM `prod_img` WHERE img_id='$prod_img' and aid='$admin_id'");
                    while($r_img=mysqli_fetch_assoc($pro_img))
                      {?>
                    <img src="<?=$r_img['img_url']?>" onclick="imagezoom('<?=$r_img['id']?>');" id="<?=$r_img['id']?>" style="width: 100px;height: 100px;">&nbsp;&nbsp;
                    <i class="fa fa-trash" style="cursor: pointer;" onclick="delete_img('<?=$r_img['img_url']?>')"></i>
                  <?php }?>
                  </div>
                  <div class="row">
                    <div class="col-sm-10" style="margin-left: 10px;">
                  <div class="form-group">
                    <div class="field" >
                      <label>Product Images</label>
                      <input type="file" class="form-control" id="files" name="files[]" onchange="store_img();show_img('files')" multiple  />
                    </div>
                  </div>
                  </div>
                  <!-- <div class="col-sm-"> -->
                  <div class="form-group gallery" id="img_prod">
                   
                  <!-- </div> -->
                  </div>
                </div>
                <div class="row">
                  
                 <div class="col-sm-5"  style="margin-left: 10px;">
                      <div class="form-group">
                        <label>Design Number</label>
                        <input type="text" id="new_id" value="<?=$row['item_name']?>" class="form-control" style="text-align: left;" onfocusout="fill_title(this.value)">
                      
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="title" value="<?=$row['title']?>" class="form-control" style="text-align: left;" onfocusout="fill_title2(this.value)">
                      
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5" style="margin-left: 10px;">
                      <div class="form-group">
                       <!--  <label>Wholesale Price</label>
                        <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" class="form-control" id="price" placeholder="Enter ..."> -->
                        <label class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" id="set_btn" data-target="#myModal" style="margin-bottom: 12px;" onclick="size_select2('7','7');disable_option2();myFunction('');show_avail_qty_row2('auto_reduce_val','show_avail_row','avail_qty_set');">Set Details&nbsp;&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i></label>
                        <!-- <button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"></button> -->
                      </div>
                    </div>
                  </div>
                  
                  <div class="card-header">
                  <h3 class="card-title" style="float: none;text-align: center;font-weight:800;">SET DETAILS</h3>
                </div>
                    <br>
                <!-- <div class="row" style="margin-left: 10px;"> -->
                      <div id="myTable">
                        <?php 
                        // $s_id=$row['set_id'];
                       $query1=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE s_id='$s_id' and pid='$pid' and aid='$admin_id' group by set_id");
						    while ($rows=mysqli_fetch_assoc($query1)) 
						    {
						      
						      $set_id=$rows['set_id'];
						      $query2=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE set_id='$set_id' and s_id='$s_id' and pid='$pid' and aid='$admin_id'");
						      
								$query3=mysqli_query($con,"SELECT COUNT(DISTINCT(color)) as color,min_color FROM `set_details_whole` WHERE set_id='$set_id' and aid='$admin_id'");
								$row3=mysqli_fetch_assoc($query3);
								$query4=mysqli_query($con,"SELECT COUNT(DISTINCT(size)) as size,min_size FROM `set_details_whole` WHERE set_id='$set_id' and aid='$admin_id'");
								$row4=mysqli_fetch_assoc($query4);
								
								if(($row3['min_color']==$row3['color']) && ($row4['min_size']==$row4['size']))
						      {
								?>
								
								<div class="row" style="margin-left: 10px;">
									<div class="col-md-10" style="border: 2px solid black;">
										<div class="row">		
										<div class="col-md-12">
										<br>

						<table class="table table-bordered" style="border:1px solid black;">
						  <thead>
						  <tr>
						    <th>S.No</th>
						    <th>COLOR</th>
						    <th>SIZE</th>
						    <th>QTY(in pcs)</th>
						    <th>RATE/-</th>
						    </tr> 
						    </thead>
						  <tbody>
						  <?php 
						  $sno=0;
						  $sum_q=0;
              $prev=0;
              $qty=1;
              $wsp=0;
						      while($row2=mysqli_fetch_assoc($query2))
						      {
						  $sno++;
						       ?>
						       <tr <?php if($prev==$row2['size']){}else{ ?> style="border-top: 2px solid black;"<?php }?> >
						    <td><?php echo $sno;?></td>
						    <td><?php echo str_replace('_', ' ',$row2['color']);?></td>
						    <td><?php echo $row2['size'];
						    
						    $sum_q=$sum_q+$row2['qty'];
                $qty=$qty*$row2['qty'];
						    $wsp+=$row2['wsp']*$row2['qty'];
						    ?>
						  </td>
						    <?php
						  if($qty<2){
						  ?><td><?php echo $row2['qty'];?>
						    <!-- <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
              event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty1" value="<?=$qty?>" step="<?=$qty?>" min="0"/ name="set_qty[]" onchange="sum()">  -->
						      </td>
						    <td><?php echo $row2['wsp'].'/-';?></td>
							<?php 
						  }else{?>
						  <td><?php echo $row2['qty'];?>
						    <!-- <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
              event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="sum_qty1" value="<?=$qty?>" step="<?=$qty?>" min="0"/ name="set_qty[]" onchange="sum()" onkeydown="return false" > -->
						       </td>
						    <td><?php echo $row2['wsp'].'/-';?></td>

						  <?php 
						  }
						      $prev=$row2['size'];
                }
                ?></tr>
						      <tr>
  						<td colspan="3">Total Set</td>
  						<td id="total_qty1"><?php echo $sum_q.'(in pcs)';?>
  						</td>
  						<td id="total_price1"><?php echo ($wsp).'.00/-';?></td>
  						</tr>
  						</tbody>
					</table>
						</div>
						
						</div>
						</div>
						<div class="col-md-2" style="float: left;">
							<i class="fa fa-edit" style="cursor: pointer;" data-toggle="modal" data-target="#s_<?=$set_id?>" ></i>&nbsp;&nbsp;
							<i class="fa fa-trash" style="cursor: pointer;" onclick="delete_set('<?=$set_id?>');"></i>
<div class="modal fade" id="s_<?=$set_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ccc;">
        <h3 class="modal-title" id="exampleModalLabel">Update Set</h3>
        <button type="button" class="close" onclick="reset_val('close_<?=$set_id?>')" id="close_<?=$set_id?>" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row" style="margin-top: -15px;"> 
            <div class="col-md-10">
              <div class="row"> 
                <div class="col-2" style="background-color: lightgrey;">
                  <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="v-pills-category-tab_<?=$set_id?>" data-toggle="tab" href="#v-pills-category_<?=$set_id?>" role="tab" aria-controls="v-pills-category" aria-selected="true" style="pointer-events: none;"><label>CATEGORY</label></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="v-pills-colour-tab_<?=$set_id?>" data-toggle="tab" href="#v-pills-colour_<?=$set_id?>" role="tab" aria-controls="v-pills-colour" aria-selected="true" style="pointer-events: none;"><label>COLOUR</label></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="v-pills-size-tab_<?=$set_id?>" data-toggle="tab" href="#v-pills-size_<?=$set_id?>" role="tab" aria-controls="v-pills-size" aria-selected="false" style="pointer-events: none;"><label>SIZE</label></a></li>
                    <li class="nav-item">
                    <a class="nav-link" id="v-pills-price-tab_<?=$set_id?>" data-toggle="tab" href="#v-pills-price_<?=$set_id?>" role="tab" aria-controls="v-pills-price" aria-selected="false" style="pointer-events: none;"><label>PRICE</label></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="v-pills-inventory-tab_<?=$set_id?>" data-toggle="tab" href="#v-pills-inventory_<?=$set_id?>" role="tab" aria-controls="v-pills-inventory" aria-selected="false" style="pointer-events: none;"><label>INVENTORY</label></a>
                    </li>
                 </ul>
                </div>
                <div class="col-10">
                  <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane active" id="v-pills-category_<?=$set_id?>" role="tabpanel" aria-labelledby="v-pills-category-tab_<?=$set_id?>">
                          <!-- <div class="row"> -->
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                              <div class="col-md-10">
                                <p></p>
                              </div>
                              <div class="col-md-2">
                                <button type="button" class="btn btn-warning" onclick="nexttab2('v-pills-colour_<?=$set_id?>');color_tab('<?=$set_id?>','<?=$row3['min_color']?>');show_size2(document.getElementById('cate_<?=$set_id?>').value,'<?=$set_id?>','<?=$row4['min_size']?>');">Next</button>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                              
                        <!-- </div> -->
                          <!-- </div> -->
                          <?php
                          $main_q=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE set_id='$set_id' and aid='$admin_id'");
                          $main_row=mysqli_fetch_assoc($main_q);
                          ?>
                          <div class="row">
                            <div class="col-md-12">
                              <label>SELECT CATEGORY</label>
                              <select class="form-control" id="cate_<?=$set_id?>">
                                <option value="00" selected="" disabled="">Select Option</option>
                                <option value="M" <?php if($main_row['size_type']=='M'){echo 'selected="selected"';}?> >Men's Wear</option>
                                <option value="W" <?php if($main_row['size_type']=='W'){echo 'selected="selected"';}?> >Women's Wear</option>
                                <option value="K" <?php if($main_row['size_type']=='K'){echo 'selected="selected"';}?> >Kid's Wear</option>
                              </select>
                            </div>
                          </div>
                        
                        </div>
                          <div class="tab-pane" id="v-pills-colour_<?=$set_id?>" role="tabpanel" aria-labelledby="v-pills-colour-tab_<?=$set_id?>">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                    <button type="button" class="btn btn-info" onclick="nexttab2('v-pills-category_<?=$set_id?>');">Back</button>
                                    </div>
                                    <div class="col-md-2">
                                      <button type="button" class="btn btn-warning" onclick="info();nexttab2('v-pills-size_<?=$set_id?>');show_size2(document.getElementById('cate_<?=$set_id?>').value,'<?=$set_id?>','<?=$row4['min_size']?>');">Next</button>
                                    </div>
                                
                                  </div>
                                
                                      
                                        <div class="row" id="color_tab_p_<?=$set_id?>">
                                         
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane" id="v-pills-size_<?=$set_id?>" role="tabpanel" aria-labelledby="v-pills-size-tab_<?=$set_id?>">
                            <div class="row" id="size_<?=$set_id?>">
                              <div class="col-md-12" ></div>
                            </div>
                          </div>
                          <div class="tab-pane" id="v-pills-price_<?=$set_id?>" role="tabpanel" aria-labelledby="v-pills-price-tab_<?=$set_id?>">
				                    <div class="row">
				                      <div class="col-md-12">
				                      	<div class="row">
										<!-- <div class="col-md-12"> -->
										<!-- <div class="row"> -->
                    <div class="col-md-7"></div>

										
                  <div class="col-md-2">
										<button type="button" class="btn btn-info" onclick="nexttab2('v-pills-size_<?=$set_id?>');">Back</button>

										</div>
                    <div class="col-md-2">
                      <?php 
                      if($main_row['auto_stock_reduce']=='on')
                      {
                      ?>
                    <button type="button" class="btn btn-warning" onclick="info5();show_temp_table4('not_with_price','myTable4_<?=$set_id?>');nexttab2('v-pills-inventory_<?=$set_id?>');show_avail_qty_row('auto_reduce_val_<?=$set_id?>','show_avail_row_<?=$set_id?>','avail_qty_set_<?=$set_id?>');cal_qty_pcs2(document.getElementById('avail_qty_set_<?=$set_id?>').value,'avail_qty_pcs_<?=$set_id?>');">Next</button>
                  <?php
                      }else
                      {
                      ?>
                    <button type="button" class="btn btn-warning" onclick="info5();show_temp_table4('not_with_price','myTable4_<?=$set_id?>');nexttab2('v-pills-inventory_<?=$set_id?>')">Next</button>
                  <?php }?>
                  </div>
										<!-- </div> -->
										</div>
										<!-- </div> -->
				                        <div class="row">
				                          <div class="col-md-6">
				                            <label>Wholesale Price Per Pc</label>
				                            <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
                                    event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="wsp_<?=$set_id?>" class="form-control" value="<?=$main_row['wsp']?>" oninput="show_temp_table3('with_price_w','myTable3_<?=$set_id?>');">
				                          </div>
				                        </div>
				                        <div class="row">
				                          <div class="col-md-6">
				                            <label>MRP Per Pc</label>
				                            <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
                                     event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="mrp_<?=$set_id?>" value="<?=$main_row['mrp']?>" class="form-control" >
				                          </div>
				                         <!--  <div class="col-md-3" style="margin-top: 20px;">
				                            <button type="button" class="btn btn-success" onclick="save_data('myTable3')">View Set Table</button>
				                          </div> -->
				                        </div>
				                        <div class="row" style="margin-left: 10px;">
				                          <div class="col-md-12">
				                            <div class="row" id="temp_table_<?=$set_id?>"></div>
				                          </div>
				                        </div>
				                        <div class="row" id="myTable3_<?=$set_id?>"></div>
				                      </div>
				                    </div>
				                  </div>
                          <div class="tab-pane" id="v-pills-inventory_<?=$set_id?>" role="tabpanel" aria-labelledby="v-pills-inventory-tab_<?=$set_id?>">
                            <div class="row">
                              <div class="col-md-12">
                    <div class="row">
                    <!-- <div class="col-md-2">
                    <button type="button" class="btn btn-warning" id="save_bt2" onclick="info4();save_data2('myTable','<?=$set_id?>');">Save</button>
                  </div> -->
                  <div class="col-md-9"></div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-info" onclick="nexttab2('v-pills-price_<?=$set_id?>');">Back</button>
                    </div>
                    </div>
                                <div class="row">
                                  <div class="col-md-4">
                                    <label>Minimum Set To Order</label>
                                  </div>
                                  <div class="col-md-2">
                                    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
                                    event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="min_set_order_<?=$set_id?>" class="form-control" min='1' value="<?=$main_row['min_set_order']?>" >
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-12">
                                    <label>Auto Stock Reduce Qty</label>&nbsp;&nbsp;
                                    <label class="switch">
                                    <input type="checkbox" id="auto_reduce_val_<?=$set_id?>"  onchange="show_avail_qty_row('auto_reduce_val_<?=$set_id?>','show_avail_row_<?=$set_id?>','avail_qty_set_<?=$set_id?>');" <?php if($main_row['auto_stock_reduce']=='on'){echo "checked='checked'";}?>>
                                     <div class="slider round"></div>
                                   </label>
                                  </div>
                                </div>
                                <br>
                                <div class="row" id="show_avail_row_<?=$set_id?>" style="display: none;">
                                  <div class="col-md-12">
                                  <div class="row">
                                  <div class="col-md-12" style="text-align: center;">
                                    <label >AVAILABLE STOCK QTY</label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3"></div>
                                  <div class="col-md-3" style="text-align: center;">
                                    <label >(IN SETS)</label>
                                    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
                                  event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="avail_qty_set_<?=$set_id?>" value="<?=$main_row['qty_set']?>" class="form-control" oninput="cal_qty_pcs(this.value,'avail_qty_pcs_<?=$set_id?>')">
                                  </div>
                                  <div class="col-md-3" style="text-align: center;">
                                    <label>(IN PCS)</label>
                                    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
                                        event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="avail_qty_pcs_<?=$set_id?>" value="<?=$main_row['qty_pcs']?>" class="form-control" oninput="cal_qty_set(this.value,'avail_qty_set_<?=$set_id?>')">
                                  </div>
                                  <div class="col-md-3"></div>

                                </div>
                                </div>
                                </div>
                                <!-- <div class="row">
                                  <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="save_data('myTable4')">View Set Table</button>
                                  </div>
                                </div> -->
                              </div>
                            </div>
                            <div class="row" id="myTable4_<?=$set_id?>">
                              <div class="col-md-12"></div>
                            </div>
                          </div>
                      </div>
                    </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" id="save_but<?=$set_id?>" onclick="info4();save_data2('myTable','<?=$set_id?>');" onclick="reset_val(this.id);" style="display: none;">Save changes</button>
        <button type="button" class="btn btn-secondary" onclick="reset_val('close2_<?=$set_id?>')" id="close2_<?=$set_id?>" style="background-color: red;">Close</button>
      </div>
    </div>
  </div>
</div>
						</div>
						</div>
						
						      <?php
						  
						  }
						  else
						  	{
						  		?>
						  		<div class="row" style="margin-left: 10px;" >
						  			<div class="col-md-10" style="border: 2px solid black;">
										<div class="row">
											<div class="col-md-12"><br>
						  		<table class="table table-bordered" style="border:1px solid black;">
						       <tbody>
						      <tr>
						      <th>COLOR</th>
						      <td><?php  
						        $set_id=$rows['set_id'];
						        $query5=mysqli_query($con,"SELECT DISTINCT(color) FROM `set_details_whole` WHERE set_id='$set_id' and s_id='$s_id' and aid='$admin_id'");
						        $sno='';
						        while($row5=mysqli_fetch_assoc($query5))
						        {
						         
						         echo $sno." ".str_replace('_', ' ',$row5['color']);
						      $sno=',';
						      }?>
						      </td></tr>
						      <tr><th>SIZE</th><td><?php 
						        $query6=mysqli_query($con,"SELECT DISTINCT(size),wsp FROM `set_details_whole` WHERE set_id='$set_id' and s_id='$s_id' and aid='$admin_id'");
						        $sno='';
						        while($row6=mysqli_fetch_assoc($query6))
						        {
						         
						         echo $sno." ".$row6['size'];
						        $sno=',';
						        $wsp=$row6['wsp'];
						      }?>
						     </td></tr>
						 <tr>
						<th>TOTAL SET PRICE</th>
						<td id="total_price1"><?php echo ($wsp).'.00/- (per pcs)';?></td>
						</tr>
						</tbody>
						</table>
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<label>Min Color To Choose</label>
										<input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" class="form-control" value="<?=$rows['min_color']?>">
									</div>
									<div class="col-md-6">
										<label>Min Size To Choose</label>
										<input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" class="form-control" value="<?=$rows['min_size']?>">
									</div>
								</div>
							</div>
						</div><br>
						</div>
            
						</div>
						</div>
						<div class="col-md-2">
              <i class="fa fa-edit" style="cursor: pointer;" data-toggle="modal" data-target="#s_<?=$set_id?>"></i>&nbsp;&nbsp;
							<i class="fa fa-trash" style="cursor: pointer;" onclick="delete_set('<?=$set_id?>');"></i>
              <div class="modal fade" id="s_<?=$set_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Set</h5>
        <button type="button" class="close" onclick="reset_val('close_<?=$set_id?>')" id="close_<?=$set_id?>" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row" style="margin-top: -15px;"> 
            <div class="col-md-12">
              <div class="row"> 
                <div class="col-2" style="background-color: lightgrey;">
                  <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="v-pills-category-tab_<?=$set_id?>" data-toggle="tab" href="#v-pills-category_<?=$set_id?>" role="tab" aria-controls="v-pills-category" aria-selected="true" style="pointer-events: none;"><label>CATEGORY</label></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="v-pills-colour-tab_<?=$set_id?>" data-toggle="tab" href="#v-pills-colour_<?=$set_id?>" role="tab" aria-controls="v-pills-colour" aria-selected="true" style="pointer-events: none;"><label>COLOUR</label></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="v-pills-size-tab_<?=$set_id?>" data-toggle="tab" href="#v-pills-size_<?=$set_id?>" role="tab" aria-controls="v-pills-size" aria-selected="false" style="pointer-events: none;"><label>SIZE</label></a></li>
                    <li class="nav-item">
                    <a class="nav-link" id="v-pills-price-tab_<?=$set_id?>" data-toggle="tab" href="#v-pills-price_<?=$set_id?>" role="tab" aria-controls="v-pills-price" aria-selected="false" style="pointer-events: none;"><label>PRICE</label></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="v-pills-inventory-tab_<?=$set_id?>" data-toggle="tab" href="#v-pills-inventory_<?=$set_id?>" role="tab" aria-controls="v-pills-inventory" aria-selected="false" style="pointer-events: none;"><label>INVENTORY</label></a>
                    </li>
                 </ul>
                </div>
                <div class="col-10">
                  <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane active" id="v-pills-category_<?=$set_id?>" role="tabpanel" aria-labelledby="v-pills-category-tab_<?=$set_id?>">
                          <!-- <div class="row"> -->
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                              <div class="col-md-2">
                              <button type="button" class="btn btn-warning" onclick="nexttab2('v-pills-colour_<?=$set_id?>');color_tab('<?=$set_id?>','<?=$rows['min_color']?>');show_size2(document.getElementById('cate_<?=$set_id?>').value,'<?=$set_id?>','<?=$rows['min_size']?>');">Next</button>
                              </div>
                              <div class="col-md-10"></div>
                            </div>
                          </div>
                        </div>
                              
                        <!-- </div> -->
                          <!-- </div> -->
                          <?php
                          $main_q=mysqli_query($con,"SELECT size_type FROM `set_details_whole` WHERE set_id='$set_id' and aid='$admin_id'");
                          $main_row=mysqli_fetch_assoc($main_q);
                          ?>
                          <div class="row">
                            <div class="col-md-12">
                              <label>SELECT CATEGORY</label>
                              <select class="form-control" id="cate_<?=$set_id?>">
                                <option value="00" selected="" disabled="">Select Option</option>
                                <option value="M" <?php if($main_row['size_type']=='M'){echo 'selected="selected"';}?> >Men's Wear</option>
                                <option value="W" <?php if($main_row['size_type']=='W'){echo 'selected="selected"';}?> >Women's Wear</option>
                                <option value="K" <?php if($main_row['size_type']=='K'){echo 'selected="selected"';}?> >Kid's Wear</option>
                              </select>
                            </div>
                          </div>
                        
                        </div>
                          <div class="tab-pane" id="v-pills-colour_<?=$set_id?>" role="tabpanel" aria-labelledby="v-pills-colour-tab_<?=$set_id?>">
                            <div class="row">
                              <div class="col-md-12"><br>
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                    <button type="button" class="btn btn-info" onclick="nexttab2('v-pills-category_<?=$set_id?>');">Back</button>
                                    </div>
                                    <div class="col-md-2">
                                    <button type="button" class="btn btn-warning" onclick="info();nexttab2('v-pills-size_<?=$set_id?>');show_temp_table('no_with_price','myTable3')">Next</button></div>
                                  </div>
                                
                                      
                                        <div class="row" id="color_tab_p_<?=$set_id?>">
                                         
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane" id="v-pills-size_<?=$set_id?>" role="tabpanel" aria-labelledby="v-pills-size-tab_<?=$set_id?>">
                            <div class="row" id="size_<?=$set_id?>">
                              <div class="col-md-12" ></div>
                            </div>
                          </div>
                          <div class="tab-pane" id="v-pills-price_<?=$set_id?>" role="tabpanel" aria-labelledby="v-pills-price-tab_<?=$set_id?>">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                    <!-- <div class="col-md-12"> -->
                    <!-- <div class="row"> -->
                      <div class="col-md-7"></div>
                      <div class="col-md-2">
                    <button type="button" class="btn btn-info" onclick="nexttab2('v-pills-size_<?=$set_id?>');">Back</button>

                    </div>
                    <div class="col-md-2">
                    <button type="button" class="btn btn-warning" onclick="info5();show_temp_table4('not_with_price','myTable4_<?=$set_id?>');nexttab2('v-pills-inventory_<?=$set_id?>')">Next</button>
                  </div>
                  
                  
                    <!-- </div> -->
                    </div>
                    <!-- </div> -->
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Wholesale Price Per Pc</label>
                                    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="wsp_<?=$set_id?>" class="form-control" value="" oninput="show_temp_table3('with_price_w','myTable3_<?=$set_id?>');">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>MRP Per Pc</label>
                                    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="mrp_<?=$set_id?>" class="form-control" >
                                  </div>
                                 <!--  <div class="col-md-3" style="margin-top: 20px;">
                                    <button type="button" class="btn btn-success" onclick="save_data('myTable3')">View Set Table</button>
                                  </div> -->
                                </div>
                                <div class="row" style="margin-left: 10px;">
                                  <div class="col-md-12">
                                    <div class="row" id="temp_table_<?=$set_id?>"></div>
                                  </div>
                                </div>
                                <div class="row" id="myTable3_<?=$set_id?>"></div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="v-pills-inventory_<?=$set_id?>" role="tabpanel" aria-labelledby="v-pills-inventory-tab_<?=$set_id?>">
                            <div class="row">
                              <div class="col-md-12">
                    <div class="row">
                    <!-- <div class="col-md-2">
                    <button type="button" class="btn btn-warning" id="save_bt2" onclick="info4();save_data2('myTable','<?=$set_id?>');">Save</button>
                  </div> -->
                  <div class="col-md-9"></div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-info" onclick="nexttab2('v-pills-price_<?=$set_id?>');">Back</button>
                    </div>
                    </div>
                                <div class="row">
                                  <div class="col-md-4">
                                    <label>Minimum Set To Order</label>
                                  </div>
                                  <div class="col-md-2">
                                    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="min_set_order_<?=$set_id?>" class="form-control" min='1' >
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-12">
                                    <label>Auto Stock Reduce Qty</label>&nbsp;&nbsp;
                                    <label class="switch">
                                    <input type="checkbox" id="auto_reduce_val_<?=$set_id?>"  onchange="show_avail_qty_row('auto_reduce_val_<?=$set_id?>','show_avail_row_<?=$set_id?>','avail_qty_set_<?=$set_id?>')">
                                     <div class="slider round"></div>
                                   </label>
                                  </div>
                                </div>
                                <br>
                                <div class="row" id="show_avail_row_<?=$set_id?>" style="display: none;">
                                  <div class="col-md-12">
                                  <div class="row">
                                  <div class="col-md-12" style="text-align: center;">
                                    <label >AVAILABLE STOCK QTY</label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3"></div>
                                  <div class="col-md-3" style="text-align: center;">
                                    <label >(IN SETS)</label>
                                    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="avail_qty_set_<?=$set_id?>" class="form-control">
                                  </div>
                                  <div class="col-md-3" style="text-align: center;">
                                    <label>(IN PCS)</label>
                                    <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="avail_qty_pcs_<?=$set_id?>" class="form-control">
                                  </div>
                                  <div class="col-md-3"></div>

                                </div>
                                </div>
                                </div>
                                <!-- <div class="row">
                                  <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="save_data('myTable4')">View Set Table</button>
                                  </div>
                                </div> -->
                              </div>
                            </div>
                            <div class="row" id="myTable4_<?=$set_id?>">
                              <div class="col-md-12"></div>
                            </div>
                          </div>
                      </div>
                    </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="save_but<?=$set_id?>" onclick="info4();save_data2('myTable','<?=$set_id?>');" data-dismiss="modal" style="display: none;">Save changes</button>
        <button type="button" class="btn btn-secondary" onclick="reset_val('close2_<?=$set_id?>')" id="close2_<?=$set_id?>" style="background-color: red;">Close</button>
      </div>
    </div>
  </div>
</div>
            </div>
						</div>
						    <?php }?>

						<br><br>
						    <?php }?>
                       
                      </div>
                    </div>
                  <div class="col-md-3"></div>

                  <!-- </div> -->
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="col-sm-5">
                        <label class="btn btn-primary" data-toggle="modal" data-target="#add_disc" id="discount_btn" style="margin-bottom: 13px;">Add Discount&nbsp;&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i></label>
                      </div>
                       <!-- <div class="col-sm-5" style="margin-left: 10px;">
                        <label class="btn btn-primary" data-toggle="modal" data-target="#add_brand" data-backdrop="static" data-keyboard="false">Add Brand&nbsp;&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i></label>
                      </div> -->
                    </div>
                  </div>
                  <div class="row">
                  	<div class="col-sm-5" style="margin-left: 10px;">
                      <div class="form-group">
                        <label>Discount</label>
                        <?php 

                        $chk2=mysqli_query($con,"SELECT * FROM `discount` WHERE  pid='$pid' and aid='$admin_id'");
                        $rows2=mysqli_fetch_assoc($chk2);
                        ?>
                        <!-- <input type="text" id="discount" class="form-control"  value="<?=$row['discount']?>"> -->
                        <select class="form-control" id="discount" >
                          <option value="00" disabled="" selected="">Select Option</option>
                          <?php
                          $disc=mysqli_query($con,"SELECT * FROM `discount` WHERE aid='$admin_id' GROUP by disc_id");
                          while($rows1=mysqli_fetch_assoc($disc))
                          {
                          ?>
                          <option value="<?=$rows1['disc_id']?>" <?php if ($rows2['disc_id']==$rows1['disc_id']) {
                            echo 'selected="selected"';
                          }?> ><?php echo $rows1['disc_name']." - ".$rows1['disc']."(".($rows1['disc_type']=='P'?'%':'₹').")";?></option>
                        <?php }?>
                        </select>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                  	<div class="col-sm-5" style="margin-left: 10px;">
                  		<div class="form-group">
                  			<div class="field">
                  				<label>GST %</label>
                  				<select class="form-control" id="gst">
                  					<option value="00" selected="selected">Select Option</option>
                  					<option value="0" <?php if($row['tax']=='0'){ echo 'selected="selected"';} ?> >Exempt</option>
                  					<option value="3" <?php if($row['tax']=='3'){ echo 'selected="selected"';} ?> > 3%</option>
                  					<option value="5" <?php if($row['tax']=='5'){ echo 'selected="selected"';} ?> > 5%</option>
                  					<option value="12" <?php if($row['tax']=='12'){ echo 'selected="selected"';} ?> > 12%</option>
                  					<option value="18" <?php if($row['tax']=='18'){ echo 'selected="selected"';} ?> > 18%</option>
                  					<option value="28" <?php if($row['tax']=='28'){ echo 'selected="selected"';} ?> > 28%</option>
                  				</select>
                  				<!-- <input type="text" id="gst" class="form-control"  value="<?=$row['tax']?>"> -->
                  			</div>
                  		</div>
                  	</div>
                  	<div class="col-sm-5" >
                  		<div class="form-group">
                  			<div class="field">
                  				<label>GST Type</label>
                  				<select class="form-control" id="gst_type">
                  					<option value="00" selected="selected">Select Option</option>
                  					<option value="INCLUDED" <?php if($row['gst_type']=='INCLUDED'){ echo 'selected="selected"';} ?>>INCLUDED</option>
                  					<option value="EXCLUDED" <?php if($row['gst_type']=='EXCLUDED'){ echo 'selected="selected"';} ?> >EXCLUDED</option>
                  				</select>
                  				<!-- <input type="text" id="gst_type" class="form-control"  value="INCLUDED"> -->
                  			</div>
                  		</div>
                  	</div>
                  </div>
                <!-- </div> -->
                <div class="row">
                    <div class="col-sm-12">
                      <div class="col-sm-5">
                        <label class="btn btn-primary" data-toggle="modal" data-target="#add_cat" id="cat_btn" data-backdrop="static" data-keyboard="false">Add Category&nbsp;&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i></label>
                      </div>
                       <!-- <div class="col-sm-5">
                        <label class="btn btn-primary" data-toggle="modal" data-target="#add_disc" data-backdrop="static" data-keyboard="false">Add Discount&nbsp;&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i></label>
                      </div> -->
                    </div>
                  </div><br>
                <div class="row">
                    <div class="col-sm-5" style="margin-left: 10px;">
                      <div class="form-group">
                        <div class="field">
                        <label>Main Category</label>
                        <select class="form-control" name="category" id="category" onchange="show_subcat(this.value)">
                        	<option value="00" disabled="" selected="">Select Category</option>
                        	<?php
                        	$cat=mysqli_query($con,"SELECT * FROM `category` WHERE (aid='$admin_id' or aid='0') and parent_id='0' and status='A' ");
                        	while($row2=mysqli_fetch_assoc($cat))
                        	{
                        	?>
                        	<option value="<?=$row2['id']?>" <?php if($row['cat_id']==$row2['id']){echo  'selected="selected"';}?> > <?php echo $row2['title'];?></option>
                        <?php }?>
                        </select>
                      </div>
                      </div>
                    </div>
                     <div class="col-sm-5">
                     	<label>Sub Category</label>
                     <select class="form-control" id="sub_category">
                     	<option value="00" >Select Main Category First</option>
                     </select>
                    </div>
                  </div>
                  <div class="row">
                    <!-- <div class="col-sm-6"> -->
                      <!-- <div class="col-sm-5">
                        <label class="btn btn-primary" data-toggle="modal" data-target="#add_disc" >Add Discount&nbsp;&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i></label>
                      </div> -->
                       <div class="col-sm-5" style="margin-left: 15px;">
                        <label class="btn btn-primary" data-toggle="modal" data-target="#add_brand" id="brand_btn" data-backdrop="static" data-keyboard="false" style="margin-bottom: 13px;">Add Brand&nbsp;&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i></label>
                      </div>
                    <!-- </div> -->
                  </div>
                  <div class="row" style="margin-left: 5px;">
                  	<div class="col-sm-5">
                      <div class="form-group">
                        <!-- <label>Minimun set to order</label>
                        <input type="text" class="form-control" id="min_order" placeholder="Enter ..." > -->
                        <label>Brand</label>
                        <select class="form-control" id="brand">
                          <option disabled="true" value="00" selected="">Select Brand</option>
                          <?php
                          $brand=mysqli_query($con,"SELECT * FROM `brand` WHERE aid='$admin_id' order by id desc");
                          while ($row_b=mysqli_fetch_assoc($brand)) {
                            
                          ?>
                          <option value="<?=$row_b['name']?>" <?php if($row['brand']==$row_b['name']){echo  'selected="selected"';}?> ><?php echo $row_b['name'];?></option>
                        <?php }?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5" style="margin-left: 10px;">
                      <div class="form-group">
                        <label class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="Attributes">Attributes&nbsp;&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <!-- <div class="col-md-2"></div> -->
                    <div style="padding: 40px" class="col-md-10" style="width: 50%">
                      <div class="form-group" id="myTable2">
                      	<div class="col-md-12" style="width:100%;">
                      		<div class="row" style="border:1px solid black;">
                      			<?php
								$att_data=mysqli_query($con,"SELECT * FROM `prod_attribute` WHERE att_id='$a_id' and aid='$admin_id'");
                      			  ?>
                      		<table class="table table-bordered table-responsive" style="border-collapse: collapse;">
								<thead>
								<tr>
									<?php 
									// echo $s_id.'~'.$a_id;
									
									while($att_data_r=mysqli_fetch_assoc($att_data)) {
									
										if(($prev==$att_data_r['sub_cat']))
										{
										?>
										<td><?php echo str_replace('_', ' ',$att_data_r['attribute']);?></td>
										<?php 
										}else{
											$n++;
										?>
										<tr>
											<th><?php echo $n;?></th>
											<th><?php echo str_replace('_', ' ',$att_data_r['sub_cat']);?></th>
											<td><?php echo str_replace('_', ' ',$att_data_r['attribute']);?></td>
										
										<?php
										 $prev=$att_data_r['sub_cat'];

									}

									}
									?>
										</tr>
								</tr>		
							</thead>
					</table>
					</div>
					</div>
					                       
                      </div>
                    </div>
                  <div class="col-md-2"></div>

                  </div>
                   <div class="row" >
                    <div class="col-sm-10" style="margin-left: 10px;">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" id="dscrpt"  rows="2"><?php echo $row['descrpt'];?></textarea> 
                      </div>
                    </div>
                    
                  </div>
                  
<div class="modal fade" id="add_cat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle"><label>ADD CATEGORY</label></h3>
        <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
          <div class="col-md-5">
            <label>Main Category Image</label>
            <input type="file" class="form-control" onchange="show_img('main_cat_img')" id="main_cat_img"><br>
            <img id="output" src="" width="100" height="100" style="display: none;">
          </div>
          <div class="col-md-5">
            <label>Main Category Title</label>
            <input type="text" list="cat" class="form-control" id="main_cat" onchange="check_subcat(this.value);"/>
			<datalist id="cat" >
			 <?php $query=mysqli_query($con,"SELECT title,img FROM `category` WHERE parent_id='0' and (aid='$admin_id' or aid='0')");

							while ($row3=mysqli_fetch_assoc($query)) { ?>
							<option style="cursor: pointer;" id="<?=$row3['img']?>" value="<?=$row3['title']?>"><?php echo  $row3['title'];?></option>
							<?php }
							?>
			</datalist>
		
          </div>
          <div class="col-md-2"  style="display: none;">
            <label>Category Type</label>
            <input class="form-control" type="text" value="Primary" readonly="" id="primary">
          </div>
        </div>
      </div><br>
      <div class="row" >
        <div class="col-md-12">
          <div class="col-md-5">
            <label>Sub Category Image</label>
            <input type="file" class="form-control" onchange="show_img('sub_cat_img')" id="sub_cat_img">
            <img id="output2" src="" width="100" height="100" style="display: none;">

          </div>
          <div class="col-md-5">
            <label>Sub Category Title</label>
            <input type="text" class="form-control" id="cat_sub" list="sub_cats">
            <datalist id="sub_cats">
      
      </datalist>
          </div>
          <div class="col-md-2"  style="display: none;">
            <label>Category Type</label>
            <input class="form-control" type="text" value="Sub Category" readonly="" >
            
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="save_cat(this.id)" id="save_catb">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red;" >Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="add_brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">ADD BRAND</h3>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
            <label>Brand Image</label>
            <input type="file" class="form-control" onchange="show_img('brand_img')" id="brand_img">
          </div>
          <div class="col-md-6">
            <label>Brand Title</label>
            <input type="text" class="form-control" id="brand_title">
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="save_brand(this.id)" id="sabe_br">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="add_disc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: ;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">ADD DISCOUNT</h3>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-md-10">
          <div class="row">
            <div class="col-sm-12">
              <label>Discount Name</label>
              <input type="text" id="disc_name" class="form-control">
            </div>
          </div>
          <div class="row">
          <div class="col-md-6">
            <label>From Date</label>
            <input type="date" class="form-control" id="from_dt" onchange="from_date(this.value)" min="<?=$today?>" >
          </div>
          <div class="col-md-6">
            <label>To Date</label>
            <input type="date" class="form-control" id="to_dt" min="<?=$today?>">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label>Discount Type</label>
            <select class="form-control" id="disc_type">
              <option value="00" selected="" disabled="">Select Option</option>
              <option value="P">Percentage</option>
              <option value="A">Amount</option>
            </select>
          </div>
          <div class="col-md-6">
            <label>Discount</label>
            <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" class="form-control" id="disc">
          </div>
        </div>
      </div>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="save_discount(this.id)" id="save_dis">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
      </div>
    </div>
  </div>
</div>
                  
                   
              </div>
                  
                 
                  
<div class="row">
<div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
        <h3 class="modal-title"><label>CREATE SET</label></h3>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">
				<form action="">
				  <div class="row" style="margin-top: -15px;"> 
				    <div class="col-md-10">
				      <div class="row"> 
				        <div class="col-2" style="background-color: lightgrey;">
				          <ul class="nav nav-tabs" id="myTab" role="tablist">
				            <li class="nav-item">
				              <a class="nav-link active" id="v-pills-category-tab" data-toggle="tab" href="#v-pills-category" role="tab" aria-controls="v-pills-category" aria-selected="true" style="pointer-events: none;"><label>CATEGORY</label></a>
				            </li>
				            <li class="nav-item">
				            <a class="nav-link" id="v-pills-colour-tab" data-toggle="tab" href="#v-pills-colour" role="tab" aria-controls="v-pills-colour" aria-selected="true" style="pointer-events: none;"><label>COLOUR</label></a>
				            </li>
				            <li class="nav-item">
				            <a class="nav-link" id="v-pills-size-tab" data-toggle="tab" href="#v-pills-size" role="tab" aria-controls="v-pills-size" aria-selected="false" style="pointer-events: none;"><label>SIZE</label></a></li>
				            <li class="nav-item">
				            <a class="nav-link" id="v-pills-price-tab" data-toggle="tab" href="#v-pills-price" role="tab" aria-controls="v-pills-price" aria-selected="false" style="pointer-events: none;"><label>PRICE</label></a>
				            </li>
				            <li class="nav-item">
				            <a class="nav-link" id="v-pills-inventory-tab" data-toggle="tab" href="#v-pills-inventory" role="tab" aria-controls="v-pills-inventory" aria-selected="false" style="pointer-events: none;"><label>INVENTORY</label></a>
				            </li>
				         </ul>
				        </div>
				        <div class="col-10">
				          <div class="tab-content" id="v-pills-tabContent">
				                <div class="tab-pane active" id="v-pills-category" role="tabpanel" aria-labelledby="v-pills-category-tab">
				                	<!-- <div class="row"> -->
				                		<div class="row">
                              <div class="col-md-10">
                                <div class="row">
                              <div class="col-md-10"></div>

                              <div class="col-md-2">
				                      <button type="button" class="btn btn-warning" onclick="nexttab('v-pills-colour')">Next</button>
                              </div>
                            </div>
                          </div>
                        </div>
                              
				                <!-- </div> -->
				                	<!-- </div> -->
				                  <div class="row">
				                    <div class="col-md-10">
				                      <label>SELECT CATEGORY</label>
				                      <select class="form-control" onchange="show_size(this.value)" id="cate">
				                        <option value="00" selected="" disabled="">Select Option</option>
				                        <option value="M">Men's Wear</option>
				                        <option value="W">Women's Wear</option>
				                        <option value="K">Kid's Wear</option>
				                      </select>
				                    </div>
				                  </div>
				                
				                </div>
				                   <!-- color tab -->
				                  <div class="tab-pane" id="v-pills-colour" role="tabpanel" aria-labelledby="v-pills-colour-tab">
				                    <div class="row">
				                      <div class="col-md-12"><br>
                                <div class="row">
                                  <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                    <button type="button" class="btn btn-info" onclick="nexttab('v-pills-category');">Back</button>
                                    </div>
				                      	<div class="col-md-2">
				                            <button type="button" class="btn btn-warning" onclick="info();nexttab('v-pills-size');show_temp_table('no_with_price','myTable3')">Next</button></div>
                                    
                                  </div><br>
				                         <div class="row">
				                              <div class="col-md-6">
				                                <label style="vertical-align: middle;">Minimum Colour To Choose By Customer</label>
				                              </div>
				                              <div class="col-md-3">
				                                <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
                                      event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="min_color" class="form-control" oninput="max_color_size('clr[]','min_color','erro')">
				                                <p id="erro" style="color: red;"></p>
				                              </div>
				                            </div>
				                            <br> 
                                    <div id="input-outer">
				                      <input type="search" class="form-control" onkeyup="myFunction(this.value)" id="Search" placeholder="Search for color..." data-clear-btn="true">
                              <div id="clear1">
                                X
                              </div>
                            </div>
				                              <?php

				                               
				                                  $color_2=mysqli_query($con,"SELECT * FROM `color` WHERE (aid='$admin_id' or aid='0') and color_type='2' order by date desc");
				                                  $sn++;
				                                ?>
				                                <br>
                                        <div id="new_color_print">
				                                <div class="row">
				                                  <div class="col-md-12">
				                                  <label class="btn btn-success"  onclick="add_row('')"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Color</label>
				                                    
				                                  </div>
				                                </div><br>
				                                <div class="row" id="new_color_row" style="display: none;">
				                                  <div class="col-md-6">
				                                    <label>Color Name</label>
				                                    <input type="text" class="form-control" id="new_color" list="color_list">
				                                    <p id="color_error" style="color: red"></p>
				                                  </div>
				                                  <datalist id="color_list">
				                                    <?php $query=mysqli_query($con,"SELECT * FROM `color` WHERE (aid='$admin_id' or aid='0') ORDER BY `id` DESC ");
				                                    while ($row3=mysqli_fetch_assoc($query)) { ?>
				                                    <option style="cursor: pointer;"><?php echo  $row3['c_name'];?></option>
				                                    <?php }
				                                    ?>
				                                  </datalist>
				                                  <div class="col-md-6"><br>
				                                    <input type="button" class="btn btn-success" onclick="save_color('');add_row('none')" value="Save">
				                                    <input type="button" class="btn btn-secondary"onclick="add_row('none')" value="Cancel">
				                                  </div>
				                                </div>

				                                <br>
				                                <div class="row">
				                                  <div class="col-md-12">
				                                    <label class="GFG target">OPTION 1&nbsp;&nbsp;<input type="radio" name="chk" onchange="disable_option('options2')"></label>
				                                  </div><br>
				                                  <?php 
				                                  while($run=mysqli_fetch_assoc($color_2))
				                                    {
				                                    $c_name=$run['c_name'];

				                                      ?>

				                                  <div class="col-md-4 target">
				                                    <label class="GFG"><input type="radio" value="<?=$run['c_name']?>" name="clr[]" onchange="count_color_size('clr[]','min_color');disable_option('options2')" onclick="temp_clr_arr('')" class="options1" <?php $item=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE pid='$pid' and color='$c_name' and aid='$admin_id'");
				                                  // $run=mysqli_fetch_assoc($item);
				                                  ?>/>&nbsp;<?php echo str_replace('_', ' ',$run['c_name']);?></label></div>
				                              
				                                    <?php }
				                                          $color_2=mysqli_query($con,"SELECT * FROM `color` WHERE (aid='$admin_id' or aid='0') and color_type='1' order by c_name asc");
				                                          $sn++;
				                                        ?>
				                                        <br><div class="col-md-12">

				                                          <label class="GFG target">OPTION 2&nbsp;&nbsp;<input type="radio" name="chk" onchange="disable_option('options1')"></label> </div><br>
				                                  <!-- <label id="new_color_print"></label><br>  -->
				                                        <?php 
				                                        while($run=mysqli_fetch_assoc($color_2))
				                                          {
				                                          $c_name=$run['c_name'];
				                                            ?>

				                                        <div class="col-md-3 target">
				                                          <label class="GFG"><input type="checkbox" id="option2" value="<?=$run['c_name']?>" name="clr[]" onchange="disable_option('options1');count_color_size('clr[]','min_color');" onclick="temp_clr_arr('')" class="options2" <?php //$item=mysqli_query($con,"SELECT * FROM `set_details_whole` WHERE pid='$pid' and color='$c_name' and aid='$admin_id'");
				                                        // $run=mysqli_fetch_assoc($item);
				                                        ?> />&nbsp;<?php echo str_replace('_',' ',$run['c_name']);?></label></div>
				                                    <?php }?>
				                            
				                      
				                            </div>
				                            </div>
				                          </div>
				                        </div>
				                      </div>
				                              
				                            
				                  <!-- size tab-->
				                  <div class="tab-pane" id="v-pills-size" role="tabpanel" aria-labelledby="v-pills-size-tab">
				                    <div class="row" id="size">
				                      <div class="col-md-12" ></div>
				                    </div>
				                  </div>
				                   <!-- price tab -->
				                  <div class="tab-pane" id="v-pills-price" role="tabpanel" aria-labelledby="v-pills-price-tab">
				                    <div class="row">
				                      <div class="col-md-12">
				                      	<div class="row">
										<!-- <div class="col-md-12"> -->
										<!-- <div class="row"> -->
                      <div class="col-md-7"></div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-info" onclick="nexttab('v-pills-size');">Back</button>

                    </div>
										<div class="col-md-2">
										<button type="button" class="btn btn-warning" onclick="info5();show_temp_table2('not_with_price','myTable4');nexttab('v-pills-inventory')">Next</button>
                  </div>
                  
										<!-- </div> -->
										</div>
										<!-- </div> -->
				                        <div class="row">
				                          <div class="col-md-6">
				                            <label>Wholesale Price Per Pc</label>
				                            <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="wsp" class="form-control" oninput="show_temp_table('with_price','myTable3')">
				                          </div>
				                        </div>
				                        <div class="row">
				                          <div class="col-md-6">
				                            <label>MRP Per Pc</label>
				                            <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="mrp" class="form-control" >
				                          </div>
				                         <!--  <div class="col-md-3" style="margin-top: 20px;">
				                            <button type="button" class="btn btn-success" onclick="save_data('myTable3')">View Set Table</button>
				                          </div> -->
				                        </div>
				                        <div class="row" style="margin-left: 10px;">
				                          <div class="col-md-12">
				                            <div class="row" id="temp_table"></div>
				                          </div>
				                        </div>
				                        <div class="row" id="myTable3"></div>
				                      </div>
				                    </div>
				                  </div>
				                  <div class="tab-pane" id="v-pills-inventory" role="tabpanel" aria-labelledby="v-pills-inventory-tab">
				                    <div class="row">
				                      <div class="col-md-12">
										<div class="row">
                    <div class="col-md-7"></div>
                  <div class="col-md-2">
										<button type="button" class="btn btn-info" onclick="nexttab('v-pills-price');">Back</button>
										</div>
										<div class="col-md-2">
										<button type="button" class="btn btn-warning" onclick="info4();save_data('myTable');" id="save_bt">Save</button>
                  </div>
										</div>
				                        <div class="row">
				                          <div class="col-md-4">
				                            <label>Minimum Set To Order</label>
				                          </div>
				                          <div class="col-md-2">
				                            <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="min_set_order" class="form-control" min='1' >
				                          </div>
				                        </div>
				                        <br>
				                        <div class="row">
				                          <div class="col-md-12">
				                            <label>Auto Stock Reduce Qty</label>&nbsp;&nbsp;
                                    <label class="switch">
				                            <input type="checkbox" id="auto_reduce_val" onchange="show_avail_qty_row('auto_reduce_val','show_avail_row','avail_qty_set');">
                                     <div class="slider round"></div>
                                  </label>
				                          </div>
				                        </div>
				                        <br>
				                        <div class="row" id="show_avail_row" style="display: none;">
				                          <div class="col-md-12">
				                          <div class="row">
				                          <div class="col-md-12" style="text-align: center;">
				                            <label >AVAILABLE STOCK QTY</label>
				                          </div>
				                        </div>
				                        <div class="row">
				                          <div class="col-md-3"></div>
				                          <div class="col-md-3" style="text-align: center;">
				                            <label >(IN SETS)</label>
				                            <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="avail_qty_set" class="form-control" oninput="cal_qty_pcs(this.value,'avail_qty_pcs')">
				                          </div>
				                          <div class="col-md-3" style="text-align: center;">
				                            <label>(IN PCS)</label>
				                            <input type="number" onkeydown="javascript: return event.keyCode === 8 ||
event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="avail_qty_pcs" class="form-control" oninput="cal_qty_set(this.value,'avail_qty_set')">
				                          </div>
				                          <div class="col-md-3"></div>

				                        </div>
				                        </div>
				                        </div>
				                        <!-- <div class="row">
				                          <div class="col-md-12">
				                            <button type="button" class="btn btn-primary" onclick="save_data('myTable4')">View Set Table</button>
				                          </div>
				                        </div> -->
				                      </div>
				                    </div>
				                    <div class="row" id="myTable4">
				                      <div class="col-md-12"></div>
				                    </div>
				                  </div>
				          </div>
				        </div>
				      </div>
				  </div>
				  </div>
				              </form>
            </div>
 
        </div>
    </div>
</div>
                  </div>
                  
                  <div class="row">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" style="margin-left: 24%;">Make Your Selection</h3>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>&nbsp;&nbsp;&nbsp;
        
          
        </button>
      </div>
      <div class="modal-body" style="">
       <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
          <button type="button" class="btn btn-success" onclick="show_att_row('')" style="margin-bottom: 12px;">Add Attribute</button>
          </div>
        </div>
        <div class="row" id="att_row" style="display: none;">
          <div class="col-md-16">
            <div class="col-md-5">
            <label>Attribute Title</label>
             <input type="text" list="attr" class="form-control" id="main_att" onchange="check_att(this.value)"/>
    <datalist id="attr">
     <?php 
     $query=mysqli_query($con,"SELECT DISTINCT(att_name) FROM `attributes` WHERE att_id='0' and (aid='$admin_id' or aid='0')");

            while ($row3=mysqli_fetch_assoc($query)) { ?>
            <option style="cursor: pointer;"><?php echo  $row3['att_name'];?></option>
            <?php }
            ?>
    </datalist>
          </div>
            <div class="col-md-5">
            <label>Variant</label>
            <input type="text" class="form-control" id="variant" list="variants">
            <datalist id="variants">
     
    </datalist>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-success" value="Save" onclick="save_att();show_att_row('none')" style="margin-top: 20px;">Save</button>
            <button type="button" class="btn btn-secondary" value="Close"  onclick="show_att_row('none')" style="margin-top: 20px;">Close</button>
          </div>
        </div>
      </div>
        <div class="row" id="att">
     
        
        </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="info3()" id="att_btn">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red;">Close</button>

      </div>
    </div>
  </div>
</div>

                  </div>
               <!-- Modal -->
               <div class="row">
                  <div class="form-group" style="margin-left: 26px;">
                    <div class="col-sm-12">
                      <button  class="btn btn-primary" type="button" id="save" onclick="new1()">Save</button>
                      <button type="reset" class="btn btn-info">Clear</button>
                    </div>
                  </div>
                </div>
                
                </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
              </div>
              <div id="imagezoom" class="modal1">
  <span class="closea1" data-dismiss="modal">&times;</span>
  <img class="modal-content1" id="img01">
  <div id="caption1"></div>
</div>
<script type="text/javascript">
  var load=document.getElementById('load');
  var color = [];
  var temp_color = [];
 var size = [];
 var temp_size = [];
 var att = [];
 var temp_att = [];
 var sum_amt=[];
 var set_qty=[];
 var set_qty1=[];
 var auto_reduce_va='';

window.onload=show_att('<?=$row_chk['size_type']?>');
window.onload=d_title();
// window.onload=info3();
function d_title() {
    // console.log(sessionStorage.getItem("design_no"));
    if (sessionStorage.getItem("design_no")!= null) {
      document.getElementById('new_id').value=sessionStorage.getItem("design_no");
      document.getElementById('title').value=sessionStorage.getItem("title");
    }
  }
// window.onload=count_color_size('clr[]','min_color');
// window.onload=count_color_size('size[]','min_size');
// window.onload=info();
// window.onload=info2();
window.onload=show_subcat(document.getElementById('category').value);
function check_att(val) {
	// alert(val);
	var cat_id=document.getElementById('category').value;
	var type="variant";
	$.ajax({
		type:'POST',
		url:'update_cat2.php',
		data:{'val':val,'type':type,'cat_id':cat_id},
		success:function(res) {
			// alert(res);
			document.getElementById('variants').innerHTML = res;
		}
	});
	// $('#variant').html(val);
}
function check_subcat(val) {
	// alert(val);
	// var cat_id=document.getElementById('main_cat').value;
	var type="subcat";
	$.ajax({
		type:'POST',
		url:'update_cat2.php',
		data:{'val':val,'type':type},
		success:function(res) {
			// alert(res);
			document.getElementById('sub_cats').innerHTML = res;
		}
	});
	// $('#variant').html(val);
}
function cal_qty_pcs(val,id) {
  // alert(id);
   var checkboxes = document.getElementsByName('set_qty[]');
var vals = 0;
for (var i=0, n=checkboxes.length;i<n;i++) 
{
        var input=checkboxes[i].value;
        vals = Number(vals) + Number(input);
    
}
// alert(vals);
document.getElementById(id).value=(vals*val);
}
function cal_qty_pcs2(val,id) {
  var vals=0;
        var input=(color.length)*(size.length);
        vals = Number(vals) + Number(input);
    console.log(input);
    console.log(vals);
document.getElementById(id).value=(vals*val);
}
function cal_qty_set(val,id) {
   var checkboxes = document.getElementsByName('set_qty[]');
var vals = 0;
for (var i=0, n=checkboxes.length;i<n;i++) 
{
        var input=checkboxes[i].value;
        vals = Number(vals) + Number(input);
    
}
document.getElementById(id).value=(val/vals).toFixed(0);
}
$(function() {
  $('#main_cat').on('input',function() {
    var opt = $('option[value="'+$(this).val()+'"]');
    // alert(opt.attr('id'));
//    console.log(opt.attr('id'));
    if(opt.attr('id')!=undefined)
    {
    document.getElementById('main_cat_img').style.display='none';
    document.getElementById('output').style.display='';
    document.getElementById('output').src= opt.attr('id');
    }
    else if(opt.attr('id')==undefined)
    {
    document.getElementById('output').style.display='none';
    document.getElementById('main_cat_img').style.display='';
    }
  });
});
$(function() {
  $('#cat_sub').on('input',function() {
    var opt = $('option[value="'+$(this).val()+'"]');
    // alert(opt.attr('id'));
    if(opt.attr('id')!=undefined)
    {
    document.getElementById('sub_cat_img').style.display='none';
    document.getElementById('output2').style.display='';
    document.getElementById('output2').src= opt.attr('id');
  }else if(opt.attr('id')==undefined)
    {
    document.getElementById('output2').style.display='none';
    document.getElementById('sub_cat_img').style.display='';
    }
  });
});

 function imagezoom(img_id) {
  // body...
var modal = document.getElementById("imagezoom");
// alert(img_id);
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById(img_id);
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption1");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closea1")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
}
function delete_set(set_id) {
	var txt;
var r = confirm("Are You Sure..?? You want to delete..??");
// alert(set_id);
if (r == true) {
	$.ajax({
		type:'POST',
		url:'delete_set.php',
		data:{'set_id':set_id,'pid':'<?=$pid?>'},
		success:function(res) {
			if(res==1)
			{
				window.location.href="edit_prod_w.php?pid=<?=$pid?>";
			}else{
				alert(res);
			}
		}
	});
  }
}
function color_tab(set_id,val) {
  // alert(val);
  // temp_clr_arr();
  $.ajax({
    type:'POST',
    url:'color_tab.php',
    data:{'set_id':set_id,'val':val},
    success:function(res) {
      // alert(res);
      $('#color_tab_p_'+set_id).html(res);
      info_set_color(set_id);
      // count_color_size('clr[]','min_color_'+set_id);
    }
  });
}

function fill_title(val) {
  var txt;
  // alert(document.getElementById('title').value);
  if(document.getElementById('title').value!="")
  {

	var r = confirm("You Want To Replace Product Title With New Design Number..?");
	if (r == true) {
		document.getElementById('title').value=val;
	}
}else
{
		document.getElementById('title').value=val;

}
if (typeof(Storage) !== "undefined") {
  // Store
  sessionStorage.setItem("design_no", document.getElementById('new_id').value);
  sessionStorage.setItem("title", document.getElementById('title').value);
  // Retrieve
  console.log(sessionStorage.getItem("design_no"));
  console.log(sessionStorage.getItem("title"));
} else {
  console.log("Sorry, your browser does not support Web Storage...");
}
}
function fill_title2(val) {
	if (typeof(Storage) !== "undefined") {
  // Store
  sessionStorage.setItem("design_no", document.getElementById('new_id').value);
  sessionStorage.setItem("title", document.getElementById('title').value);
  // Retrieve
  console.log(sessionStorage.getItem("design_no"));
  console.log(sessionStorage.getItem("title"));
	} else {
	  console.log("Sorry, your browser does not support Web Storage...");
		}
}

function show_temp_table(str,table) {
  if(str=='with_price')
  {
  var wsp=document.getElementById('wsp').value;
  var mrp=document.getElementById('mrp').value;

  }else{
    var wsp=0;
    var mrp=0;
    document.getElementById('wsp').value='';
    document.getElementById('mrp').value='';
  }
var min_color=document.getElementById('min_color').value;
var min_size=document.getElementById('min_size').value;
// alert(min_size);
// var type="with_price";

  $.ajax({
    type:'POST',
    url:'temp_table.php',
    data:{'size':JSON.stringify(size),'color':JSON.stringify(color),'mrp':mrp,'wsp':wsp,'min_color':min_color,'min_size':min_size,'type':str},
    success:function(res) {
      // alert(res);
      $('#'+table).html(res);
    }
  });
}
function show_temp_table2(str,table) {
  info5();
var wsp=document.getElementById('wsp').value;
var mrp=document.getElementById('mrp').value;
var min_color=document.getElementById('min_color').value;
var min_size=document.getElementById('min_size').value;
// alert(min_size);
// var type="with_price";

  $.ajax({
    type:'POST',
    url:'temp_table.php',
    data:{'size':JSON.stringify(size),'color':JSON.stringify(color),'mrp':mrp,'wsp':wsp,'min_color':min_color,'min_size':min_size,'type':str,'sum_amt':JSON.stringify(sum_amt)},
    success:function(res) {
      // alert(res);
      $('#'+table).html(res);

    }
  });
}
function show_temp_table4(str,table) {
  info5();
  var split1=table.split("_");
  var set_id=split1[1];
var wsp=document.getElementById('wsp_'+set_id).value;
var mrp=document.getElementById('mrp_'+set_id).value;
var min_color=document.getElementById('min_color_'+set_id).value;
var min_size=document.getElementById('min_size_'+set_id).value;
// alert(min_size);
// var type="with_price";
  $.ajax({
    type:'POST',
    url:'temp_table_edit.php',
    data:{'size':JSON.stringify(size),'color':JSON.stringify(color),'mrp':mrp,'wsp':wsp,'min_color':min_color,'min_size':min_size,'type':str,'sum_amt':JSON.stringify(sum_amt),'set_id':set_id},
    success:function(res) {
      // alert(res);
      $('#'+table).html(res);

    }
  });
}
function show_temp_table3(str,table) {
	var split1=table.split("_");
	var set_id=split1[1];
	// alert(set_id);
  if(str=='with_price_w')
  {
  var wsp=document.getElementById('wsp_'+set_id).value;
  var mrp=document.getElementById('mrp_'+set_id).value;
  }
  else{
    var wsp=0;
    var mrp=0;
    //document.getElementById('wsp_'+set_id).value='';
   // document.getElementById('mrp_'+set_id).value='';
  }
var min_color=document.getElementById('min_color_'+set_id).value;
var min_size=document.getElementById('min_size_'+set_id).value;
// alert(min_size);
// var type="with_price";
// alert(wsp);
  $.ajax({
    type:'POST',
    url:'temp_table_edit.php',
    data:{'size':JSON.stringify(size),'color':JSON.stringify(color),'mrp':mrp,'wsp':wsp,'min_color':min_color,'min_size':min_size,'type':str,'set_id':set_id},
    success:function(res) {
      // alert(res);
      $('#'+table).html(res);
    }
  });
}
function nexttab(str) {
	// alert(str);
  // $('#myTab li:nth-child(2) a').tab('show');
  if(str=='v-pills-category')
  {
      $('#myTab a[href="#'+str+'"]').tab('show');
  }
  else if(str=='v-pills-colour')
  {  
console.log(color);
    if(document.getElementById('cate').value=='00')
    {
      alert('Select Category..!!');
      document.getElementById('cate').focus();
      return false;
    }
    else
    {
      $('#myTab a[href="#'+str+'"]').tab('show');
    }
  }else if(str=='v-pills-size')
  {
    // alert(color.length);
   if(color.length<1)
  {
    alert('Select Color..!!');
    return false;
  }
  if(document.getElementById('min_color').value>color.length)
  {
    alert("Minimum Color Should be Lesser Than Or Equals To Selected Color..!!");
    document.getElementById('min_color').focus();
    return false;
  }
  else
    {
      $('#myTab a[href="#'+str+'"]').tab('show');
    }
  }else if(str=='v-pills-price')
  {
    // alert(color.length);
   if(size.length<1)
  {
    alert('Select Size..!!');    
    return false;

  }
  if(document.getElementById('min_size').value>size.length)
  {
    alert("Minimum Size Should be Lesser Than Or Equals To Selected Size..!!");
    document.getElementById('min_size').focus();
    return false;
  }
  else
    {
      $('#myTab a[href="#'+str+'"]').tab('show');
    }
  }else if(str='v-pills-inventory')
  {
    var auto_reduce=document.getElementById('auto_reduce_val');
    // if(auto_reduce.checked==true)
    // {
    // }else{
      // alert(auto_reduce.value);
      if(auto_reduce.value=='on')
      {
        $('#auto_reduce_val').prop("checked",false);
      }
    var wsp=document.getElementById('wsp').value;
    var mrp=document.getElementById('mrp').value;

 
  var sum=1;
	 for (var i = 0; i < sum_amt.length; i++) {
	        sum = sum * sum_amt[i];
	    }
			if(sum==0)
			{
				alert("Price will be required for all color & Size..!!!");
				return false;
			}else if(mrp!='') {
  if(Number(wsp)>Number(mrp))
  {
    alert("Wholesale Price Should Be Less Than MRP..!!!");
    document.getElementById('wsp').focus();
    return false;

  }
    }
    // else{
      $('#myTab a[href="#'+str+'"]').tab('show');
    // }
  }
}

function nexttab2(str) {
  var split=str.split("_");
  var set_id=split[1];
  // alert(set_id);
  // alert(str);
  // $('#myTab li:nth-child(2) a').tab('show');
  if(str=='v-pills-category_'+set_id)
  {

      $('#myTab2 a[href="#'+str+'"]').tab('show');
    document.getElementById('save_but'+set_id).style.display='none';
    // alert('save_but'+set_id);
  }
  else if(str=='v-pills-colour_'+set_id)
  {  
    if(document.getElementById('cate_'+set_id).value=='00')
    {
      alert('Select Category..!!');
      document.getElementById('cate_'+set_id).focus();
      return false;
    }
    else
    {

      $('#myTab2 a[href="#'+str+'"]').tab('show');
    document.getElementById('save_but'+set_id).style.display='none';
    }
  }else if(str=='v-pills-size_'+set_id)
  {
    // alert(color.length);
    info_set_color(set_id);
   if(color.length<1)
  {
    alert('Select Color..!!');
        return false;

  }
  if(document.getElementById('min_color_'+set_id).value>color.length)
  {
    alert("Minimum Color Should be Lesser Than Or Equals To Selected Color..!!");
    document.getElementById('min_color_'+set_id).focus();
    return false;
  }
  else
    {
    

      $('#myTab2 a[href="#'+str+'"]').tab('show');
    document.getElementById('save_but'+set_id).style.display='none';
    }
  }else if(str=='v-pills-price_'+set_id)
  {
    // alert(color.length);
    info_set_size(set_id);
   if(size.length<1)
  {
    alert('Select Size..!!');
        return false;

  }
  if(document.getElementById('min_size_'+set_id).value>size.length)
  {
    alert("Minimum Color Should be Lesser Than Or Equals To Selected Color..!!");
    document.getElementById('min_size_'+set_id).focus();
    return false;
  }
  else
    {

      $('#myTab2 a[href="#'+str+'"]').tab('show');
    document.getElementById('save_but'+set_id).style.display='none';
    }
  }else if(str='v-pills-inventory_'+set_id)
  {

    	 var wsp=document.getElementById('wsp_'+set_id).value;
    var mrp=document.getElementById('mrp_'+set_id).value;

  if(wsp<1)
  {
  document.getElementById('wsp_'+set_id).focus();
  return false;
  }
  else if(mrp!='')
  {
  if((Number(wsp)>Number(mrp)) && (mrp<1))
  {
    alert("Wholesale Price Should Be Less Than MRP..!!!");
    document.getElementById('wsp_'+set_id).focus();
    return false;

  }
}
      $('#myTab2 a[href="#'+str+'"]').tab('show');
    document.getElementById('save_but'+set_id).style.display='';

    }
}

function show_avail_qty_row(str1,str2,str3) {
  if(document.getElementById(str1).checked)
  {
    document.getElementById(str2).style.display='';
    document.getElementById(str3).focus();
  }
  else
  {
    document.getElementById(str2).style.display='none';
  }
}
function show_avail_qty_row2(str1,str2,str3) {
  
    document.getElementById(str2).style.display='none';
    $('#auto_reduce_val').prop("checked",false);
}
function from_date(str) {
	// alert(str);
	document.getElementById('to_dt').min=str;
}

function show_size(size_type) {
  // alert(size_type);
$.ajax({
  type:'POST',
  url:'get_data_w.php',
  data:{'size_type':size_type},
  success:function(res) {
    $('#size').html(res);
  }
});
}

function show_size2(size_type,set_id,val) {
  // alert(val);
  temp_size_arr(set_id);
$.ajax({
  type:'POST',
  url:'get_data_w_edit.php',
  data:{'size_type':size_type,'set_id':set_id,'val':val,'prev_color':JSON.stringify(temp_size)},
  success:function(res) {
    $('#size_'+set_id).html(res);
    info2();
    // count_color_size('size[]','min_size_'+set_id);
  }
});
}

function save_discount(id) {
                load.style.display='';
  var from_dt=document.getElementById('from_dt').value;
  var to_dt=document.getElementById('to_dt').value;
  var disc_type=document.getElementById('disc_type').value;
  var disc=document.getElementById('disc').value;
  var disc_name=document.getElementById('disc_name').value;
  var type='discount';
  if(disc_name=="")
  {
                load.style.display='none';
  	document.getElementById('disc_name').focus();
  	return false;
  }else if(disc_type=='00')
  {
                load.style.display='none';
  	document.getElementById('disc_type').focus();
  	return false;
  }else if(disc=='')
  {
                load.style.display='none';
  	document.getElementById('disc').focus();
  	return false;
  }else if(from_dt=='')
  {
                load.style.display='none';
  	document.getElementById('from_dt').focus();
  	return false;
  }else if(to_dt=='')
  {
                load.style.display='none';
  	document.getElementById('to_dt').focus();
  	return false;
  }else
  {
  // alert(from_dt);
  reset_val(id);
  $.ajax({
    type:'POST',
    url:'update_cat.php',
    data:{'from_dt':from_dt,'to_dt':to_dt,'disc_type':disc_type,'disc':disc,'type':type,'disc_name':disc_name},
    success:function(res) {
    	// alert(res);
     // $('#add_disc').modal('hide');
	// $('.modal-backdrop').hide();
  if(res==0)
  {
      load.style.display='none';
      alert("Duplicate Discount");
  }
  else
  {
      load.style.display='none';
      $('#discount').html(res);
      document.getElementById('discount').focus();
  }
    }
  });
}
}
function show_att_row(str) {
	document.getElementById('att_row').style.display=str;
}

function save_att() {
  var main_att=document.getElementById('main_att').value;
  var variant=document.getElementById('variant').value;
  var category=document.getElementById('category').value;
  var att_id='<?=$row['att_id']?>';
  var type="attr";
if(main_att!="")
{
  if(variant!="")
  {
  $.ajax({
    type:'POST',
    url:'update_cat.php',
    data:{'main_att':main_att,'variant':variant,'category':category,'type':type,'att_id':att_id,'prev_att':JSON.stringify(temp_att)},
    success:function(res) {
    	if(res==1)
    	{
    		alert("Variant already exist..!!!");
    		document.getElementById('variant').focus();
    		return false;
    	}
    	else
    	{
      		$('#att').html(res);
  		}
  		document.getElementById('main_att').value='';
  		document.getElementById('variant').value='';
    }
  });
}else
{
  alert("Please Add Variant..!!");
  document.getElementById('main_att').focus();
  return false;
}
}else
{
  alert("Please Select Main Attribute..!!");
  document.getElementById('main_att').focus();
  return false;
}
}

function new_size_row(show) {
  // alert(show);
  document.getElementById(show).style.display='';
}
function new_size_row2(show,str,set_id) {
  // alert(show);
  var new_size=document.getElementById(show).value;
  var size_type=document.getElementById('cate').value;
  // alert(new_size);
  temp_size_arr('');
  var type="new_size";
  if(new_size!="")
  {
  $.ajax({
    type:'POST',
    url:'update_cat.php',
    data:{'type':type,'new_size':new_size,'size_type':size_type,'prev_size':JSON.stringify(temp_size)},
    success:function(res) {
      // alert(res);
      if(res==0)
      {
        alert('Size-name already exist..!!!');
      document.getElementById(show).style.display='';
      document.getElementById(show).focus();
      return false;

      }else{
      document.getElementById(show).style.display=str;
      $('#size').html(res);
      count_color_size('size[]','min_size');
      }
    }
  });
}
  // document.getElementById(show).style.display=str;
}

function new_size_row3(show,str,set_id) {
  // alert(show);
  var new_size=document.getElementById(show).value;
  var size_type=document.getElementById('cate_'+set_id).value;
  // alert(new_size);
  temp_size_arr(set_id);
  var type="new_size2";
  var pid='<?=$pid?>';
  if(new_size!="")
  {
  $.ajax({
    type:'POST',
    url:'update_cat.php',
    data:{'type':type,'new_size':new_size,'size_type':size_type,'set_id':set_id,'pid':pid,'prev_color':JSON.stringify(temp_size)},
    success:function(res) {
      // alert(res);
      if(res==0)
      {
        alert('Size-name already exist..!!!');
      document.getElementById(show).style.display='';
      document.getElementById(show).focus();
      return false;

      }else{
      document.getElementById(show).style.display=str;
      $('#size_'+set_id).html(res);
      count_color_size('size'+set_id+'[]','min_size_'+set_id);
      }
    }
  });
}
  // document.getElementById(show).style.display=str;
}

$(function() {
  $('.selectpicker').selectpicker();
});

function add_row(str) {
	document.getElementById('new_color_row').style.display=str;
}

function save_color() {
	var type="color";
	var new_color=document.getElementById('new_color').value;
	temp_clr_arr('');
	$.ajax({
		type:'POST',
		url:'add_color_size.php',
		data:{'type':type,'color':new_color,'prev_color':JSON.stringify(temp_color)},
		success:function(res) {
			// alert(res);
			// if((res=="") &&(res!=0) )
			// {
        if(res==0)
        {
          document.getElementById('new_color_row').style.display='';
          document.getElementById('color_error').innerHTML="Color Name Already Exist..";
          document.getElementById('new_color').focus();
          return false;
        }
        else
        {
          document.getElementById('color_error').innerHTML="";
          document.getElementById('new_color').value='';
			   $('#new_color_print').html(res);
        }
			// }
      count_color_size('clr[]','min_color');
		}
	});
}
function save_color2(set_id) {
  var type="color2";
  	temp_clr_arr(set_id);
console.log(temp_color);
  var new_color=document.getElementById('new_color').value;
  $.ajax({
    type:'POST',
    url:'add_color_size.php',
    data:{'type':type,'color':new_color,'set_id':set_id,'prev_color':JSON.stringify(temp_color)},
    success:function(res) {
      // alert(res);
      // if((res=="") &&(res!=0) )
      // {
        if(res==0)
        {
          document.getElementById('new_color_row').style.display='';
          document.getElementById('color_error').innerHTML="Color Name Already Exist..";
          document.getElementById('new_color').focus();
          return false;
        }
        else
        {
          document.getElementById('color_error').innerHTML="";
          document.getElementById('new_color').value='';
         $('#new_color_print').html(res);
        }
      // }
      count_color_size('clr'+set_id+'[]','min_color_'+set_id);
    }
  });
}

function refresh_cat(cat) {
  // alert("Hello");
  var type="cat";
  // alert(cat);
  $.ajax({
  type:'POST',
  url:'update_cat.php',
  data:{'type':type,'cat':cat},
  success:function(res) {
    // alert(res);
    $('#category').html(res);
  }
  });
}
function show_subcat(str) {
  var type="subcat";
  var pid='<?=$pid?>';
  // alert(str);
  $.ajax({
  type:'POST',
  url:'update_cat.php',
  data:{'cat_id':str,'type':type,'pid':pid},
  success:function(res) {
    // alert(res);
    $('#sub_category').html(res);
  }
  });
}
function refresh_brand() {
	var type="brand";
	$.ajax({
	type:'POST',
	url:'update_cat.php',
	data:{'type':type},
	success:function(res) {
		// alert(res);
		$('#brand').html(res);
	}
	});
}
function save_cat(id) {
	var main_cat=document.getElementById('main_cat');
	var sub_cat=document.getElementById('cat_sub');
  var fd = new FormData();
        var main_img = $('#main_cat_img')[0].files[0];
        var sub_img = $('#sub_cat_img')[0].files[0];
        fd.append('main',main_img);
        fd.append('sub',sub_img);
        fd.append('sub_cat',sub_cat.value);
        fd.append('main_cat',main_cat.value);
   
	
	if(main_cat.value=="")
  {
    alert("You have to enter Main Category..!!");
    main_cat.focus();
    return false;
  }
  // else if(sub_cat.value!="")
  // {
  //  if(sub_cat_img.files.length==0)
  // {
  // alert("You have to select the image for Sub Category..!!");
  //   sub_cat_img.focus();
  //   return false; 
  // } 
  // }
  
      reset_val(id);
        console.log(fd);
      load.style.display='';

         $.ajax({
            url: 'update_item_img_cat.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
             async: true,
            success: function(response){
            	alert(response);
              load.style.display='none';

              if(response=='a'){
                alert('Error..!!');
              }else if(response=='b')
              {
              	alert("Category Already Exist");
              }else{
              	refresh_cat(response);
              	show_subcat(response);
              }
               document.getElementById('main_cat_img').style.display='';
                document.getElementById('main_cat_img').value='';
                document.getElementById('output').style.display='none';
                document.getElementById('sub_cat_img').style.display='';
                document.getElementById('sub_cat_img').value='';
                document.getElementById('output2').style.display='none';
                document.getElementById('main_cat').value='';
                document.getElementById('cat_sub').value='';
                document.getElementById('imageThumb').style.display='none';
    			document.getElementById('imageThumb2').style.display='none';
          }
      });
   }
function save_brand(id) {
	var brand_title=document.getElementById('brand_title').value;

	var from_data_brand = new FormData();
        var brand_img = $('#brand_img')[0].files[0];
        from_data_brand.append('brand_img', brand_img);
        from_data_brand.append('brand_title', brand_title);
        console.log(from_data_brand);
          if(brand_title=="")
  {
    alert("You have to enter Brand..!!");
    document.getElementById('brand_title').focus();
    return false;
  }else if(document.getElementById('brand_img').files.length==0)
  {
  alert("You have to select the image for Brand..!!");
    document.getElementById('brand_img').focus();
    return false; 
  }
        load.style.display='';
  reset_val(id);
         $.ajax({
            url: 'save_brand.php',
            type: 'POST',
            data: from_data_brand,
            contentType: false,
            processData: false,
             async: true,
            success: function(response){
            	// alert(response);
              if(response==1)
              {
                load.style.display='none';
              	refresh_brand();
              	document.getElementById('brand').focus();
              	// refresh_cat();
              }else if(response==0)
              {
                load.style.display='none';
              	alert("Brand alerady exist..!!");
              }
              else{
                load.style.display='none';
              	alert('Error..!!');
              }
          }
      });

}

// function show_sub_cat(val) {
// 	// alert(val);
// 	var dataList = document.getElementById('sub_cats');

// 	$.ajax({
// 		type:'POST',
// 		url:'update_cat2.php',
// 		data:{'cat_name':val},
// 		success:function(res) {
// 			alert(res);
			
// 	}
// 	});
// }
function show_img(pos) {
      
      var files = document.getElementById(pos).files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" id=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove fa fa-times\" id=\"imageThumb2\"></span>" +"</span>").insertAfter("#"+pos);
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
}

$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove fa fa-times\"></span>" +"</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});

 function info_set_color(set_id) {
  // alert(set_id);
  color=[];
  var checkboxes = document.getElementsByName('clr'+set_id+'[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        color.push(checkboxes[i].value);
    }
}
// color_result=JSON.stringify(color);
  // alert(color);
}


function info() {
  color=[];
  var checkboxes = document.getElementsByName('clr[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        color.push(checkboxes[i].value);
    }
}
// color_result=JSON.stringify(color);
  // alert(JSON.stringify(color));
}

function count_color_size(arr,print_id) {
	// alert(arr);
	// if(arr=='clr[]')
	// {
		// info2();

 var checkboxes = document.getElementsByName(arr);
var vals = 0;
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        vals++;
    }
}
// alert(vals);
document.getElementById(print_id).value=vals;

}

function max_color_size(arr,print_id,erro) {

  var checkboxes = document.getElementsByName(arr);
var vals = 0;
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        vals++;
    }
}
// alert(erro);
if(document.getElementById(print_id).value>vals)
{
 document.getElementById(erro).innerHTML="It Should not be greater than selected..!!!";
 document.getElementById(print_id).focus();
 return false; 
}else
{
 document.getElementById(erro).innerHTML="";

}
}
function max_color_size2(arr,print_id,erro) {

  var checkboxes = document.getElementsByName(arr);
var vals = 0;
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        vals++;
    }
}
var split=print_id.split("_");
// alert(erro+split[2]);
if(document.getElementById(print_id).value>vals)
{
 document.getElementById(erro+split[2]).innerHTML="It Should not be greater than selected..!!!";
 document.getElementById(print_id).focus();
 return false; 
}else
{
 document.getElementById(erro+split[2]).innerHTML="";

}
}

function info2() {
  size=[];
  var checkboxes = document.getElementsByName('size[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        size.push(checkboxes[i].value);
    }
}
// save_data('myTable3');
// alert(JSON.stringify(size));
}
function info_set_size(set_id) {
  size=[];
  var checkboxes = document.getElementsByName('size'+set_id+'[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        size.push(checkboxes[i].value);
    }
}
// save_data('myTable3');
// alert(JSON.stringify(size));
}

function temp_att_arr() {
	// alert("Hello");
  temp_att=[];
  var checkboxes = document.getElementsByName('att[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
    	var temp=checkboxes[i].value;
    	var split=temp.split('~');
    	var val=split[0];
        temp_att.push(val);
    }
}
// alert(temp_att);
console.log(temp_att);
}
function temp_clr_arr(set_id) {
	// alert("Hello");
  temp_color=[];
  var checkboxes = document.getElementsByName('clr'+set_id+'[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        temp_color.push(checkboxes[i].value);
    }
}
// alert(temp_att);
console.log(temp_color);
}
function temp_size_arr(set_id) {
	// alert("Hello");
  temp_size=[];
  var checkboxes = document.getElementsByName('size'+set_id+'[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        temp_size.push(checkboxes[i].value);
    }
}
// alert(temp_att);
console.log(temp_size);
}
function info3() {
  att=[];
  var checkboxes = document.getElementsByName('att[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
    if (checkboxes[i].checked) 
    {
        att.push(checkboxes[i].value);
    }
}
// alert(att);
// if(att.length>0)
// {
var type="att";
var admin='<?=$admin_id?>';
var cat_id=document.getElementById('category').value;
$.ajax({
type:'POST',
url:'set_table_w.php',
data:{'att':JSON.stringify(att),'type':type,'cat_id':cat_id,'admin':admin},
success:function(res)
{
  // document.getElementById('myTable2').style.border="1px solid black";
  $('#att_btn').attr("data-dismiss","modal");
  $('#myTable2').html(res);
}
});
}
// }	

function info4() {
  set_qty=[];
  var checkboxes = document.getElementsByName('set_qty[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
        set_qty.push(checkboxes[i].value);
    
}
// alert(set_qty);
}

function info5() {
  sum_amt=[];
  var checkboxes = document.getElementsByName('sum_amt[]');
var vals = "";
for (var i=0, n=checkboxes.length;i<n;i++) 
{
        sum_amt.push(checkboxes[i].value);
    
}
// alert(sum_amt);
}



function save_data(table) {

var wsp=document.getElementById('wsp').value;
var mrp=document.getElementById('mrp').value;
var min_color=document.getElementById('min_color').value;
var min_size=document.getElementById('min_size').value;
var auto_reduce=document.getElementById('auto_reduce_val');
var min_set_order=document.getElementById('min_set_order').value;
var cate=document.getElementById('cate').value;
// var s_id='<?=$s_id?>';
var pid='<?=$pid?>';
var qty_set=0;
var qty_pcs=0;
if(auto_reduce.checked)
{
	auto_reduce_va='on';
	qty_set=document.getElementById('avail_qty_set').value;
  if(qty_set=='')
  {
    document.getElementById('avail_qty_set').focus();
    return false;
  }
	qty_pcs=document.getElementById('avail_qty_pcs').value;

}
else{
  auto_reduce_va='off';
}
if(min_set_order=='')
{
  document.getElementById('min_set_order').focus();
  return false;
}
if((color.length>0) && (size.length>0))
{
  $.ajax({
    type:'POST',
    url:'set_table_w.php',
    data:{'size':JSON.stringify(size),'color':JSON.stringify(color),'mrp':mrp,'wsp':wsp,'pid':pid,'auto_reduce_val':auto_reduce_va,'min_color':min_color,'min_size':min_size,'table':table,'sum_amt':JSON.stringify(sum_amt),'set_qty':JSON.stringify(set_qty),'qty_set':qty_set,'qty_pcs':qty_pcs,'min_set_order':min_set_order,'cate':cate},
    success:function(res) {
      // alert(res);
      $('#save_bt').attr("data-dismiss","modal");
      window.location.href="edit_prod_w.php?pid=<?=$pid?>";
      // $('#'+table).html(res);
      // $('#myTab a[href="#v-pills-category"]').tab('show');

    }
  });
}else
{
	alert("Try again..!!");
      $('#myTab a[href="#v-pills-category"]').tab('show');

}
}

function save_data2(table,set_id) {
  // alert(table);
// var split1=table.split("_");
// var set_id=split1[1];
var wsp=document.getElementById('wsp_'+set_id).value;
var mrp=document.getElementById('mrp_'+set_id).value;
var min_color=document.getElementById('min_color_'+set_id).value;
var min_size=document.getElementById('min_size_'+set_id).value;
var auto_reduce=document.getElementById('auto_reduce_val_'+set_id);
var min_set_order=document.getElementById('min_set_order_'+set_id).value;
var cate=document.getElementById('cate_'+set_id).value;
var s_id='<?=$s_id?>';
var pid='<?=$pid?>';
var qty_set=0;
var qty_pcs=0;
// alert(min_set_order);
if(auto_reduce.checked)
{
  auto_reduce_va='on';
  qty_set=document.getElementById('avail_qty_set_'+set_id).value;
  qty_pcs=document.getElementById('avail_qty_pcs_'+set_id).value;

}
else{
  auto_reduce_va='off';
}
if(min_set_order<1)
{
  alert("Minimum set to order is required..!!!");
  document.getElementById('min_set_order_'+set_id).focus();
  return false;
}
if((color.length>0) && (size.length>0))
{
  $.ajax({
    type:'POST',
    url:'set_table_w_edit.php',
    data:{'size':JSON.stringify(size),'color':JSON.stringify(color),'mrp':mrp,'wsp':wsp,'pid':pid,'auto_reduce_val':auto_reduce_va,'min_color':min_color,'min_size':min_size,'table':table,'sum_amt':JSON.stringify(sum_amt),'set_qty':JSON.stringify(set_qty),'qty_set':qty_set,'qty_pcs':qty_pcs,'min_set_order':min_set_order,'cate':cate,'set_id':set_id,'s_id':s_id},
    success:function(res) {
      // alert(res);
      $('#save_but').attr("data-dismiss","modal");
      // $('#myTab2 a[href="#v-pills-category_'+set_id+'"]').tab('show');
      window.location.href="edit_prod_w.php?pid=<?=$pid?>";
      // $('#'+table).html(res); 

    }
  });
}else
{
  alert("Try again..!!");
      $('#myTab2 a[href="#v-pills-category_'+set_id+'"]').tab('show');

}
}



function show_att(cat_id) {
var type="att"; 
var admin='<?=$admin_id?>';
// alert(cat_id);
var att_id='<?=$row['att_id']?>';
att=[];
 $('.my_categories').prop('checked',false);
 // info3();
$.ajax({
type:'POST',
url:'getdata.php',
data:{'type':type,'cat_id':cat_id,'admin':admin,'att_id':att_id},
success:function(res)
{
  // alert(res);
  $('#att').html(res);
}
});
}

function final_data(img_id) {
  
  store_img();
  var item=document.getElementById('new_id').value;
  var title=document.getElementById('title').value;
  var cat_id=document.getElementById('category').value;
  var sub_cat_id=document.getElementById('sub_category').value;
  var discount=document.getElementById('discount').value;
  var gst=document.getElementById('gst').value;
  var gst_type=document.getElementById('gst_type').value;
  var dscrpt=document.getElementById('dscrpt').value;
  var brand=document.getElementById('brand').value;
  var pid='<?=$pid?>';
  var type="add_w";
  var admin='<?=$admin_id?>';
	if (item=='')
	{
		document.getElementById('new_id').focus();
		return false;
	}else if(cat_id=='00')
	{
		document.getElementById('category').focus();
		return false;
	}
	// else if(discount=='00')
	// {
	// 	document.getElementById('discount').focus();
	// 	return false;
	// }
	else if (gst=='00') {
		document.getElementById('gst').focus();
		return false;
	}else if (gst_type=='00') {
		document.getElementById('gst_type').focus();
		return false;
	}/*else if(dscrpt=='')
	{
		document.getElementById('dscrpt').focus();
		return false;
	}*/else if(brand=='00')
	{
		document.getElementById('brand').focus();
		return false;
	}
	// else if(att.length==0)
 //  {
 //    alert("Select Attributes....!!!");
 //    return false;
 //  }
  else if((color.length==0) && ('<?=$s_id?>'==0))
  {
    alert("Create Set....!!!");
    document.getElementById('set_btn').focus();
    return false;
  }
	// {
 $.ajax({
  type:'POST',
  url:'save_item_w.php',
  data:{'item':item,'cat_id':cat_id,'discount':discount,'gst':gst,'gst_type':gst_type,'dscrpt':dscrpt,'brand':brand,'admin':admin,'att':JSON.stringify(att),'img_id':img_id,'type':type,'pid':pid,'title':title,'auto_reduce_val':auto_reduce_va,'sub_cat':sub_cat_id},
  success:function(res) {
    // alert(res);
    if(res==1)
    {
    load.style.display='none';
    window.location.href="show_prod.php";
  }else if(res==0)
  {
    load.style.display='none';
    alert("Something Went Wrong..!!!");
  }
  else{
  	alert(res+" already added in another slab");
    load.style.display='none';
  	document.getElementById('discount').focus();
  	return false;
  }
  }
});
}
// }

 var form_data = new FormData();

function store_img() {
   // Read selected files
   var img_id='<?=$row["img"]?>';
   var pid='<?=$pid?>';
   var totalfiles = document.getElementById('files').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('files').files[index]);
      form_data.append("iid",img_id);
      form_data.append("pid",pid);
   }
   console.log(form_data);
}
 function new1(){
prod = document.getElementById("new_id");
 // alert(color);
 var setid='<?=$row["set_id"]?>';
if((color=="") && (setid==0)){
    alert("Create set First");
    btnfo.focus();
    return false;
  }
    var src=[]; 
      if(document.getElementById("files").files.length == 0)
      {
        // load.style.display='';
        final_data('<?=$row["img"]?>');
      }else{
        $.ajax({
            url: 'update_item_img.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
             async: true,
            success: function(response){
              // alert(response);
              // load.style.display='';
              final_data(response);
                }
        });
      }
    }
// function show_att(cat_id) {
// var type="att"; 
// var admin='<?=$admin_id?>';
// // alert(cat_id);
// $.ajax({
// type:'POST',
// url:'edit_table.php',
// data:{'type':type,'cat_id':cat_id,'admin':admin},
// success:function(res)
// {
//   // alert(res);
//   $('#att').html(res);
// }
// });
// }
function myFunction(input) {
  // var input = document.getElementById("Search");
  var filter = input.toLowerCase();
  var nodes = document.getElementsByClassName('target');

  for (i = 0; i < nodes.length; i++) {
    if (nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "block";
    } else {
      nodes[i].style.display = "none";
    }
  }
}

function sum(str) {
 var total = 0;
 var total2 = 0;
 var new_t=0;
 var i_qty=[];
var qty = $('input[id^=sum_qty_'+str+']');
// alert(str);
var amt = $('input[id^=sum_amt_'+str+']');
   $.each($(qty), function(){
   		i_qty.push($(this).val());
      total += parseInt($(this).val());

   });
   $.each($(amt), function(i){

      total2 += ((parseInt($(this).val()))*i_qty[i]);
   });
  // var wsp=document.getElementById('wsp').value;
var new_t=total+" (in pcs)";
var new_p=(total2)+'.00/-';
   $('#total_qty_'+str).html(new_t);
   $('#total_price_'+str).html(new_p);
   document.getElementById('wsp').value=0;
   document.getElementById('mrp').value=0;
}
function delete_img(str) {
  var type="img_del";
  // alert(str);
  $.ajax({
    type:'POST',
    url:'save_item.php',
    data:{'img_url':str,'type':type},
    success:function(res) {
      // alert(res);
      window.location.href="edit_prod.php?pid=<?=$pid?>";
    }
  });
}
function disable_option(str) {
  // alert(str);
  // clr=[];
  if(str=="options1")
  {
      $("input.options1").attr("disabled", true);
      $("input.options2").removeAttr("disabled");
      $("input.options1").prop("checked", false);
      // $("input.option1").prop("checked", true);


  }else{

      $("input.options2").attr("disabled", true);
      $("input.options1").removeAttr("disabled");
      $("input.options2").prop("checked", false);
      // $("input.option2").prop("checked", true);


  }

  // document.getElementById(str).disabled="disabled";
}
function disable_option2() { 
	// alert("Hello");
      $("input.options2").removeAttr("disabled");
      $("input.options1").removeAttr("disabled");
      
}
function size_select(show1,n) {
  // alert(n);
  for (var i = 0; i <n; i++) {
 if(i==show1)
 {
 $("input.OPTION"+i).removeAttr("disabled");
 }else
  {
  $("input.OPTION"+i).attr("disabled", true);
  $("input.OPTION"+i).prop("checked", false);

}
}


}
function size_select2(show1,n) {
  // alert(n);
  for (var i = 1; i <=n; i++) {

 $("input.OPTION"+i).removeAttr("disabled");

}
size=[];

}

function save_price_table(id,val,type) {
	$.ajax({
	
		type:'POST',
		url:'update_set_price_qty.php'	,
		data:{'type':type,'id':id,'val':val},
		success:function(res) {
			alert(res);
		}
	});
}
function save_myTable3() {
	var type="view";
	var s_id='<?=$s_id?>';
	$.ajax({
		type:'POST',
		url:'update_set_price_qty.php',
		data:{'s_id':s_id,'type':type},
		success:function(res) {
			$('#myTable3').html(res);
		}
	})	
}
function uncheck() {
  var auto_reduce=document.getElementById('auto_reduce_val');
        $('#'+auto_reduce).prop('checked',false);
}
$('[data-dismiss=modal]').on('click', function (e) {
    var $t = $(this),
        target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];
    
  $(target)
    .find("input[type=text],textarea,input[type=number],input[type=search]")
       .val('')
       .end()
       .find("img[id=output],img[id=output2]")
       .prop("src","")
       .end()
    .find("select")
       .val('00')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
      
      $('#myTab a[href="#v-pills-category"]').tab('show');
    
    // document.getElementById('main_cat_img').style.display='';
    // document.getElementById('output').style.display='none';
    // document.getElementById('imageThumb').style.display='none';
    // document.getElementById('imageThumb2').style.display='none';
    // document.getElementById('output2').style.display='none';
    // document.getElementById('output2').src='';
    // document.getElementById('sub_cat_img').style.display='';
    document.getElementById('main_cat_img').style.display='';
                document.getElementById('main_cat_img').value='';
                document.getElementById('output').style.display='none';
                document.getElementById('sub_cat_img').style.display='';
                document.getElementById('sub_cat_img').value='';
                document.getElementById('output2').style.display='none';
                document.getElementById('main_cat').value='';
                document.getElementById('cat_sub').value='';
                document.getElementById('imageThumb').style.display='none';
    			document.getElementById('imageThumb2').style.display='none';
    
    // }
  var str='';
  myFunction(str);
});

function reset_val(id) {
  // alert(id);
  var split1=id.split("_");
  var set_id=split1[1];
  $('#'+id).attr("data-dismiss","modal");
  $('#myTab2 a[href="#v-pills-category_'+set_id+'"]').tab('show');

}
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
  });
$('#clear1').click(function() {
  $('#input-outer input').val('');
  // document.getElementById('Search').value='';
  var str='';
  myFunction(str);
});

function step_qty(qty,val,id) {
	// alert(val%qty);
	if((val % qty)!=0)
	{
		document.getElementById(id).innerHTML="Qty should be multiple of "+qty;
		document.getElementById(id).focus();
		
	}else{
		document.getElementById(id).innerHTML="";
	}
}
</script>
<?php
  include ('include/footer.php');
?>