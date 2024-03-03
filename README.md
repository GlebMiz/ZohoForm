## Zoho Form

This application allows the user to create Deals and Accounts in Zoho CRM

Application contains:
- Welcome page
- Form for adding Deals and Accounts

The application is made using Laravel 10 and Vue.js

## How to start

1. First you should install required dependencies:
```shell
npm install
composer install
```
2. Make a copy of .env.example file as .env and configure it with your data, don`t forget to fill zoho account fields.
3. Run ```php artisan key:generate``` to generate app key

**Congratulation!** The application is ready to use.

Now you can run ```npm run dev``` for development mode or if application is ready for production ```npm run build```
You can also use ```php artisan serve``` to start the built-in PHP web server
