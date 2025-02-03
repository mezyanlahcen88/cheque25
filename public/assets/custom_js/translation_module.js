$(document).on('blur', '.savetranslation', function(e) {
    e.preventDefault();
    $id = $(this).attr('data-id');
    $inputvalue = $(this).val();
    $routeName = $(this).attr('data-route-name');
    $csrf = $("#generate_csrf").attr('content');
    console.log($id, $inputvalue, $routeName);
    $.ajax({
        url: $routeName,
        type: "post",
        data: {
            id: $id,
            value: $inputvalue,
            _token: $csrf,
        },
        async: true,
        success: function(response) {
            response.label + " updated with success"
            Swal.fire({
                text: response.label + " updated with success",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });


        }
    });

})
$(document).on('click', '#addTranslationBtn', function(e) {
    e.preventDefault();
    $('#addTranslationModal').modal('show');
})


$(document).on('click', '.saveTranslationBtn', function (e) {
    e.preventDefault()
    var formData = $('#translationFormStore').serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/languagetranslations/store",
        type: "POST",
        dataType: "json",
        data : formData,
        success: function (data) {
            if(data.success){
                Swal.fire(
                    'Super!',
                    'picture deleted successfully',
                    'success'
                );
            }


        },
        error: function (xhr) {
            Swal.fire(
                'Oops!',
                'Something went wrong.',
                'error'
            );
        }
    });
})


$(document).on('click','#synTranslationBtn',function(e){
    e.preventDefault();
    $.ajax({
      url: "/languagetranslations/syncronize",
      type: "GET",
      dataType: "json",
      success: function (data) {
         if(data.success){
          Swal.fire(
              'Super!',
              data.message,
              'success'
          );
         }
      },
  });

  })
