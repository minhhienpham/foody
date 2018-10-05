function showUserInfo(response) {
  let user = response.result;
  if(token) {
    if (user.gender == 1) {
      $('#genderInfo option[value=1]').attr('selected','selected');
    } else {
      $('#genderInfo option[value=0]').attr('selected','selected');
    }
    $('#textMessage').hide();
    $('#userNameInfo').val(user.username);
    $('#fullNameInfo').val(user.full_name);
    $('#phoneNumberInfo').val(user.phone);
    $('#emailInfo').val(user.email);
    $('#birthdayInfo').val(user.birthday);
  }
}

function editUserInfo() {
  $.ajax({
    url: "/api/users/profile",
    type: "put",
    headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
    },
    data: {
      'full_name' : $('#fullNameInfo').val(),
      'phone'  : $('#phoneNumberInfo').val(),
      'email'  : $('#emailInfo').val(),
      'gender' : $('#genderInfo').val(),
    },
    success: function(response) {
      $('#textMessage').show().text(Lang.get('user/login.userInfo.update_success'));
    },
    error: function (response) {
      $('#textMessage').show().text(response.responseJSON.message);
    }
  });
}

$(document).ready(function () {
  if(token) {
    $.ajax({
      url: "/api/users/info",
      type: "get",
      headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer ' + token
      },
      success: function(response) {
        showUserInfo(response);
      }
    });
  
    $(document).on('click', '#btnUpdateInfo', function(event) {
      event.preventDefault();
      editUserInfo();
    });
  } else {
    $('#textMessage').text(Lang.get('user/login.userInfo.not_login'));
    $('#profileForm').hide();
  } 
});
