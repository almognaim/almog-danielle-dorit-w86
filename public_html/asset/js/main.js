jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});





   
   
});




$(document).ready(function () {
    
    jQuery(function($) {
        
        var path = window.location.href;
    
       console.log(path);
    
        // because the 'href' property of the DOM element is the absolute path
    
       $('ul a').each(function() {
    
           if (this.href === path) {
    
           $(this).parent().addClass('active');
    
           }
    
       }); 
    
    
    
      }); 
  });


  /* data table js actions */
  $(document).ready( function () {
    $('#clients').DataTable(
        {
            "language": {
                "lengthMenu": "הצג _MENU_",
                "zeroRecords": "Nothing found - sorry",
                "info": "",
                "infoEmpty": "No records available",
                "search": "חיפוש:",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "הקודם",
                    "next": "הבא"
                  }
            }
        } 
    );
} );

/* 
var form = $("#contact");
form.validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        confirm: {
            equalTo: "#password"
        }
    }
});
form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex)
    {
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex)
    {
        form.submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.
        
            alert('dd');
        
        
        });
    }
}); */

/* showing the date */
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = dd + '/' + mm + '/' + yyyy;
document.getElementById('current-date').innerHTML = today;

// /* showing the time */
// var todayDate = new Date();
// var theDate = todayDate.toLocaleTimeString();
// document.getElementById('current-time').innerHTML = theDate;