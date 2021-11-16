
function toggle(status) {
    console.log(status);
    if (status === 'connected') {
        document.getElementById('stock-form').classList.remove('hidden');
        document.getElementById('facebook-login').classList.add('hidden');
        document.getElementById('facebook-logout').classList.remove('hidden');
    } else {
        document.getElementById('stock-form').classList.add('hidden');
        document.getElementById('facebook-login').classList.remove('hidden');
        document.getElementById('facebook-logout').classList.add('hidden');
    }
}

var login_event = function(response) {
    toggle(response.status);
}

var logout_event = function(response) {
    toggle(response.status);
}

var check_already_logged = function(response){
    FB.getLoginStatus(function(response) {
        toggle(response.status)
    });
}

window.fbAsyncInit = function() {
    FB.init({
        appId: '415952336744654',
        cookie: true,
        xfbml: true,
        version: 'v12.0'
    });

    FB.AppEvents.logPageView();
    FB.Event.subscribe('auth.login', login_event);
    FB.Event.subscribe('auth.statusChange', login_event);
    FB.Event.subscribe('xfbml.render', login_event); //when https use check_already_logged
    FB.Event.subscribe('auth.logout', logout_event);
};

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
