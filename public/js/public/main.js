var token = localStorage.getItem('token-login');
function checkLogin(link) {
  token = localStorage.getItem('token-login');
  event.preventDefault();
  if(token) {
    $.ajax({
      type: 'GET',
      url: '/api/checkLoginToken',
      headers: ({
        Accept: 'application/json',
        Authorization: 'Bearer ' + token,
      }),
      success: function(response) {
        if(response.code == 200) {
          if(window.location.pathname !== link) {
            location.href = link;
          }
        }
      },
      error: function (response) {
        window.localStorage.removeItem('token-login');
        LoginPopup();
      }
    });
  } else {
    if(window.location.pathname != '/') {
      ModalRequestLogin();
      location.href = '/';
    }else{
      $('.login-form #modal-message').html(Lang.get('user/login.userInfo.messsage_request_login'));
      $('.login-form #modal-message').css('color','red');
      LoginPopup();
    }
  }
}
$(document).ready(function() {
  $('#productSearch').on('submit', function (event) {
    event.preventDefault();
    query = $('#productSearch').find('input[name="name"]').val();
    url = api.products_index + "?name=" + query;
    window.location.href = url;
  });
  
  $.ajax({
    url: "/api/categories",
    type: "get",
    success: function(result) {
      let html = '';
      result.result.forEach(category => {
        let childsHtml = '';
        if (category.children) {
          childsHtml += '<div class="list-menu">' +
                          '<ul class="list-inline">';
          category.children.forEach(childsCategory => {
            childsHtml += '<li><a href="'+api.products_index+"?category_id="+childsCategory.id+'">'+ childsCategory.name +'</a></li>';
          });
          childsHtml += '</ul>' +
                      '</div>';
        }
        if (category.children) {
          html += '<li class="menu-top">' +
                      '<a href="'+api.products_index+"?category_id="+category.id+'">'+category.name+'</a>';
          if (category.children) {
            html += childsHtml;
          }
          html +=  '</li>';
        }else {
          html += '<li>' +
                      '<a href="'+api.products_index+"?category_id="+category.id+'">'+category.name+'</a>';
          html +=  '</li>';
        }
      });
      $('#js-menu').append(html);
    }
  });
});
function formatNumber(number) {
  return new Intl.NumberFormat('de-DE').format(number);
}
