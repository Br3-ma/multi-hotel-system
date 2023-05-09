//Default Toastr Notification Settings
$(document).ready(function() {
      
    toastr.options = {
          'closeButton': true,
          'debug': false,
          'newestOnTop': true,
          'progressBar': false,
          'positionClass': 'toast-bottom-left',
          'preventDuplicates': false,
          'showDuration': '10000',
          'hideDuration': '5000',
          'timeOut': '5000',
          'extendedTimeOut': '5000',
          'showEasing': 'swing',
          'hideEasing': 'linear',
          'showMethod': 'fadeIn',
          'hideMethod': 'fadeOut',
      }

});






//Button Click Event
$('#btnSuccess').click(function(event) {

    toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
    toastr.success('You clicked Success toast.You clicked Success toast.You clicked Success toast','Success Message');
    // alert("Success!");

});


$('#btnInfo').click(function(event) {
    toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
    toastr.info('No Rooms Available', 'We are sorry, but all of our rooms are currently booked and unavailable for the dates you have requested. We apologize for any inconvenience this may cause. Please check back with us at a later time.');
});


$('#btnWarning').click(function(event) {

    toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
    toastr.warning('You clicked Warning toast','Warning Message');
    // alert("Warning!");

});


$('#btnError').click(function(event) {


    toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
    toastr.error('You clicked Error toast','Error Message');
    //alert("Error!");

});