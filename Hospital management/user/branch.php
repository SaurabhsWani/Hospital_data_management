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
  <!-- for adding a branch -->
  <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Branch </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="branchcon.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label> Branch Name </label>
              <input type="text" name="bn" class="form-control" placeholder="Branch Name" required="">
            </div>
            <div class="form-group">
              <label>Cost Per Patient</label>
              <input type="number" name="cpp" class="form-control" placeholder="Cost Per Patient" required="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addbr" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- for adding a branch end-->
  <!-- for editing a branch -->
  <?php
  $query="SELECT * FROM branch";
  $sql=mysqli_query($connection,$query);
  if (mysqli_num_rows($sql)>0) {
    while ($row=mysqli_fetch_assoc($sql)) {
      ?>
      <div class="modal fade" id='<?php echo "ss".$row['id'];?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Branch </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="branchcon.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label> Branch Name </label>
                  <input type="hidden" name="id" value="<?php echo $row['id']?>" class="form-control" >
                  <input type="text" name="bn" class="form-control" placeholder="Branch Name" value='<?php echo $row['name'];?>'>
                </div>
                <div class="form-group">
                  <label>Cost Per Patient</label>
                  <input type="number" name="cpp" class="form-control" placeholder="Cost Per Patient" value='<?php echo $row['cpp'];?>'>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="edit_br" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php
    }
  }
  ?>
  <!-- for editing a branch end-->
  <div class="row "> 
    <div class="col-md-12">
     <div class="card">
      <div class="card bg-info-gradient">
        <div class="card-header bubble-shadow">
          <h4 class="card-title" style="color: white">Branches</h4>
        </div>
        <button <?php echo $dsblan;?> type="button" class="btn " data-toggle="modal" data-target="#addadminprofile"><i class="fa fa-plus-square"></i> Add New Branch
        </button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="basic-datatables" class="display table table-striped table-hover" >
            <thead>
              <tr>
                <th>ID</th>
                <th>Name of Branch</th>
                <th>Cost Per Patient</th>
                <th>Created By</th>
                <th>Edited By</th>
                <th>EDIT</th>
                <th>DELETE</th>
              </tr>
            </thead>            
            <tbody>
              <?php
              $query="SELECT * FROM branch";
              $sql=mysqli_query($connection,$query);
              if (mysqli_num_rows($sql)>0) {
                while ($row=mysqli_fetch_assoc($sql)) {
                  ?>
                  <tr>
                    <td><?php echo $row['id'];?> </td>
                    <td><?php echo $row['name'];?> </td>
                    <td><?php echo $row['cpp'];?> </td>
                    <td><?php echo $row['createdby'];?></td>
                    <td><?php echo $row['editedby'];?></td>
                    <td>
                      <button <?php echo $dsblea;?> type="submit" name="edit_br" value="edit" class="btn btn-icon btn-round btn-xs" data-toggle="modal" data-target='<?php echo "#ss".$row['id'];?>' >
                        <i class="fa fa-edit"></i>
                      </button>
                    </td>
                    <td>
                      <form action="branchcon.php" method="post">
                        <input type="hidden" name="del_id" value='<?php echo $row['id'];?>'>
                        <button <?php echo $dsblda;?> type="submit" name="del_br" class="btn btn-icon btn-round btn-xs"><i class="fas fa-trash"></i></button>
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