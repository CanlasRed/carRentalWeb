$('#edit_profile_form').submit(function(e){
      e.preventDefault();
      var formData = new FormData(this);
      // $('#edit_image_btn').addClass('disabled');
        $.ajax({
          url: "php/update_customer_profile.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(data){
            if(data == 'success'){
              Swal.fire({
                  icon: 'success',
                  title: 'Changes Saved',
                  text: 'Profile updated successfully',
                  confirmButtonColor: '#1b1c1d',
                  confirmButtonText: 'OK'
              }).then((result) =>{
                   location.reload();
              })
            }
            else if (data == 'done'){
              Swal.fire({
                icon: 'error',
                title: 'Invalid',
                text: 'Please Upload an Image',
                confirmButtonColor: '#1b1c1d',
                confirmButtonText: 'OK'
              })
            }
            else if (data == 'imgfailed'){
              Swal.fire({
                icon: 'error',
                title: 'Error Saving Image',
                text: 'An error has occured while saving the image',
                confirmButtonColor: '#1b1c1d',
                confirmButtonText: 'OK'
              })
            }
            else if (data == 'SL'){
              Swal.fire({
                icon: 'error',
                title: 'Image too Large',
                text: 'Image must be 1MB or less',
                confirmButtonColor: '#1b1c1d',
                confirmButtonText: 'OK'
              })
            }
            else if (data == 'WT'){
              Swal.fire({
                icon: 'error',
                title: 'Invalid Image Format',
                text: 'Only JPG JPEG and PNG formats are accepted',
                confirmButtonColor: '#1b1c1d',
                confirmButtonText: 'OK'
              })
            }
            else{
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error has occured while inserting the data',
                confirmButtonColor: '#1b1c1d',
                confirmButtonText: 'OK'
              })
            }
            // $('#edit_image_btn').removeClass('disabled');
          }
        });
    });