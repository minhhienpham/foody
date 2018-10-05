$(document).ready(function () {
  if(token) {
    $.ajax({
      type: 'GET',
      url: '/api/checkLoginToken',
      headers: ({
        Accept: 'application/json',
        Authorization: 'Bearer ' + localStorage.getItem('token-login'),
      }),
      success: function(response) {
        if(response.code == 200) {
          welcomeLogged();
        }
      },
      error: function (response) {
        window.localStorage.removeItem('token-login');
        welcomeLogout();
      }
    });
  } else {
    welcomeLogout();
  }

  $(document).on('click', '#loginBtn', function (event) {
    event.preventDefault();
    $.ajax({
      url: "/api/login",
      type: "post",
      headers: {
        'Accept': 'application/json',
      },
      data: {
        username: $('.login-form input[name="username"]').val(),
        password: $('.login-form input[type="password"]').val()
      },
      success: function (response) {
        loginSuccess(response);
      },
      error: function (response) {
        alert(response.responseJSON.error);
        $('.login-form input[type="password"]').val('');
      }
    });
  })
})
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  var gplus_id = profile.getId();
  var email =  profile.getEmail();
  var username = email.substr(0, email.indexOf('@'));
  var fullname = profile.getName();
  $.ajax({
    url: "/api/login/gplus",
    type: "get",
    headers: {
      'Accept': 'application/json',
    },
    data: {
      gplus_id: gplus_id,
      username: username, 
      full_name: fullname,
      email: email
    },
    success: function (response) {
      loginSuccess(response);
    },
    error: function (response) {
      alert(response.responseJSON.error);
    }
  });
}
function loginSuccess(response) {
  localStorage.setItem('token-login', response.result.token);
  localStorage.setItem('username', response.result.user.username);
  $('.login-form').html(Lang.get('user/login.login_success'));
  $('.login-form').css('color', 'green');
  welcomeLogged();
}
function welcomeLogged() {
  $('#userName').html(localStorage.getItem("username"));
  $('#userName').show();
  $('.user-name').show();
  $('#userLogout').show();
  $('#userLogin').hide();
  $('#userSignup').hide();
}
function welcomeLogout() {
  $('#userLogin').show();
  $('#userLogout').hide();
  $('#userSignup').show();
  $('#userName').hide();
  $('.user-name').hide();
}
