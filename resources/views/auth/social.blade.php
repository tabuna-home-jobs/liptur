

{{-- Social buttons--}}

<script src="//ulogin.ru/js/ulogin.js"></script>

<div id="uLogin" data-ulogin="display=panel;
     theme=classic;fields=first_name,last_name,email,photo;
     providers=vkontakte,odnoklassniki,mailru,facebook;
    hidden=other;redirect_uri={{urlencode(url('/ru/ulogin/'))}};mobilebuttons=0;">
</div>

