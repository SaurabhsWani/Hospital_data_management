<?php
include('header.php');
include('navbar.php');
$id=$_SESSION['id'];
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
  <div class="row ">     
    <div class="col-md-12">
     <div class="card">
      <div class="card bg-info-gradient">
        <div class="card-header bubble-shadow">
          <h4 class="card-title" style="color: white">Patients</h4>
        </div>
      </div>
      <div class="card-body">
        <form action="patientcon.php" method="post">
          <div class="row">
            <div class="col-md-6 col-lg-4">            
              <div class="form-group">
                <label >Name of Patient</label>
                <input type="text" name="pn" class="form-control" id="email2" placeholder="Enter Full Name" required="">
              </div> 
              <div class="form-check">
                <label>Gender</label><br/>
                <label class="form-radio-label">
                  <input class="form-radio-input" type="radio" name="pg" required="" value="M"  checked="">
                  <span class="form-radio-sign">Male</span>
                </label>
                <label class="form-radio-label ml-3">
                  <input class="form-radio-input" type="radio" name="pg" required="" value="F">
                  <span class="form-radio-sign">Female</span>
                </label>
              </div>  
            </div>
            <div class="col-md-6 col-lg-4">     
              <div class="form-group">
                <label >Cost Per Patient</label>
                <?php 
                $brn=$_SESSION['br'];
                $queryc="SELECT * FROM branch WHERE name='$brn' LIMIT 1";
                $sqlc=mysqli_query($connection,$queryc);
                if (mysqli_num_rows($sqlc) > 0) {
                  while ($rowc=mysqli_fetch_assoc($sqlc)) {
                    ?>
                    <input type="text" name="pcpp" class="form-control" id="email2" placeholder="Enter Email" value='<?php echo $rowc['cpp'];?>' required="">
                  <?php } } ?>
                </div>  
                <div class="form-group">
                  <label >Age</label>
                  <input type="number" name="pa" class="form-control" id="email2" placeholder="Enter Age" required="">
                </div> 
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label>Date Of Birth</label>
                  <input class="form-control " name="pdob" id="email2" type="date"  placeholder="00-00-0000" style="color: black">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary " name="addpt" onclick="passvalue();">Add Patient</button>
          </form><hr>
          <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Created By</th>
                  <th>Name of Patient</th>
                  <th>Cost Per Patient</th>
                  <th>DOB</th>
                  <th>AGE</th>
                  <th>Gender</th>
                </tr>
              </thead>            
              <tbody>
                <?php
                $query="SELECT * FROM patient WHERE createdby='$id'";
                $sql=mysqli_query($connection,$query);
                if (mysqli_num_rows($sql)>0) {
                  while ($row=mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr>
                <td><?php echo $row['id'];?> </td>
                      <td><?php echo $_SESSION['fn'];?></td>
                      <td><?php echo $row['name'];?> </td>
                      <td><?php echo $row['pcpp'];?> </td>
                      <td><?php echo $row['dob'];?> </td>
                      <td><?php echo $row['age'];?> </td>
                      <td><?php echo $row['gender'];?> </td>
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