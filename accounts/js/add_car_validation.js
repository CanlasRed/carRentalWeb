$(function () {
  // $.validator.setDefaults({
  //   submitHandler: function () {
  //     alert( "Form successful submitted!" );
  //   }
  // });
  $('#add_car_from').validate({
    rules: {
      name: {
        required: true,
      },
      model: {
        required: true,
      },
      color: {
        required: true,
      },
      year: {
        required: true,
      },
      plateNumber: {
        required: true,
      },
      rate: {
        required: true,
        number: true,
        min: 1,
      },
      deposit: {
        required: true,
        number: true,
        min: 1,
      },
      capacity: {
        required: true,
        number: true,
        min: 1,
      },
      speed: {
        required: true,
        number: true,
        min: 1,
      },
    },
    messages: {

    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    },
    submitHandler: function(form){
      // $('#save_plant_btn').addClass('disabled');
      var formData = new FormData($(form)[0]);
      $.ajax({
        url: form.action,
        type: form.method,
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
          if(data>0){
            Swal.fire({
              icon: 'success',
              title: 'Car Saved',
              text: 'New Car Added successfully',
              confirmButtonColor: '#1b1c1d',
              confirmButtonText: 'OK'
            }).then((result) =>{

                  window.location.href = 'edit-car.php?carID=' + data;
                
            })
          } else if (data=='updated'){
            Swal.fire({
              icon: 'success',
              title: 'Changes Saved',
              text: 'Car updated successfully',
              confirmButtonColor: '#1b1c1d',
              confirmButtonText: 'OK'
            }).then((result) =>{
                location.reload();
            })
          } else if (data=='dbfailed'){
            Swal.fire({
              icon: 'error',
              title: 'Database Error',
              text: 'There seems to be a problem, please try again',
              confirmButtonColor: '#1b1c1d',
              confirmButtonText: 'OK'
            })
          } else if (data=='imgfailed'){
            Swal.fire({
              icon: 'error',
              title: 'Error Saving Image',
              text: 'An error has occured while saving the image',
              confirmButtonColor: '#1b1c1d',
              confirmButtonText: 'OK'
            })
          } else if (data=='SL'){
            Swal.fire({
              icon: 'error',
              title: 'Image too Large',
              text: 'Image must be 3MB or less',
              confirmButtonColor: '#1b1c1d',
              confirmButtonText: 'OK'
            })
          } else if (data=='ASL'){
            Swal.fire({
              icon: 'error',
              title: 'Audio too Large',
              text: 'Audio must be 1MB or less',
              confirmButtonColor: '#1b1c1d',
              confirmButtonText: 'OK'
            })
          } else if (data=='audiofailed'){
            Swal.fire({
              icon: 'error',
              title: 'Error Saving Audio',
              text: 'An error has occured while saving the audio',
              confirmButtonColor: '#1b1c1d',
              confirmButtonText: 'OK'
            })
          }
        // $('#save_plant_btn').removeClass('disabled');
        }

      });
    }
  });

});



    $('#insert_car_images').submit(function(e){
      e.preventDefault();
      var formData = new FormData(this);
      // $('#edit_image_btn').addClass('disabled');
        $.ajax({
          url: "php/insert_car_images.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(data){
            if(data == 'success'){
              Swal.fire({
                  icon: 'success',
                  title: 'Image Saved',
                  text: 'New Image Added Successfully',
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
                text: 'Image must be 3MB or less',
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


$('#update_car_images').submit(function(e){
      e.preventDefault();
      var formData = new FormData(this);
        $.ajax({
          url: "php/update_car_images.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(data){
            if(data == 'success'){
              Swal.fire({
                  icon: 'success',
                  title: 'Image Updated',
                  text: 'Image Updated successfully',
                  confirmButtonColor: '#1b1c1d',
                  confirmButtonText: 'OK'
              }).then((result) =>{
                   location.reload();
                
              })
            }
            else if (data == 'done'){
              Swal.fire({
                icon: 'info',
                title: 'Done?',
                text: 'No changes are made',
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
                text: 'Image must be 3MB or less',
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
                text: 'An error has occured while updating the data',
                confirmButtonColor: '#1b1c1d',
                confirmButtonText: 'OK'
              })
            }
          }
        });
    });

    $(document).on('click', '.delete_images', function(){
      var imageID = $(this).attr('data-id');
      Swal.fire({
        icon: 'warning',
        title: 'Confirm Delete',
        text: 'Are you sure you want to delete this data?',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#dc3545',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
              $.ajax({
              url: "php/delete_images.php",
              type: "POST",
              data:{
                imageID: imageID,
                action: '1',
              },
              success: function(data){
                if(data == 'success'){
                  Swal.fire({
                      icon: 'success',
                      title: 'Data Deleted',
                      text: 'Image has been deleted successfully',
                      confirmButtonColor: '#1b1c1d',
                      confirmButtonText: 'OK'
                  }).then((result) =>{
                    if (result.isConfirmed){
                       location.reload();
                    }
                  })
                }
                else{
                  Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error has occured while deleting the data',
                    confirmButtonColor: '#1b1c1d',
                    confirmButtonText: 'OK'
                  })
                }
              }
            });
        }
      })
      
    });


    $(document).on('click', '.restore_images', function(){
      var imageID = $(this).attr('data-id');
      Swal.fire({
        icon: 'warning',
        title: 'Restore Data',
        text: 'Are you sure you want to restore this data?',
        showCancelButton: true,
        confirmButtonText: 'Restore',
        confirmButtonColor: '#28a745',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
              $.ajax({
              url: "php/delete_images.php",
              type: "POST",
              data:{
                imageID: imageID,
                action: '2',
              },
              success: function(data){
                if(data == 'success'){
                  Swal.fire({
                      icon: 'success',
                      title: 'Data Restored',
                      text: 'Image has been restored successfully',
                      confirmButtonColor: '#1b1c1d',
                      confirmButtonText: 'OK'
                  }).then((result) =>{
                    if (result.isConfirmed){
                       location.reload();
                    }
                  })
                }
                else{
                  Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error has occured while restoring the data',
                    confirmButtonColor: '#1b1c1d',
                    confirmButtonText: 'OK'
                  })
                }
              }
            });
        }
      })
      
    });
