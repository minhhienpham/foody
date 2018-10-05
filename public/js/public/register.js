$(document).ready(function () {
  $('#test-sm').submit(function(event) {
    event.preventDefault();
      $.ajax({
          url: "/api/register",
          type: "POST",
          headers: {
            'Accept': 'application/json',
          },
          data: {
            full_name: $('.register-form input[name="full_name"]').val(),
            username: $('.register-form input[name="username"]').val(),
            gender: $('.register-form #gender').val(),
            phone: $('.register-form input[name="phone"]').val(),
            email: $('.register-form input[name="email"]').val(),
            password: $('.register-form input[name="password"]').val(),
            birthday: '1980-07-07',
            role_id: 3,
          },
          success: function (response) {
            $('.register-form').html('Registration is successful, please login');
            $('.register-form').css('color', 'green');
            $('.register-form').show();
            $('.modal').fadeOut(3000,function() { 
              $(this).remove();
              $("body").removeClass("modal-open");
            });
          },
          error: function (response) {
            errors = Object.keys(response.responseJSON.error);
            errors.forEach(error => {
                $('#valmsg-' + error).html(response.responseJSON.errors[error]);
                $('#valmsg-' + error).css('color', 'red');
                $('#valmsg-' + error).show();
            });
        }
      });
     
  });
})
