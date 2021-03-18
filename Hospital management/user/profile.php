<?php
include('header.php');
include('navbar.php');
?>
<div class="page-inner mt--5">
  <br><br>
  <?php
  if (isset($_SESSION['Success'])&&$_SESSION['Success']!='') {
    echo'<div class="alert alert-success" role="alert">'.$_SESSION['Success'].'</div>';
    unset($_SESSION['Success']);
  }
  if (isset($_SESSION['Status'])&&$_SESSION['Status']!='') {
    echo'<div class="alert alert-danger" role="alert">'.$_SESSION['Status'].'</div>';
    unset($_SESSION['Status']);
  }
  $id=$_SESSION['id'];
  $query="SELECT * FROM $role WHERE id='$id' ";
  $sql=mysqli_query($connection,$query);
  foreach($sql as $row ) {
    ?>
    <div class="row">
      <div class="col-md-9 ml-auto mr-auto">
        <div class="card card-round">
          <div class="card-body">
            <div class="card-title fw-mediumbold">Edit Profile</div>
            <div class="card-list">
              <form action="usrupd.php"  method="post" enctype="multipart/form-data">
                <div class="item-list">
                  <div class="avatar">
                    <?php echo "<div id='img_div'><img src='../image/".$row['image']."' width=100px;height=100px; class='avatar-img rounded-circle'></div>";?>
                  </div>
                  <div class="info-user ml-3">
                    <div class="form-group">            
                      <div class="username">
                        <input type="file" name="adimg" id="adimg" class="form-control" value="ssw" required="">
                      </div>
                      <div class="status">Upload Photo</div>            
                    </div>
                  </div>
                  &emsp;<button type="submit" name="updp" class="btn btn-icon btn-secondary btn-round btn-xs" title="Update Photo">
                    <i class="fa fa-check"></i>
                  </button>
                </div>
              </form>
              <form action="usrupd.php"  method="post">
                <div class="item-list">                          
              <div class="avatar" title="Name">                
                <div class="input-group-append">
                 <span  class="btn btn-info text-white px-4 py-2">
                  <i class="fas fa-user"></i>
                </span>
              </div>               
                </div>
                  <div class="info-user ml-3">
                    <div class="form-group">
                      <div class="username">
                        <input type="text" name="First_Name" value="<?php echo $row['name'];?>" class="form-control" required="">
                      </div>
                      <div class="status">Full name</div>
                    </div>
                  </div>
                  &emsp;<button class="btn btn-icon btn-secondary btn-round btn-xs" type="submit" name="updfn" title="Update Name">
                  <i class="fa fa-check"></i>
                </button>
              </div>
            </form> 
            <?php if($role!="admin"){ ?> 
            <form method="post">
                <div class="item-list">                          
              <div class="avatar" title="Branch">                
                <div class="input-group-append">
                 <span  class="btn btn-info text-white px-4 py-2">
                  <i class="fas fa-code-branch"></i>
                </span>
              </div>               
                </div>
                  <div class="info-user ml-3">
                    <div class="form-group">
                      <div class="username">
                        <input type="text" name="branch" value="<?php echo $row['branch'];?>" disabled class="form-control" required="">
                      </div>
                      <div class="status">Branch</div>
                    </div>
                  </div>
                  &emsp;<button class="btn btn-icon btn-secondary btn-round btn-xs" type="submit" name="updfn" title="Update Name">
                  <i class="fa fa-check"></i>
                </button>
              </div>
            </form>
          <?php } ?>
            <form action="usrupd.php"  method="post" enctype="multipart/form-data">
              <div class="item-list">                           
              <div class="avatar" title="Email">                
                <div class="input-group-append">
                 <span  class="btn btn-info text-white px-4 py-2">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>               
                </div>
                <div class="info-user ml-3">
                  <div class="form-group">
                    <div class="username">
                      <input type="hidden" name="Email2" value="<?php echo $row['email']?>" class="form-control" required="">
                      <input type="email" name="Email" value="<?php echo $row['email']?>" class="form-control" required="">
                    </div>
                    <div class="status">Email</div>
                  </div>
                </div>
                &emsp;<button class="btn btn-icon btn-secondary btn-round btn-xs" type="submit" 
                name="updeml" title="Update Email">
                <i class="fa fa-check"></i>
              </button>
            </div>
          </form>
          <form action="usrupd.php"  method="post" enctype="multipart/form-data">
            <div class="item-list">            
              <div class="avatar" title="Password">
                <div class="input-group-append">
                 <span  class="btn btn-info text-white px-4 py-2" onclick="myFunction()">
                  <i class="icon-eye"></i>
                </span>
              </div>
            </div>
            <div class="info-user ml-3">
              <div class="form-group">
                <div class="username"><input type="password" name="Password" id="ip" value="<?php echo $row['password']?>" class="form-control" required="">
                </div>
                <div class="status">Password</div>
              </div>
            </div>
            &emsp;<button class="btn btn-icon btn-secondary btn-round btn-xs" type="submit"
            name="updpd" title="Update password">
            <i class="fa fa-check"></i>
          </button>
        </div>
      </form>
      <form action="usrupd.php"  method="post" enctype="multipart/form-data">
            <div class="item-list">                          
              <div class="avatar" title="Mobile Number">                
                <div class="input-group-append">
                 <span  class="btn btn-info text-white px-4 py-2">
                  <i class="fas fa-mobile-alt"></i>
                </span>
              </div>               
                </div>
            <div class="info-user ml-3">
              <div class="form-group">
                <div class="username"><input type="mobile" pattern="[0-9]{10}" name="mono" value="<?php echo $row['mono']?>" class="form-control" required="">
                </div>
                <div class="status">Mobile No.</div>
              </div>
            </div>
            &emsp;<button class="btn btn-icon btn-secondary btn-round btn-xs" type="submit"
            name="updmn" title="Update Mobile Number">
            <i class="fa fa-check"></i>
          </button>
        </div>
      </form>
        <!-- <form action="del.php"  method="post" enctype="multipart/form-data">        
          <div class="item-list">           
            <div class="avatar" title="Delete Account">
              <div class="input-group-append">
               <span  class="btn btn-info text-white px-4 py-2" onclick="myFunction1()">
                <i class="icon-eye"></i>
              </span>
            </div>
          </div>
          <div class="info-user ml-3">
            <div class="form-group">
              <div class="username"><input type="password" name="Pddel" id="ip1"  class="form-control" required="">
              </div>
              <div class="status">Delete My Account (Enter The Password)</div>
            </div>
          </div>
          &emsp;<button class="btn btn-icon btn-danger btn-round btn-xs" type="submit" 
          name="delac" title="Delete Account">
          <i class="fa fa-check"></i>
        </button>
      </div>
    </form>  -->
  </div>
</div>
</div>
</div>
</div>
<?php } ?>
<script>
  function myFunction() {
    var x = document.getElementById("ip");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  function myFunction1() {
    var x = document.getElementById("ip1");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
</div>
</div>
</div>
<?php
include('script.php');
?>