# Nusantara Trip Back End Laravel

![image.png](https://raw.githubusercontent.com/Mahesaadikusuma/Nusantara-laravel/main/image.png)

## Dicoding SIB Cyle 6 Front End & Back End

Proyek yang hendak kami kerjakan adalah sebuah aplikasi sistem informasi pariwisata di Indonesia. Proyek kami memiliki latar belakang dari meningkatnya destinasi wisata yang berada di Indonesia baik pada area yang mudah dijangkau hingga paling sulit untuk dijangkau. Dari pernyataan tersebut, solusi yang hendak kami berikan adalah memungkinkannya para wisatawan baik dalam negeri maupun luar negeri dapat mengetahui informasi secara detail hingga fasilitas yang ada

## Table of Contents

-   [Features](#features)
-   [Installation](#installation)
-   [Usage](#usage)
-   [Teams](#Teams)

## Teams

-   Mahesa Adi Kusuma (Back End)
-   Acxell Rizada Sudigto
-   Devina Ayu Septariza

## Tema

Tema Nusantara Trip untuk Capstone Project Dicoding Cyle 6 : Sosial, Budaya, Pariwisata dan lingkungan yang berkelanjutan

## Features

-   Membuat Feature CRUD Destination
-   Membuat Feature CRUD Event Destination
-   Membuat Feature CRUD Article
-   Membuat Feature CRUD UserRateDestination & Article Review

## Installation Web Aplikasi Nusantara Trip

1. Clone the repository:

    ```bash
    git clone https://github.com/Mahesaadikusuma/Nusantara-laravel.git
    ```

2. Arahkan ke direktori proyek:

    ```bash
    cd your-project
    ```

3. Install Depedency Composer PHP:

    ```bash
    composer install
    ```

4. Install Depedency Node js:

    ```bash
    npm install
    ```

5. Start Build Aplikasi node js

    ```
    npm run build
    ```

6. Copy paste File `.env.example` ke `.env` untuk configure database

    ```
    cp .env.example .env
    ```

7. Setup database di file `.env`

    ```
    setup databse DB_CONNECTION mysql
    ```

8. Generate Aplikasi key

    ```
    php artisan key:generate
    ```

9. Start development Aplikasi node js

    ```
    npm run dev
    ```

10. Start Laravel

    ```
    php artisan serve
    ```

## Usage

Dokumentasi API Laravel
Ubah Environment variabel

-   API_URL : untuk Web Aplikasi Online
-   APP_DEV : Local server Laravel
-   [Dokumentasi Nusantara Trip Postman](https://documenter.getpostman.com/view/23896501/2sA3Qv9X19).

Di File Config.js ubah URL :
Web Aplikasi Online : Batas Hosting 07/07/2024

-   `https://furniluxe.shop/api` URL untuk API Web Aplikasi Online
-   `https://furniluxe.shop/storage` URL untuk image laravel

Aplikasi Back End Laravel Local

-   `http://127.0.0.1:8000/api` URL untuk API laravel
-   `http://127.0.0.1:8000/storage` URL untuk API laravel

[Github Nusantara Back End](https://github.com/Mahesaadikusuma/Nusantara-laravel)
