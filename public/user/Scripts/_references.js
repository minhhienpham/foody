$(function () {
    var cw = $('.camnhan-img').width();
    $('.camnhan-img').css({ 'height': cw + 'px' });

    $('[data-toggle="tooltip"]').tooltip();
    $(".backtotop").addClass("hidden");
    var path = window.location.href;
    $.each($(' ul.menu li a'), function (i, v) {
        if (path.search($(v).attr('href')) != -1) $(v).addClass('active');
    });
    $.each($('.home-menu ul li a'), function (i, v) {
        if (path.search($(v).attr('href')) != -1) $(v).addClass('active');
    });
    // $(window).load(function () {
    //    $(".popup-cart.box-cart-scroll").mCustomScrollbar({
    //        theme: "minimal"
    //    });
    // });

    $('.fa-navicon').click(function () {
        $('.list-menu').toggleClass("active");
    });
    $(window).scroll(function () {

        if ($(this).scrollTop() === 0) {
            $(".backtotop").addClass("hidden")
        } else {
            $(".backtotop").removeClass("hidden")
        }
        //an hien header-top
        //if (window.pageYOffset >= 100) {
        //    $('.header-top').addClass('hidden');
        //    $('header').css({ "position": "fixed" });
        //    $('.left-banner').css({ "top": "75px" });
        //    $('.right-banner').css({ "top": "75px" });
        //}
        //else {
        //    $('.header-top').removeClass('hidden');
        //    $('header').css({ "position": "relative" });
        //    $('.left-banner').css({ "top": "185px" });
        //    $('.right-banner').css({ "top": "185px" });
        //}
    });
    $('#linkTop').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 1200);
        return false;
    });
    owlCarousel(".carousel_new", 4, 4500);
    owlCarousel(".carousel_best_buy", 4, 4500);

    $('.btn-reg').click(function () {
        $('#modalLogin').modal('hide');
        $('#modalForgot').modal('hide');
        SignupPopup();
    });
    // $('.shopping-cart-show').click(function () {
    //     $('.box-cart').toggleClass("active");
    // });
    // $('.thugon-cart').click(function () {
    //     $('.box-cart').toggleClass("active");
    // });

});
function popupForgot() {
    $('#modalLogin').modal('hide');
    $('#modalForgot').modal('show');
}
function owlCarousel(i, n, s) {
    $(i).owlCarousel({
        items: n,
        navigation: true,
        slideSpeed: 800,
        autoPlay: s,
        autoplayHoverPause: true,
        stopOnHover: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: true,
                loop: true
            },
            1024: {
                items: 4,
                nav: true,
                loop: true
            }

        }
    });
}
function LoginPopup() {
    $('#modalLogin').modal('show');
}
function SignupPopup() {
    $('#modalSignup').modal('show');
}
function ModalRequestLogin() {
    $('#modalRequestLogin').modal('show');
}
function ModalMessageCart() {
    $('#modalMessageCart').modal('show');
}
function showMark() {
    $('.body-mark').addClass("active");
}
function hideMark() {
    $('.body-mark').removeClass("active");
}
// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
        // Logged into your app and Facebook.
        testAPI();
    } else if (response.status === 'not_authorized') {
        $('#modal-message').html('Vui lòng đăng nhập vào ứng dụng!');
    } else {
        $('#modal-message').html('Vui lòng đăng nhập vào facebook!');
    }
}
function checkLoginState() {
    FB.login(function (response) {
        statusChangeCallback(response);
    });
}
window.fbAsyncInit = function () {
    FB.init({
        appId: '1650169558572376',
        cookie: true,  // enable cookies to allow the server to access
        // the session
        xfbml: true,  // parse social plugins on this page
        version: 'v2.5' // use version 2.2
    });
};
// Load the SDK asynchronously
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
function testAPI() {
    //console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function (response) {
        console.log(JSON.stringify(response));
        showMark();
        $.ajax({
            type: 'post',
            dataType: 'json',
            cache: false,
            url: '/DangNhap/_socialLogin',
            data: {
                type: "facebook",
                name: response.name,
                email: response.email,
            },
            success: function (data) {

                if (data.result == 1) {
                    setTimeout(function () {
                        hideMark();
                    }, 500);
                    $('#modal-message').html(data.message);
                    setTimeout(function () {
                        location.reload();
                    }, 1500);
                }
                else {
                    $('#modal-message').html(data.message);
                }
            },
            error: function (data) {
                $('#modal-message').html(data.message);
            }
        });
        //console.log('Successful login for: ' + response.name);
        //alert('Thanks for logging in, ' + response.name + '!');
    });
}
function gluslogout() {
    gapi.auth.signOut();
    location.reload();
}
function gpluslogin() {
    var myParams = {
        'clientid': '609531036048-99btatr5ke3f5qsfdj1b52iq0asc4uc1.apps.googleusercontent.com',
        'cookiepolicy': 'single_host_origin',
        'callback': 'loginCallback',
        'approvalprompt': 'force',
        'scope': 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
    };
    gapi.auth.signIn(myParams);
}

function loginCallback(result) {
    if (result['status']['signed_in']) {
        var request = gapi.client.plus.people.get(
        {
            'userId': 'me'
        });
        request.execute(function (resp) {
            var email = '';
            if (resp['emails']) {
                for (i = 0; i < resp['emails'].length; i++) {
                    if (resp['emails'][i]['type'] == 'account') {
                        email = resp['emails'][i]['value'];
                    }
                }
            }
            //var name = resp['displayName'];
            showMark();
            $.ajax({
                type: 'post',
                dataType: 'json',
                cache: false,
                url: '/DangNhap/_socialLogin',
                data: {
                    type: "gplus",
                    name: resp['displayName'],
                    email: email

                },
                success: function (data) {

                    if (data.result == 1) {
                        setTimeout(function () {
                            hideMark();
                        }, 500);
                        $('#modal-message').html(data.message);
                        setTimeout(function () {
                            location.reload();
                        }, 1500);
                    }
                    else {
                        $('#modal-message').html(data.message);
                    }
                },
                error: function (data) {
                    $('#modal-message').html(data.message);
                }
            });
            //var str = "Name:" + resp['displayName'] + "<br>";
            //str += "Image:" + resp['image']['url'] + "<br>";
            //str += "<img src='" + resp['image']['url'] + "' /><br>";

            //str += "URL:" + resp['url'] + "<br>";
            //str += "Email:" + email + "<br>";
            //document.getElementById("profile").innerHTML = str;
        });

    }

}
function onLoadCallback() {
    gapi.client.setApiKey('AIzaSyApm-0dbVkCyVDxlrNKWmrkDF9Qk1Z2cfg');
    gapi.client.load('plus', 'v1', function () { });
}
(function () {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
// function muangay(spid, soluong, size) {
//     showMark();
//     $.post('/SanPham/_cart', { action: 'add', spid: spid, soluong: soluong, size: size }, function (data) {
//         if (data != null) {
//             $('.box-cart').addClass('active');
//             setTimeout(function () {
//                 hideMark();
//             }, 500);
//             $('#shopping-cart').html(data); $('.box-cart').addClass('active');
//         }
//         else {
//             setTimeout(function () {
//                 hideMark();
//             }, 500);
//         }
//     });
// }
function ModifyCart(spid, action) {
    showMark();
    $.post('/SanPham/_cart', { action: action, spid: spid }, function (data) {
        if (data != null) {
            $('#shopping-cart').html(data);
            setTimeout(function () {
                hideMark();
                $('.box-cart').addClass('active');
            }, 500);

        }
        else {
            setTimeout(function () {
                hideMark();
            }, 500);
        }
    });
}
function ModifyCartDetail(spid, action) {
    showMark();
    $.post('/SanPham/_cart', { action: action, spid: spid }, function (data) {
        if (data != null) {
            $('#shopping-cart').html(data);
            $.get('/HoaDon/_cartDetail', function (detail) {
                $('.cart-detail-wrapper').html(detail)
            });
            setTimeout(function () {
                hideMark();
                var total = Number($('#total-cart').attr('data-val'));
                $('#thanhtien').text(Number(total).toLocaleString('en'));
                $('#thanhtien').attr('data-val', total);
                $('#tongthanhtoan').text(Number(total).toLocaleString('en'));

            }, 500);
        }

    });
}
function navpager(selector, url, pageNo) {
    showMark();
    $.get(url + "?pageno=" + pageNo, function (data) {
        if (data != null) {
            setTimeout(function () {
                hideMark();
            }, 500);
            $(selector).css({ "display": "none" });
            $(selector).parent().append(data);
        }

    });
}
function CheckNumber(i) {
    var flag = true;
    if ($(i).val() != "") {
        var value = $(i).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
        var intRegex = /^\d+$/;
        if (!intRegex.test(value) || value == 0) {
            $('.sl-validate').html("Quantity is a number larger 0");
            //$(i).val(1);
            flag = false;
        }
    } else {
        $('.sl-validate').html("Please input quantity need buy");
        //$(i).val(1);
        flag = false;
    }

    if (flag) {
        $('.sl-validate').removeClass('active');
        $('#btn-muangay').removeClass('disabled');
    } else {
        //disible button addtocart
        $('.sl-validate').addClass('active');
        $('#btn-muangay').addClass('disabled');
    }
    return flag;
}
function changePrice(i, oldprice, newprice, discount) {
    showMark();
    $('.size').removeClass("active");//reset
    $(i).toggleClass("active");

    setTimeout(function () {
        hideMark();
    }, 500);
    $('.old-price').html(oldprice + ' VNĐ');
    $('.new-price').html(newprice + ' VNĐ');
    $('.only-price').html(newprice + ' VNĐ');
    $('.discount').html('-' + discount + '<sup>%</sup>');

}
// function addToCart(spid) {
//     var soluong = $('#Soluong').val();
//     var size = $('.size.active').attr('data-val');
//     muangay(spid, soluong, size);
// }
function DeleteHD(mahd) {
    var flag = confirm("Bạn có chắc hủy đơn hàng này?");
    if (flag == false)
        return false;
    showMark();
    $.post('/HoaDon/_deleteHD', { ID: mahd }, function (data) {

        if (data.result == 1) {
            location.reload();
            setTimeout(function () {
                hideMark();
            }, 500);
        }
        else alert(data.message);
    });
}
function loadDistrict() {
    $('#TINHTHANH').change(function () {
        var tinh = $('#TINHTHANH option:selected').val();
        $.get('/HoaDon/_loadQuanHuyen?tinh=' + tinh, function (data) {
            $('#QUANHUYEN').html('<option value="">Chọn Quận (Huyện)</option>');
            $('#QUANHUYEN').append(data);
        });
    });
    $('#QUANHUYEN').change(function () {
        showMark();
        var phivc = (Number)($('#QUANHUYEN option:selected').attr('data-val'));
        if ((Number)($('#total-cart').attr('data-val')) >= 1000000) {
            phivc = 0;
        }
        var tongthanhtoan = (Number)($('#thanhtien').attr('data-val')) + phivc;

        $('#phivc').attr('data-val', phivc);
        $('#tongthanhtoan').attr('data-val', tongthanhtoan);

        $('#phivc').text(Number(phivc).toLocaleString('en'));
        $('#tongthanhtoan').text(Number(tongthanhtoan).toLocaleString('en'));

        setTimeout(function () {
            hideMark();
        }, 350);
    });
    
}
function Search(url) {
    var type = "sanpham";
    if (url.search("tin-tuc") != -1) {
        type = "tintuc";
    }
    var keyword = $('#txtsearchFull').val();
    if (keyword == null || keyword == "") {
        keyword = $('#txtsearchMobile').val();
    }
    if (keyword != "" && keyword != null) {
        location.replace("/tim-kiem.html?keyword=" + keyword.replace(/ /g, "-") + "&type=" + type);
    }
}
function showcontent(i) {
    //$('.spcontent span.show-more').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
    $('.spcontent').removeClass('active');
    if ($(i).hasClass("fa-angle-double-down")) {
        $('.spcontent span.show-more').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
        $(i).removeClass("fa-angle-double-down").addClass("fa-angle-double-up");
        $(i).closest('.spcontent').addClass('active');
    }
    else if ($(i).hasClass("fa-angle-double-up")) {
        $(i).removeClass("fa-angle-double-up").addClass("fa-angle-double-down");
        $(i).closest('.spcontent').removeClass('active');
    }

}
function showmenu(i) {
    //reset
    $('li.show-menu').removeClass('active');


    if ($(i).find('span').hasClass('fa-angle-double-down')) {
        $('li.show-menu span').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
        $(i).find('span').removeClass('fa-angle-double-down').addClass('fa-angle-double-up');
        $(i).addClass('active');
    }
    else if ($(i).find('span').hasClass('fa-angle-double-up')) {
        $('li.show-menu span').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
        $(i).find('span').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
        $(i).removeClass('active');
    }
}
function FacebookShare(link) {
    FB.ui({
        method: 'share_open_graph',
        action_type: 'og.likes',
        action_properties: JSON.stringify({
            object: link,
        })
    }, function (response) { });
}
function FacebookSendMessage(link) {
    FB.ui({
        method: 'send',
        link: link,
    });
}
function ShareSocial(link, title) {
    $.get('/Home/_socialShare?URL=' + link + '&title=' + title, function (data) {
        $('#social-share').html(data);
    });
    $('#Cleaning').modal('show');
}
function ShowThucDon(spid) {
    $.get('/SanPham/_showThucDon/' + spid, function (data) {
        $('#modal-update').html(data);
        $('#modalThucDon').modal('show');
    })
}


