<?php
include '../includes/connect.php';

echo '<div class="card-row" style="margin-top: 10px;">';
        $query=mysqli_query($con,"SELECT users.name as uname,items.name as name,order_details.quantity as qty,order_details.remark,order_details.order_id as order_id,tables.tables_no as table_no,orders.date as `date`,order_details.id as id,orders.description as description,order_details.status as status FROM `orders` LEFT JOIN order_details on order_details.order_id=orders.order_id LEFT JOIN items ON items.id=order_details.item_id LEFT JOIN tables on orders.table_no = tables.id LEFT JOIN users on orders.waiter_id = users.id WHERE (order_details.status='Pending' or order_details.status='Preparing') Order by order_details.id asc");
        while ($row=mysqli_fetch_array($query)) {
      echo '<div class="column">';
                  if($row['status']=='Preparing')
                  {
                    $class1='background-color:lightblue';

                  }elseif($row['status']=='Pending'){
                    $class1='background-color:lightyellow';
                    
                  }
        echo '<div class="card1 card_'.$row['id'].'" style="'.$class1.'">
          <div class="card-header card_'.$row['id'].'">
          <b >';$sn++; 
          echo ' '.$sn.'</b><br>
            <h5><b>Table No:</b> '.$row['table_no'].'</h5>
            <h6><b>Order No:</b> '.$row['order_id'].'</h6>
            <h6><b>Waiter:</b> '.$row['uname'].'</h6>
          </div>
          <div class="card-body">
            
              <div class="row">
                <div class="col-md-12">
                  <table class="table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th>Qty</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#</td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['qty'].'</td>
                </tr>
              </tbody>
            </table>
                </div>
              </div>';
            
              if(!empty($row['remark'])){
              echo '<div class="row1">
                <div class="col-md-12">

                  <span class="popup" onclick="myFunction('.$row['id'].')"><input type="text" name="" style="text-align: center;" value="'. $row['remark'].'" readonly>

                  <p class="popuptext" id="myPopup_'.$row['id'].'">'.$row['remark'].'</p>
                </span>
                </div>
              </div>';
             $style='margin-top: 00px;margin-bottom:20px;';}else{$style='margin-top: 00px;';}
              echo '<div class="row" style="'.$style.'">
                <div class="col-md-12">';
                  if($row['status']=='Preparing')
                  {
                    $class='btn-info';

                  }else{
                    $class='btn-warning';
                  }
                  echo '<button class="btn '.$class.' form-control" style="bottom: 0;" type="button" id="card-btn_'.$row['id'].'" onclick="change_status(this.id,\'card_'.$row['id'].'\',this.value,'.$row['order_id'].')" value="'.$row['status'].'">'.$row['status'].'
                  </button>
                </div>
              </div>
            
          </div>
        </div>
      </div>';
      }
      echo '</div>';

      ?>