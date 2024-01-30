    <?php 

      if(file_exists('../../conection/index.php')){
         require_once '../../conection/index.php';
      }

    if (isset($_POST['user_type'])) {
            $user_type=$_POST['user_type'];
          }      
     
    	
   
      
        $slect_ad=mysqli_fetch_assoc($con->query("SELECT * FROM `admin_user` WHERE `email`='$user_type'"));
        $name=$slect_ad['name'];
        $phone=$slect_ad['phone'];
        $email=$slect_ad['email'];
        $description=$slect_ad['description'];
        $control=$slect_ad['control']; 
            
     ?>
<!-- Begin Page Content -->


            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-md-6">
                    <!-- name -->
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle mr-2"></i> Name</span>
                      </div>
                     <input value="<?php if(isset($name)){echo $name;} ?>" required class="form-control" type="text" placeholder="Name" name="name">
                    </div>
                    <!-- end name -->

                    <!-- email -->
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope mr-2"></i> Email</span>
                      </div>
                     <input required class="form-control" type="email" disabled placeholder="Email" value="<?php if(isset($email)){echo $email;} ?>" name="email">
                    </div>
                    <!-- end email -->
              
                    <!-- type -->
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-fonts mr-2"></i> Type of admin</span>
                          </div>
                          <select disabled required class="form-control" >
                            <option value="full"><?php if(isset($control)){echo $control;} ?></option>
                            
                        </select>
                        <input hidden required value="<?php if(isset($control)){echo $control;} ?>" name="control">
                      </div>
                      <!-- end type -->
                </div>
                <!-- end col -->

                <!-- col -->
                <div class="col-md-6">
                    <!-- phone -->
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-phone mr-2"></i> Phone: +88</span>
                      </div>
                     <input value="<?php if(isset($phone)){echo $phone;} ?>" required class="form-control" type="number" placeholder="phone" name="phone">
                    </div>
                <!-- end  phone-->
                
                <!-- pass -->
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill mr-2"></i>Password</span>
                  </div>
                 <input required class="form-control" type="password" placeholder="Enter you Password" name="password">
                </div>
                <!-- pass -->

                <!-- cpass -->
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill mr-2"></i>Re Type Password</span>
                  </div>
                  <input required class="form-control" type="password" placeholder="Confirm password" name="c_password">
                </div>
                <!-- c pass -->              
                </div>
                <!-- end col -->

                <!-- start col -->
                <div class="col-md-12">
                    <!-- description -->
                     <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-fonts mr-2"></i>Description</span>
                      </div>
                      <textarea  placeholder="please tell something about you" required class="form-control" rows="5" name="description"><?php if(isset($description)){echo $description;} ?></textarea>
                    </div>
                    <!-- description -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
                
    