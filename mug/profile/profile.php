
<script src="/assets/vendor/sweetalert/sweetalert.js"></script>
<div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../dashbord/"><i class="bi bi-house"></i> Home</a></li>
        <li class="breadcrumb-item active" style="background: none;" aria-current="page">Profile</li>
      </ol>
    </nav>
  </div>
          
    <div>
        <div>
            <h3 class="text-center display-1">
                <form id="profile_pic_form" method="post" enctype="multipart/form-data" action="">
                     <label id="profile_pic_label" class=" position-relative my-auto" for="profile_pic">
                        <!-- load by ajax profile pic -->
                    </label>
                   
                    
              
                    <input required hidden onchange="profile_pic_uploaded()" id="profile_pic" type="file" name="profile_pic">
                    <input hidden id="sub_btn_pic" type="submit" name="submit">
                    <!-- this user type need idendity user -->
                    <input type="text" name="user_type" hidden  value="<?=$user_type;?>">
                </form>
                
            </h3>
            <p class="text-center">You can update your Account.</p>
          <form id="update_profile" method="post" enctype="multipart/form-data" action="">
            <div class="profile_display">
                <!-- load by ajax -->
            </div>
            <div class="success_update">
                <!-- load by ajax response -->
            </div>
            
             <input  required type="checkbox" id="check" name="agree">
            <label for="check">  Are you agree Terms and condition</label>    

             <!-- this user type need idendity user -->
                <input type="text" name="user_type" hidden  value="<?=$user_type;?>">
            <button class="btn btn-warning float-right btn-sm btn-icon-split" type="submit" placeholder="submit" name="submit" value="Submit">
                <span class="icon text-white-50"><i class="bi bi-cloud-arrow-up-fill mr-2"></i></span>
                <span class="text">Update</span> 
            </button>

            </form>
        </div>
    </div>



<script type="text/javascript">
    function profile_display(){
        $.ajax({
            type:'post',
            data:{
                'user_type':'<?=$user_type;?>',
            },
            url:'update_display.php',
            success:function(data) {
                $('.profile_display').html(data);
            }
        })
    }
    profile_display();

    $('#update_profile').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:'update.php',
            processData:false,
            contentType:false,
            data:new FormData(this),
            
            success:function(data) {
                $('.success_update').html(data);
                profile_display();
            }
        })
    })
    function display_profile_pic(){
        $.ajax({
            type:'post',
            url:'profile_pic.php',
             data:{
                'user_type':'<?=$user_type;?>',
            },
            success:function(data){
                $('#profile_pic_label').html(data);
            }
        })
    }
    display_profile_pic()

    function profile_pic_uploaded() {
        $('#sub_btn_pic').click();
    }
    $('#profile_pic_form').on('submit',function(e){
        e.preventDefault();
        //var form=
        $.ajax({
            type:'POST',
            url:'profile_pic_upload.php',
            processData:false,
            contentType:false,
            data:new FormData(this),
            success:function(data) {
                $('.success_update').html(data);
                display_profile_pic()
            }
        })
    })
   
</script>  

    
