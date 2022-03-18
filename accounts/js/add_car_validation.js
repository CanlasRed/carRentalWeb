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
              confirmButtonColor: '#76b947',
              confirmButtonText: 'OK'
            }).then((result) =>{

                  window.location.href = '/accounts/edit-car.php?carID=' + data;
                
            })
          } else if (data=='dbfailed'){
            Swal.fire({
              icon: 'error',
              title: 'Database Error',
              text: 'There seems to be a problem, please try again',
              confirmButtonColor: '#76b947',
              confirmButtonText: 'OK'
            })
          } else if (data=='imgfailed'){
            Swal.fire({
              icon: 'error',
              title: 'Error Saving Image',
              text: 'An error has occured while saving the image',
              confirmButtonColor: '#76b947',
              confirmButtonText: 'OK'
            })
          } else if (data=='SL'){
            Swal.fire({
              icon: 'error',
              title: 'Image too Large',
              text: 'Image must be 3MB or less',
              confirmButtonColor: '#76b947',
              confirmButtonText: 'OK'
            })
          } else if (data=='ASL'){
            Swal.fire({
              icon: 'error',
              title: 'Audio too Large',
              text: 'Audio must be 1MB or less',
              confirmButtonColor: '#76b947',
              confirmButtonText: 'OK'
            })
          } else if (data=='audiofailed'){
            Swal.fire({
              icon: 'error',
              title: 'Error Saving Audio',
              text: 'An error has occured while saving the audio',
              confirmButtonColor: '#76b947',
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
                  confirmButtonColor: '#76b947',
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
                confirmButtonColor: '#76b947',
                confirmButtonText: 'OK'
              })
            }
            else if (data == 'imgfailed'){
              Swal.fire({
                icon: 'error',
                title: 'Error Saving Image',
                text: 'An error has occured while saving the image',
                confirmButtonColor: '#76b947',
                confirmButtonText: 'OK'
              })
            }
            else if (data == 'SL'){
              Swal.fire({
                icon: 'error',
                title: 'Image too Large',
                text: 'Image must be 3MB or less',
                confirmButtonColor: '#76b947',
                confirmButtonText: 'OK'
              })
            }
            else if (data == 'WT'){
              Swal.fire({
                icon: 'error',
                title: 'Invalid Image Format',
                text: 'Only JPG JPEG and PNG formats are accepted',
                confirmButtonColor: '#76b947',
                confirmButtonText: 'OK'
              })
            }
            else{
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error has occured while inserting the data',
                confirmButtonColor: '#76b947',
                confirmButtonText: 'OK'
              })
            }
            // $('#edit_image_btn').removeClass('disabled');
          }
        });
    });

