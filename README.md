# Registration API

### Requirements
- php8.2
- Laravel 10
- MySql 8.0
### Installation
- clone this repo
- run `cat .env.example > .env`
- run `CREATE DATABASE [IF NOT EXISTS]  registrationemailapi CHARACTER SET 'utf8'`
- run `composer install`
- run `php artisan migrate`
- run `php artisan key:generate`
    #### For Dev server
    run `php artisan serve` 
- #### For Queue
    run `php artisan queue:work` 

### Api Endpoint
`/api/register`

##### form-data & types
- name [required,string, max length 255],
- email [required,email, max length 255],
- password [required,string, min length 8],
- password_confirmation [required,string, min length 8]
#### Description
In this api I have used database queue for sending email. For which sending email after registration will no take any user's time. To change Queue driver edit .env file
