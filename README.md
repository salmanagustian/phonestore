# COMING SOOON GUYS! :) #

## Tech spec documentation ###
<ol>
  <li>Framework menggunakan **Laravel Versi 7**</li>
  <li>Database menggunakan **MySQL**</li>
  <li>Pengetasan API menggunakan **Postman**</li>
</ol>

## Library yang digunakan 
<ol>
  <li>API untuk mengatur authentikasi menggunakan **API Sanctum**</li>
  <li>Untuk menyusun UI menggunakan **Tailwind css v.3**</li>
  <li>Javascript framework menggunakan **Vue JS v.2**</li>
  <li>** NPM **</li>
</ol>

## Setup 
Clone repositori menggunakan SSH atau via HTTPS.

```bash
composer install / composer update
```

Jika sudah langkah selanjutnya adalah

```bash
php artisan config:cache
php artisan config:clear
```

Selanjutnya, untuk melakukan generate table jangan lupa setting .env (nama database, username dan password di sesuaikan)

```bash
php artisan migrate:refresh --seed
```

Selanjutnya

```bash
npm install
npm run watch
```

<!-- This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

* Quick summary
* Version
* [Learn Markdown](https://bitbucket.org/tutorials/markdowndemo)

### How do I get set up? ###

* Summary of set up
* Configuration
* Dependencies
* Database configuration
* How to run tests
* Deployment instructions

### Contribution guidelines ###

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact -->