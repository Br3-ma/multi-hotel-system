$(function() {

    // Edit a Room Type
    $('#edit-room-type-form').submit(function(event) {
        event.preventDefault(); // prevent the form from submitting normally
        // $('#create-room-type-form').modal('hide');
        // var formData = $(this).serialize(); // serialize the form data
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                // handle the response from the server
                if(response.code === 'success'){
                    toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
                    toastr.info(response.title, response.message);
                    window.location.href = '../room-types';
                }

                if(response.code === 'warning'){
                    toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
                    toastr.warning(response.title, response.message);
                }

                if(response.code === 'error'){
                    toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
                    toastr.error(response.title, response.message);
                }
                location.reload();
            },
            error: function(xhr, status, error) {
                // handle errors
                console.log(xhr.responseText);
            }
        });
    });


    // *************************************************************************************************************************
    // Create a Room
    $('#create-room-form').submit(function(event) {
        event.preventDefault(); // prevent the form from submitting normally

        // var formData = $(this).serialize(); // serialize the form data
        // formData.append('file', $('#room_image_create').prop('files')[0]);
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
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
                
                $('.create-room-modal-lg').modal('hide');
                location.reload();
            },
            error: function(xhr, status, error) {
                // handle errors
                console.log(xhr.responseText);
                $('.create-room-modal-lg').modal('hide');
            }
        });
    });

    // Create a Room Type
    $('#create-room-type-form').submit(function(event) {
        event.preventDefault(); // prevent the form from submitting normally
        $('.create-room-type-modal-lg').modal('hide');
        // $('#create-room-type-form').modal('hide');
        // var formData = $(this).serialize(); // serialize the form data
        let formData = new FormData(this);
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                // handle the response from the server
                if(response.code === 'success'){
                    toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.info(response.title, response.message);
                }

                if(response.code === 'warning'){
                    toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.warning(response.title, response.message);
                }

                if(response.code === 'error'){
                    toastr.options.closeHtml = '<button class="closebtn"><i class="bi bi-x"></i></button>';
                    toastr.options.positionClass = 'toast-bottom-right';
                    toastr.error(response.title, response.message);
                }
                
            },
            error: function(xhr, status, error) {
                // handle errors
                console.log(xhr.responseText);
                $('.create-room-type-modal-lg').modal('hide');
            }
        });
    });
});