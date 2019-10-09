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
</style>
<main class="page-content">
    <div class="container-fluid">
        <div class="row" id="page-title">
            <div class="col-12">
                <h1>הוספת לקוח חדש</h1>
            </div>
        </div>
        <div class="container">
            <div class="row" id="addNewClient-Wrapper">
                <div class="col-12">
                    <form method="post" action="" id="addNewClientForm" class="row text-right">
                        <div class="col-md-6 col-12">
                            <div class="input-group mt-4" style="direction: ltr;">
                            
                                <input id="first_name" type="text" class="form-control" name="firstName">
                                <div class="input-group-append">
                                    <span class="input-group-text">שם פרטי *</span>
                                </div>
                            </div> 
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="lastName" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">שם משפחה *</span>
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
                                <input name="carNumber" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">מ.רכב *</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">


                        <div class="input-group mt-4" style="direction: ltr;">
                                <input name="manufacture" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">יצרן *</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="model" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">דגם *</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="engine" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">נפח מנוע</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="color" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">צבע</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="chassie" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">מ.שלדה</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="lastTreatment" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">הטיפול האחרון</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="nextTreatment" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">הטיפול הבא</span>
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
    
    $("#addNewClientForm").validate(
      {
        rules: 
        {
            firstName: 
          {
            required: true
          },
          lastName:{
            required: true
          },
          phone:{
            required: true
          },
          identity:{
            required: true
          },
          carNumber:{
            required: true
          },
          manufacture:{
            required: true    
          },
          model:{
            required: true
          }
          
        
        },
        messages: 
        {
            firstName: 
          {
            required: "אנא רשמו שם פרטי מלא"
          },
          lastName: 
          {
            required: "אנא רשמו שם משפחה מלא"
          },
          phone:{
            required: 'אנא רשמו מספר טלפון תקין'
          },
          identity:{
            required: 'אנא רשמו תעודת זהות תקינה'
          },
          carNumber:{
            required: 'אנא רשמו מספר רכב תקין'
          },
          manufacture:{
            required: 'אנא רשמו יצרן תקין'    
          },
          model:{
            required: 'אנא רשמו דגם תקין'
          }
        },
        submitHandler: function(form) {
          
            var datastring = $("#addNewClientForm").serialize();
    

    $.ajax({
        type: "post",
        url: "handle/handle.php",
        data: datastring,
        success: function (response) {
            Swal.fire(
            'משתמש חדש נוצר!',
            'אתם מועברים לדף לקוחות',
            'success'
            ).then(function() {
                 window.location = "clients.php";
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