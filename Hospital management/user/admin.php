<?php
include('header.php');
include('navbar.php');
if($role=='admin')
{
$dsblan=($an=="YES")?" ":"disabled";
$dsblea=($ea=="YES")?" ":"disabled";
$dsblda=($an=="YES")?" ":"disabled";
}else{$dsblan=$dsblea=$dsblda="disabled";}
?>
<div class="page-inner ">
  <?php
  if (isset($_SESSION['Success'])&&$_SESSION['Success']!='') {
    echo'<div class="alert alert-success" role="alert">'.$_SESSION['Success'].'</div>';
    unset($_SESSION['Success']);
  }
  if (isset($_SESSION['Status'])&&$_SESSION['Status']!='') {
    echo'<div class="alert alert-danger" role="alert">'.$_SESSION['Status'].'</div>';
    unset($_SESSION['Status']);
  }
  ?> 
  <!-- for adding a admin -->
  <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="admincon.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label> Name </label>
              <input type="text" name="an" class="form-control" placeholder="Name" required="">
            </div>
            <div class="form-group">
              <label class="form-label">New Admin Can</label><br>
              <div class="selectgroup selectgroup-pills">
                <!-- <label class="selectgroup-item">
                  <input type="checkbox" name="value" value="EA" class="selectgroup-input" >
                  <span class="selectgroup-button">Edit All</span>
                </label>
                <label class="selectgroup-item">
                  <input type="checkbox" name="value" value="DA" class="selectgroup-input">
                  <span class="selectgroup-button">Delete All</span>
                </label>
                <label class="selectgroup-item">
                  <input type="checkbox" name="value" value="AN" class="selectgroup-input">
                  <span class="selectgroup-button">Add New Member</span>
                </label> -->
                <label class="selectgroup-item">
                  <input type="radio" name="AA" value="NO" class="selectgroup-input" checked="">
                  <span class="selectgroup-button">Only Keep Watch</span>
                </label>
                <label class="selectgroup-item">
                  <input type="radio" name="AA" value="YES" class="selectgroup-input" >
                  <span class="selectgroup-button">Do All Activity</span>
                </label>
              </div>
            </div>
            <div class="form-group">
              <label> Email</label>
              <input type="email" name="ae" class="form-control" placeholder="Email" required="">
            </div>
            <div class="form-group">
              <label> Contact Number</label>
              <input type="mobile" pattern="[0-9]{10}" name="amn" class="form-control" placeholder="Contact Number" required="">
            </div>
            <div class="form-check">
              <label>Gender</label><br/>
              <label class="form-radio-label">
                <input class="form-radio-input" type="radio" name="ag" value="M" required=""  checked="">
                <span class="form-radio-sign">Male</span>
              </label>
              <label class="form-radio-label ml-3">
                <input class="form-radio-input" type="radio" name="ag" required="" value="F">
                <span class="form-radio-sign">Female</span>
              </label>
            </div>
          </div>
          <div class="form-group">
            <label> Password</label>
            <input type="password" name="ap" class="form-control" placeholder="Password" required="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addad" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- for adding a admin end-->
  <!-- for editing a admin -->
  <?php
  $query="SELECT * FROM admin";
  $sql=mysqli_query($connection,$query);
  if (mysqli_num_rows($sql)>0) {
    while ($row=mysqli_fetch_assoc($sql)) {
      ?>
      <div class="modal fade" id='<?php echo "ss".$row['id'];?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="admincon.php" method="POST" enctype="multipart/form-data"><div class="modal-body">
              <div class="form-group">
                <label> Name </label>
                <input type="hidden" name="id" value="<?php echo $row['id']?>" class="form-control" >
                <input type="text" name="an" class="form-control" placeholder="Name"value='<?php echo $row['name'];?>' >
              </div>
            <div class="form-group">
              <label class="form-label">New Admin Can</label><br>
              <div class="selectgroup selectgroup-pills">
                <!-- <label class="selectgroup-item">
                  <input type="checkbox" name="value" value="EA" class="selectgroup-input" >
                  <span class="selectgroup-button">Edit All</span>
                </label>
                <label class="selectgroup-item">
                  <input type="checkbox" name="value" value="DA" class="selectgroup-input">
                  <span class="selectgroup-button">Delete All</span>
                </label>
                <label class="selectgroup-item">
                  <input type="checkbox" name="value" value="AN" class="selectgroup-input">
                  <span class="selectgroup-button">Add New Member</span>
                </label> -->
                <label class="selectgroup-item">
                  <input type="radio" name="AA" value="NO" class="selectgroup-input" checked="">
                  <span class="selectgroup-button">Only Keep Watch</span>
                </label>
                <label class="selectgroup-item">
                  <input type="radio" name="AA" value="YES" class="selectgroup-input" >
                  <span class="selectgroup-button">Do All Activity</span>
                </label>
              </div>
            </div>
              <div class="form-group">
                <label> Email</label>
                <input type="hidden" name="ae2" class="form-control" placeholder="Email"value='<?php echo $row['email'];?>'>
                <input type="email" name="ae" class="form-control" placeholder="Email"value='<?php echo $row['email'];?>'>
              </div>
              <div class="form-group">
                <label> Password</label>
                <input type="password" name="ap" class="form-control" placeholder="Password"value='<?php echo $row['password'];?>'>
              </div>
              <div class="form-group">
                <label> Contact Number</label>
                <input type="mobile" pattern="[0-9]{10}" name="amn" class="form-control" placeholder="Contact Number"value='<?php echo $row['mono'];?>'>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="edit_ad" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
  }
}
?>
<!-- for editing a admin end-->
<div class="row ">
  <div class="col-md-12">
   <div class="card">
    <div class="card card-default">
      <div class="card-header bubble-shadow">
        <h4 class="card-title" style="color: white">Admin</h4>
      </div>
      <button <?php echo $dsblan;?> type="button" class="btn" data-toggle="modal" data-target="#addadminprofile">
       <i class="fa fa-plus-square"></i> Add New Admin
     </button>
   </div>
   <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="display table table-striped table-hover" >
        <thead>
          <tr>
            <th>ID</th>
            <th>Profile</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Created By</th>
            <th>Edited By</th>
            <th>EDIT</th>
            <th>DELETE</th>
          </tr>
        </thead>            
        <tbody>
          <?php
          $query="SELECT * FROM admin";
          $sql=mysqli_query($connection,$query);
          if (mysqli_num_rows($sql)>0) {
            while ($row=mysqli_fetch_assoc($sql)) {
              ?>
              <tr>
                <td><?php echo $row['id'];?> </td>
                <td> 
                  <?php 
                  if($row['status']=='on'){ 
                    echo "
                    <div class='avatar avatar-online'>
                    <img src='../image/".$row['image']."' width=70px;height=70px; class='avatar-img rounded-circle'>
                    </div>";                        
                  }
                  else
                  {
                    echo "
                    <div class='avatar avatar-offline'>
                    <img src='../image/".$row['image']."' width=70px;height=70px; class='avatar-img rounded-circle'>
                    </div>
                    ";
                  }
                  ?>
                </td>
                <td><?php echo $row['name']."(".$row['gender'].")";?> </td>
                <td><?php echo $row['email'];?> </td>
                <td><?php echo $row['mono'];?> </td>
                <td><?php echo $row['createdby'];?></td>
                <td><?php echo $row['editedby'];?></td>
                <td> 
                  <button <?php echo $dsblea;?> type="submit" name="edit_dr" value="edit" class="btn btn-icon btn-round btn-xs" data-toggle="modal" data-target='<?php echo "#ss".$row['id'];?>' >
                    <i class="fa fa-edit"></i></button>
                  </td>
                  <td>
                    <form action="admincon.php" method="post">
                      <input type="hidden" name="del_id" value='<?php echo $row['id'];?>'>
                      <button <?php echo $dsblda;?> type="submit" name="del_ad" class="btn btn-icon btn-round btn-xs"><i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              <?php         }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>    
</div>      
</div>
</div> 
</div>
</div>
</div> 
<?php
include('script.php');
?>
<script src="table.js"></script>