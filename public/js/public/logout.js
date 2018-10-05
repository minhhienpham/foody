$(document).ready(function () {
  $(document).on('click', '#userLogout', function (event) {
    event.preventDefault();
    token = localStorage.getItem('token-login');
    if(token) {
      $.ajax({
        url: "/api/logout",
        type: "post",
        headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer ' + token
        },
        success: function (response) {
          localStorage.removeItem('token-login');
          signOut();
          window.location.href = 'http://' + window.location.hostname;
        }
      });
    }
  });
})
function signOut() {
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut();
}
