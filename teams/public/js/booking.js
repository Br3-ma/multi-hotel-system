
// Check room availability
$('#test-form').submit(function(event) {
    
    $('#submitting').show();
    $('#ogSubmit').hide();
    event.preventDefault(); // prevent the form from submitting normally

    var formData = $(this).serialize(); // serialize the form data

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        success: function(response) {
            // handle the response from the server
            if(response.code === 'success'){
                toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
                toastr.info(response.title, response.message);
            }

            if(response.code === 'warning'){
                toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
                toastr.warning(response.title, response.message);
            }

            if(response.code === 'error'){
                toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
                toastr.error(response.title, response.message);
            }
            
            $('#test-form').hide();
            $('.popup_box').hide();
            location.reload();
        },
        error: function(xhr, status, error) {
            // handle errors
            console.log(xhr.responseText);
        }
    });
});


// Pass results to another Page...
// var myData = response.data;
// var encodedArray = encodeURIComponent(JSON.stringify(myData)); 
// console.log(encodedArray);
// window.location.href = siteBase+'available-rooms?myData=' + encodedArray;