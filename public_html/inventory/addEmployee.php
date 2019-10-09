<?php
session_start();
if( !$_SESSION['user_id'] ){
    header('location: login.php');
}
include 'inc/header/header.php'; ?>

<!-- Main Start -->
<style>
form#addNewClientForm .input-group.mt-4 {
    display: flex;
    flex-direction: row;
    direction: ltr;
}

form#addNewClientForm .input-group.mt-4 input {
    order: 2;
}

form#addNewClientForm label {
    order: 3;
    width: 100%;
}

.input-group-append {
    order: 2;
}
.col-md-6.col-12 .input-group.mt-4 input.form-control {
    order: 2;
}

.col-md-6.col-12 .input-group.mt-4 label {
    display: block;
    width: 100%;
    order: 3;
    color: red;
}
div#adminOption-Wrapper {
    display: flex;
    width: 100%;
    justify-content: center;
    /* flex-direction: row; */
}

select#adminOption {
    /* max-width: 100%; */
    /* width: 100%; */
    width: 80%;
}

.input-group-append {
    /* width: 100%; */
}
</style>
<main class="page-content" id="addEmploeyee">
    <div class="container-fluid">
    <div class="row" id="page-title">
            <div class="col-12">
                <h1>הוספת עובד חדש</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
       
        <div class="container">
            <div class="row border-bottom pb-3">
                <div class="col-12">
                    <a href="employee.php" class="btn btn-primary">חזרה לרשימת העובדים <span><i class="fas fa-arrow-left"></i></span></a>
                </div>
            </div>
            <div class="row" id="addEmploeyee-Wrapper">
                <div class="col-12">
                    <form method="post" action="handle/handleAddEmploeyee.php" id="addEmploeyeeForm" class="row text-right">
                        <div class="col-md-6 col-12">
                        <div class="input-group mt-4" style="direction: ltr;">
                            
                            <input id="userName" type="text" class="form-control" name="userName">
                            <div class="input-group-append">
                                <span class="input-group-text">שם משתמש:</span>
                            </div>
                        </div> 
                        <div class="input-group mt-4" style="direction: ltr;">
                            
                            <input id="password" type="password" class="form-control" name="password">
                            <div class="input-group-append">
                                <span class="input-group-text">סיסמה:</span>
                            </div>
                        </div> 
                            <div class="input-group mt-4" style="direction: ltr;">
                            
                                <input id="first_name" type="text" class="form-control" name="fullName">
                                <div class="input-group-append">
                                    <span class="input-group-text">שם מלא *</span>
                                </div>
                            </div> 
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="phone" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">טלפון *</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="email" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">אימייל</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="seniority" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">ותק</span>
                                </div>
                            </div>
                          
                        </div>
                        <div class="col-md-6 col-12">
                        <div class="input-group mt-4" style="direction: ltr;">
                                <input name="identity" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">ת.זהות *</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="address" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">כתובת</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="startDate" type="date" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">תאריך תחילת העסקה</span>
                                </div>
                            </div>
                        <div class="input-group mt-4" style="direction: ltr;">
                                <input name="speciality" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">התמחות</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;" id="adminOption-Wrapper">
                               <select name="admin" id="adminOption">
                                   <option value="true">כן</option>
                                   <option value="false">לא</option>
                               </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">אדמין</span>
                                </div>
                            </div>
                         
                            <div class="form-group mt-4">
                                <input id="addNewClient" class="form-control btn btn-success" type="submit" name="addNewClient" value="הוספת לקוח חדש">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    

    </div>

</main>

<!-- Main End -->

<?php include 'inc/footer/footer.php'; ?>

<script>
  
   $("#addEmploeyeeForm").validate(
      {
        rules: 
        {
            fullName: 
          {
            required: true
          },
          phone:{
            required: true
          },
          email:{
            required: true
          },
          identity:{
            required: true
          }
          
        },
        messages: 
        {
            fullName: 
          {
            required: "אנא רשמו שם מלא"
          },
          phone: 
          {
            required:"אנא רשמו מספר טלפון תקני"
          },
          email:{
            required: "אנא רשמו אימייל תקני"
          },
          identity:{
            required: "אנא רשמו תהודת זהות תקנית"
          }
        },
        submitHandler: function(form) {
          
            var datastring = $("#addEmploeyeeForm").serialize();
    

    $.ajax({
        type: "post",
        url: "handle/handleAddEmploeyee.php",
        data: datastring,
        success: function (response) {
            Swal.fire(
            'עובד חדש נוצר!',
            'אתם מועברים לדף עובדים',
            'success'
            ).then(function() {
                 window.location = "employee.php";
});
        }
        
    }); 
        }
      }); 
 
/* $('#addNewClientForm').submit(function(e){
    
    e.preventDefault();
    var datastring = $("#addNewClientForm").serialize();
    

    $.ajax({
        type: "post",
        url: "handle.php",
        data: datastring,
        success: function (response) {
            Swal.fire('Oops...', 'Something went wrong!', 'error')
        }
    }); 
}) */
</script>