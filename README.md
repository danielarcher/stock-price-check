## Stock Price Check

This is a Laravel web application using Blade, AlpineJS and Tailwind css.  
Frontend Interface configured behind facebook JS login.  
Using AlphaVantage api for the stock market search.

- [Laravel](https://laravel.com).
- [AlpineJS](https://alpinejs.dev/).
- [Tailwind Css](https://tailwindcss.com/).
- [Facebook JSSDK](https://developers.facebook.com/docs/javascript/).
- [Alpha Vantage](https://www.alphavantage.co/documentation/).

## Set Up

```
$ composer install
$ docker-compose up -d 
```

## Test It

```
$ curl localhost:8000/api/check-stock/AMZN
$ {"symbol":"AMZN","high":"3576.5000","low":"3525.1466","price":"3540.7000"}
```


##
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
