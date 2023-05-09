// Check room availability

$('#submitting2').hide();
$('#contactForm').submit(function(event) {
    
    $('#submitting2').show();
    $('#ogSubmit2').hide();

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
            
            $('#submitting2').hide();
            $('#ogSubmit2').show();
            
        },
        error: function(xhr, status, error) {
            // handle errors
            console.log(xhr.responseText);
        }
    });
});