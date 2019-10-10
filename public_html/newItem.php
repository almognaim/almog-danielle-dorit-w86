<?php
session_start();
if( !$_SESSION['user_id'] ){
    header('location: login.php');
}
include 'inc/header/header.php'; ?>

<!-- Main Start -->
<style>
form#addNewItemForm .input-group.mt-4 {
    display: flex;
    flex-direction: row;
    direction: ltr;
}

form#addNewItemForm .input-group.mt-4 input {
    order: 2;
}

form#addNewItemForm label {
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
                <h1>הוספת פריט חדש</h1>
            </div>
        </div>
        <div class="container">
            <div class="row" id="addNewClient-Wrapper">
                <div class="col-12">
                    <form method="post" action="" id="addNewItemForm" class="row text-right">
                        <div class="col-md-6 col-12">
                            <div class="input-group mt-4" style="direction: ltr;">
                            
                                <input id="first_name" type="text" class="form-control" name="name">
                                <div class="input-group-append">
                                    <span class="input-group-text">שם פריט *</span>
                                </div>
                            </div> 
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="quantity" type="number" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">*כמות</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="price" type="number" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">מחיר ליחידה בש"ח כולל מע"מ *</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="minquantity" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">כמות מינימאלית</span>
                                </div>
                            </div>
                            <div class="input-group mt-4" style="direction: ltr;">
                                <input name="vendor" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">ספק</span>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6 col-12">


                        
                            <div class="form-group mt-4">
                                <input id="addNewClient" class="form-control btn btn-success" type="submit" name="addNewClient" value="הוספת פריט חדש">
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
    
    $("#addNewItemForm").validate(
      {
        rules: 
        {
            name:{
            required: true
          },
          quantity:{
            required: true
          },
          price:{
            required: true
          },
          minquantity:{
            required: true
          },
          vendor:{
            required: true
          },
     
        },
        messages: 
        {
            name: 
          {
            required: "אנא הזינו שם פריט"
          },
          quantity: 
          {
            required: "אנא הזינו כמות במלאי"
          },
          price:{
            required: 'אנא הזינו מחיר בש"ח כולל מע"מ'
          },
          minquantity:{
            required: "אנא הזינו כמות מינימאלית במלאי"
          },
          vendor:{
            required: "אנא הזינו שם ספק"
          },
      
        },
        submitHandler: function(form) {
          
            var datastring = $("#addNewItemForm").serialize();
    

    $.ajax({
        type: "post",
        url: "handle/addItem.php",
        data: datastring,
        success: function (response) {
        
     Swal.fire(
           'פריט חדש נוצר!',
            'אתם מועברים לרשימת מלאי',
            'success'
            ).then(function() {
                 window.location = "inventory-list.php";
});
        }
        
    }); 
        }
      });	

/* $('#addNewItemForm').submit(function(e){
    
    e.preventDefault();
    var datastring = $("#addNewItemForm").serialize();
    

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