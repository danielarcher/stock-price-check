<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Three Stock Checker</title>

    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <div id="fb-root"></div>

    <div class="container mx-auto">
        <article class="max-w-2xl mx-auto lg:bg-gradient-to-r md:bg-gradient-to-r from-sky-400 via-sky-500 to-blue-600 relative mb-12 rounded-3xl transform -rotate-3 translate-y-14 py-4 font-body">
            <div class="bg-white h-full transform rotate-3 p-16 shadow-lg rounded-3xl">

                <!-- Logo -->
                <div class="w-32 m-auto bg-indigo-800 text-white rounded-lg shadow-lg p-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="47px" height="60px" class="" viewBox="0 0 206 264.2" role="img">
                        <title>Three Ireland logo</title>
                        <path fill="#FFFFFF" d="M171.7 111.1l-5.8-4.6c.6-1.1 1.7-2.7 2.7-4.1 5.7-8.2 16.4-23.8 16.4-46.1 0-12.8-4.7-26.6-15.9-37.3-11.4-10.6-29.2-18-55.3-18C89 1 61.2 9.1 37.1 23.4c-10.8 6.4-19.7 13.3-25.9 19.9s-9.8 13-9.8 18.4c0 2.6 1 5.1 2.9 7 3.5 3.5 9.8 5.1 17.7 5.9 8 .8 17.7.9 28.1.9H52c16.1 0 27.5.4 34.8 1.5 3.6.5 6.3 1.2 7.9 2s2.2 1.7 2.2 2.6c0 .4-.4 1.2-1.4 2.2-3.5 3.5-12.6 8.7-20.8 14.3-4.1 2.9-8 5.8-10.9 8.9-2.9 3-4.8 6.2-4.9 9.4v.2c0 4.1 2.2 7.4 5.5 9.9 10 7.7 30.7 9.7 41.5 11.6 6.7 1.2 10.2 3.6 12.1 6.2s2.3 5.5 2.3 8c0 9.3-3.4 17.5-9.6 23.1-5.5 5-12.1 8.3-21.8 8.3h-1.2c.2-1.8.3-3.7.3-5.4 0-10.9-4.3-20-11.6-26.3s-17.5-9.9-29.4-9.9c-14.7 0-26.4 6.1-34.5 15.1S0 178.2 0 189.9C0 208.4 8.6 227 25.2 241c16.7 13.9 41.4 23.2 73.9 23.2 25.7 0 51.6-8.5 71.3-23.2 16.3-12.2 35.7-34.5 35.7-71.1-.1-33.6-22.6-50.1-34.4-58.8m-102.3 2.3c3.6-3.6 11-8.7 16.5-12.2 5.4-3.5 10.3-6.6 13.9-9.7s5.9-6.3 5.9-10c0-2.9-1.1-5.5-3.2-7.6-3.8-3.7-10.5-5.5-18.8-6.4-8.4-.9-18.4-.9-28.8-.9H52c-8.6 0-15.4-.1-20.9-.3 7.6-2.9 16.4-7.6 25.9-12.7 15.5-8.3 32.7-17.5 48.9-21.6-3.7 4.2-6.2 9.1-6.2 13.2 0 1 .3 2.1 1.1 3s2 1.4 3.7 1.4c2.9 0 6.1-1.1 9.8-2.3 5.1-1.7 10.9-3.6 17.3-3.6 5.6 0 11.7 1.4 18.1 5.8-4.3.3-7.8 1.5-10 3.3-2.4 1.8-3 3.9-3 5.4 0 2.4 1.7 4.2 3.8 6.5 3.3 3.7 7.7 8.7 7.7 16.6 0 5.8-2.2 11.9-5.5 16.6v-1c0-4-.9-8.6-3.1-11.1-1.3-1.5-3.1-2.4-5.1-2.4-3.4 0-6.3 2.6-10.7 6.2-3.1 2.6-6.9 5.8-11.8 8.9-20.4 12.9-31.4 17.8-39.1 18.5-2.8 0-7.1 0-3.5-3.6m18.7 78.8c11.5 0 21.1-3.5 28.5-10.3 7.9-7.2 12.4-18 12.4-29.6 0-5.5-1.7-10.2-4.9-13.7 17.1 4.1 34.9 12.9 44.8 26.1-4.4-1.4-7.5-1.8-10.7-1.8s-5.7 3.4-5.8 7.2c0 2 .8 4.3 1.7 7.1 1.4 4.4 3.3 10.1 3.3 16.8 0 6.2-1.6 13.4-6.5 21.4-.1-6.5-1.9-11.6-4.1-14.4-1.8-2.1-3.6-2.7-4.9-2.7-2 0-3.6 1-5 2.6-1.3 1.5-2.5 3.6-3.8 6-4.7 8.5-12.1 21.9-35.4 28.9 2.1-3.6 3.2-7.3 3.2-10.3 0-1.2-.2-2.2-.5-3.1-.7-1.8-2.3-2.8-4-2.8h-.1c-2.5.1-5.5.9-8.9 1.9-5.3 1.5-11.8 3.3-19 3.3-7.4 0-15.5-1.9-23.7-8.2 2.9-.4 5.4-1.4 7.3-3 1.5-1.3 2.5-3 2.5-4.8 0-2.7-2.2-4.6-4.6-6.8-3.5-3.3-7.8-7.3-7.8-13.9 0-1.9.3-4.1 1.2-6.5.8 2.1 1.9 4 3.3 5.6 2.2 2.3 4.8 3.8 7.3 3.8 2.7 0 4.3-1.2 4.9-2.9.7-1.6.7-3.4.7-4.9 0-1.6.8-3.2 2-4.4s2.9-1.9 4.6-1.9c3.9 0 6.9 2.2 8.9 5.4 2 3.3 3.1 7.6 3.1 11.6 0 2.5-.4 4.9-1.2 6.9l-.9 2.1 1.8-1.4c3.5-2.7 6.2-6.6 7.5-9.4.9 0 1.8.1 2.8.1m-76-127.9c-1.2-.7-2-1.5-2-2.6 0-3.2 3-8.2 8.6-13.7C35.3 31.3 73.9 9.8 113.8 9.8c20.2 0 36.6 5 47.5 14.3 9.5 8.1 14.7 19.5 14.7 32.2 0 19.5-9.2 33-14.8 41.1-2.9 4.1-4.6 6.5-4.6 9.3 0 2.2 1 4 2.7 5.8s4.1 3.5 7 5.7c11.6 8.6 30.7 22.7 30.7 51.7 0 33-17.4 53-32.1 64-18.1 13.6-42.1 21.5-66 21.5-59.5 0-90.2-33.1-90.2-65.5 0-9.6 3.6-19.4 10.2-26.8s16.1-12.4 28-12.4h0c6.7 0 15.1 1.6 21.8 6 6.7 4.5 11.7 11.8 11.7 23.6v1c-.6-1.3-1.4-2.8-2.6-4.2-2.4-3-6.3-5.6-11.9-5.6-6.4 0-11.8 5.2-11.8 11.5 0 1.2-.1 1.9-.3 2.3-.1.1-.1.2-.1.2-1.6 0-3.4-1.1-4.9-3.2-1.5-2.2-2.6-5.3-2.6-9.4 0-.8 0-1.7.1-2.5l.2-1.9-1.3 1.4c-6 6.7-8.2 12.7-8.2 17.9 0 8.5 5.8 14.6 9.2 17.8.6.6 1.4 1.3 2 1.9.3.3.6.6.7.8.1.1.2.2.2.3v.1c-.1.3-.7 1.1-2.3 1.8-1.7.7-4.4 1.3-8.3 1.3-1.4 0-2.9-.1-4.5-.2l-1.5-.1 1 1.2c11.4 13.6 24 17.3 34.9 17.3 8.1 0 15.2-2 20.3-3.4 2.2-.6 4.6-1.5 6-1.5.6 0 .8.1.9.3s.2.5.2 1c0 1.6-.9 4.4-2.5 7.4-1.6 2.9-3.7 6-6.1 8.2l-1.5 1.3 1.9-.3c33.3-4.3 44.4-23.5 49.8-33.5.9-1.7 1.8-3.2 2.5-4.3s1.5-1.7 1.7-1.6c.3 0 .8.3 1.4 1.1 1.6 2.4 3 8.5 3 14.8 0 2.7-.3 5.5-.8 8.1l-.4 1.9 1.4-1.3c12.6-11.6 16-23.8 16-34 0-7.8-2-14.4-3.4-18.7-.8-2.4-1.4-4.5-1.4-5.5 0-.9.1-1.3.3-1.5s.4-.4 1-.5c5.3 0 11.6 1.9 19.2 5.5l1.5.7-.6-1.5c-10.3-24-33.1-34.3-55.3-39.9-11.1-2.8-22.1-4.5-31.4-6.1-6.7-1.2-12.6-2.3-16.8-3.8l-2.1-.9c12.7-1.6 28-10.6 41.7-19.3 5.1-3.3 9.1-6.6 12.3-9.3l4.5-3.6c1.3-.9 2.4-1.5 2.9-1.4.5 0 .8.2 1.3.6 1.2 1.3 2 5.1 2 9.1 0 3.3-.4 6.8-1.2 9.6l-.4 1.6 1.4-.9c10.8-7 16-17.5 16-27.3 0-9.9-5.5-16.1-9-20-.5-.6-1.2-1.3-1.7-2a7.96 7.96 0 0 1-.8-1.2c.1-.3.4-.8 1-1.2 2.3-1.7 6.1-2.7 10.6-2.7 2.3 0 4.7.3 7.2.8l1.7.4-1.1-1.4c-9.3-11.9-20-15.4-29.5-15.4-7.5 0-14.3 2.1-19.2 3.7-2.4.8-5.8 1.8-7.2 1.8h-.4c0-1.7 1.3-4.7 3.7-7.8 2.4-3.2 6-6.6 10.7-9.4l1.7-1-2-.1c-.9-.1-1.7-.1-2.6-.1-19.1 0-43.8 13.9-62 23.3-11.7 6-35.5 19.8-42.7 15.5"></path>
                    </svg>
                </div>

                <p class="text-lg my-2">This was a very fun project, so please log in with your Facebook account and enjoy this wonderful experience.</p>

                <!-- Facebook -->
                <button class="bg-blue-500 px-4 py-2 font-semibold text-white inline-flex items-center space-x-2 rounded" onclick="FB.login();" id="facebook-login">
                    <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    <span>Login with Facebook</span>
                </button>
                <button class="bg-blue-500 px-4 py-2 font-semibold text-white flex items-center space-x-2 rounded" onclick="FB.logout();" id="facebook-logout">
                    <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    <span>Logout</span>
                </button>

                <hr class="mt-4">

                <!-- Stock -->
                <section x-data="stockCheck()" id="stock-form">
                    <form action="">
                        <h2 class="text-3xl font-extrabold my-5">Check Your Stock price</h2>
                        <div class="my-2">

                            <div class="flex">
                                <input class="border w-full border-gray-400 block rounded-l focus:outline-none focus:border-indigo-800 p-2" id="symbol" type="text" placeholder="STOCK SYMBOL" x-model="formData.symbol">
                                <input class="block rounded-r p-3 bg-indigo-800 text-white" type="button" value="Check" @click="fetch()" x-model="submitButton">
                            </div>

                        </div>
                        <div class="flex text-center ">
                            <span class="w-1/4 text-gray-800 font-semibold">Symbol</span>
                            <span class="w-1/4 text-green-500 font-semibold">High</span>
                            <span class="w-1/4 text-red-500 font-semibold">Low</span>
                            <span class="w-1/4 text-blue-500 font-semibold">Price</span>
                        </div>
                        <div class="flex space-x-0">
                            <input class="border w-1/4 border-gray-400 block rounded-l focus:outline-none focus:border-indigo-800 p-2" x-model="symbol">
                            <input class="border w-1/4 border-gray-400 block  focus:outline-none focus:border-indigo-800 p-2" x-model="high">
                            <input class="border w-1/4 border-gray-400 block  focus:outline-none focus:border-indigo-800 p-2" x-model="low">
                            <input class="border w-1/4 border-gray-400 block rounded-r focus:outline-none focus:border-indigo-800 p-2" x-model="price">
                        </div>
                    </form>
                </section>
            </div>
        </article>
    </div>

    <script>

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
    </script>
    <script>
        function onlogin() {
            FB.getLoginStatus(function(response) {
                toggle(response.status)
            });
        }

        function stockCheck() {
            return {
                formData: {
                    symbol: ''
                },
                high: '',
                low: '',
                price: '',
                symbol: '',
                submitButton: 'Check',
                fetch() {
                    this.high = '';
                    this.low = '';
                    this.price = '';
                    this.symbol = '';
                    this.submitButton = 'Loading...';
                    fetch(`/api/check-stock/${this.formData.symbol}`)
                        .then(res => res.json())
                        .then(data => {
                            console.log(data);
                            this.high = data.high;
                            this.low = data.low;
                            this.price = data.price;
                            this.symbol = data.symbol;
                            this.submitButton = 'Check';
                        });
                }
            }
        }
    </script>

</body>
</html>
