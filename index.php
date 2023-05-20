<?php
require 'config.php';
// session_start();

if(empty($_SESSION["id_apprenant"])){
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CENTER</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/analytique.png" rel="icon">
    <link href="assets/img/analytique.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
<!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->

    <!-- =======================================================
  * Template Name: MyResume
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a>
                </li>
                <li><a href="#Profile" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Profile</span></a>
                </li>
                <li><a href="#training" class="nav-link scrollto"><i class="bx bx-file-blank"></i>
                        <span>training</span></a></li>
                <li><a href="#History" class="nav-link scrollto"><i class="bx bx-book-content"></i>
                        <span>History</span></a></li>
                <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a>
                </li>
            </ul>
        </nav><!-- .nav-menu -->

    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <?php
             $id_apprenant = $_SESSION["id_apprenant"] ; 
             
             $result = mysqli_query($conn, "SELECT * FROM `apprenants` WHERE id_apprenant = ' $id_apprenant' ");
             if($result){
              $row2 = mysqli_fetch_assoc($result);
              $nom_apprenant = $row2["nom_apprenant"];
              $prenom_apprenant = $row2["prenom_apprenant"];
              $email_apprenant = $row2["email_apprenant"];
              $mot_de_pass = $row2["mot_de_pass"];

            }
?>

            <h1><span><?php echo $nom_apprenant; ?></span> <?php echo $prenom_apprenant; ?></h1>
            <p>Welcome <span class="typed" data-typed-items="to our center"></span></p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Profile Section ======= -->
        <section id="Profile" class="Profile">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Profile</h2>
                </div>
                <div class="container">
                    <div class="row gutters">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="account-settings">
                                        <div class="user-profile">
                                            <div class="user-avatar">
                                                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUSFRgVEhIYGRUYGBIYGBgYGhESGRISGBgZGRgYGBgcIS4lHB4rHxkYJjgmKy8xNTU1GiU7QDs0Py40NTEBDAwMEA8QHxISHzQsJCYxNzQ0NDQxNDE0NDQ0NDE0MTQ0NDQ0NDQ0NDQ0NDQ0NDQ0MTE0NDQ0NDE0NDQ0MTQ0NP/AABEIAOEA4QMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAACAAEDBAUGBwj/xABCEAACAQIDBAgDBgMGBgMAAAABAgADEQQSIQUxQVEGIjJhcYGRoROxwUJSYnLR8BSi4QcjgpKy8TNDU2NzwxUkNP/EABoBAAIDAQEAAAAAAAAAAAAAAAABAgMEBQb/xAAsEQADAAIBAwMDAwQDAAAAAAAAAQIDESEEEjEiQVETYYEFMrFCcZGhFBUz/9oADAMBAAIRAxEAPwBESRSeZiYRS04wsx5n3iLHmfUwYoAFmPM+pizHmfUxrR8sAGzHmfUx8x5n3iCxwIAMCeZ9THzHmfUwrRmMBDZjzPqZFVxSr2m15aknymLtHGurlVJK6br8e+Q0qhO8W8Ta/wBZB0b8XR1SVUzSxOPb7It4lbn1lNse/MjzJkb5RuHuZRr1F5e7H6xdzNk9NE+xbfHP98+v6ys+0HH/ADHHhl+ome9Tv+shap3xbZP6M/C/waibbrU9c+dOOmo8R9Z0eytqrXGhsw3rfhzHdOELw8BiDSdXuRY3uNfEESSoozdLLn0rTPRTfmfUxsx5n1MDCYlaiBlI77cDJWWTOQ9p6Y2Y8z7xZjzPqY1o4iGPc8z7xsx/d4UUAGzE8fnFc8z6mICPGAOY8z6mLMeZ9TEYMAHzHmfUxoooAGYxhQTAEDFFHEQwhHtEseADWjgRR4AZu1cf8IaWuQN99N8559ou5u1Q/K0Da+MZnIYm40toQOQEqI/Gw8NPnK6ezsdPgmYTa5NKiyN2mzeX1l+nTS2gE5SttPWynzAv898JExDao7i/cVt9PS8jo0/2OjxBA4CY+JqjulDEYet9trnvvp6aym2EbiPW+vvGkBbq4leY9pWbEjhc+RjJg+YEnWiFkiPJErk8D7Qs2XeQPSPVZraKfL6mVGLX1HtaAM3dj7a/h211Q7wPOxHrOswe36NS2pW/3gbX8RPNFJBmpg6hTjoZJMy5emm3v3PShYi4NxzGsYiYWwsXdSVOi9tOBQ/bUcCOI425zoCsZzLlxTlgCOIohAgKKKK8ABMYxzFGMGKKKAEggtCgtASBiihCIkEsKCseAhSLGYkU0ZzuUbuZ3AeslmJ0qpsaQZWIAYXFyL33RNlmKVVpM5LEYm5LNpckyo9clSeJ0UcgePjCekTqbeJ/rOp6CdGf4qtnq/8ACp2OXd8RuA7hz5yqnpbZ3pnb0jU6AdCPiKMRiF0OqKeI+8Zu9NqwwipSoqgNQHMbaql7aHvsRO5XLTXgqgeAAE8n6cY9cRir03zIqKt+GcdoqeW7Xu9ap3VbZY3paXgy7g8BKuIpjfb5yZUe2jDz0t6W95QxY+8w8ixMuKirWqWPAe59IOGomo1oyU7nqi3zP6Tp9hbOsMxG/d4c/O8VVpFkRth4HZgsNJfbZKW1Qek2sNhgIeIp2EzO3s1di0ebbV2aKbmw6p1t87TNbq7jpw/rOp6SU9zDeD7cpyVc/v5TTD2jFknVGl0exnw6633N1SOebS3rY+U9BUWAHIAegE8v2UCa9Mf9yn/qE9RaWo5HWJKkwTFFFGYxRo8UABMGE0GMBRRRQAkgmOYEQIUkEGOIDCEUaPABCYPTAsKaEXy5jfxtpf3m+BMzpMl8M+l+x5XYC/vEy7A9ZF/c8/w7ktfyHieJ/fGe0dAMIUoBjubd3988RWplUniCR5/sT6L2Yi06KDcAi/KZsr9jvY17nFdJ8RQNerRxANNx/eUqqi+dWW5R1Ha6wax/QzgFcliLnebHUX13i87H+0baOGxIUUyTXQkBuqFKHtK3E7rj/ecDSrODaxv37vWTlcBXwbgDgavceFj63t7TPdcxsL+suYbC16osq+YUgDznQ7M6Nuu9RfiSTvhVJEoxN+TK2Xsu+rDT6TsNn4Mgbpd2fsULq2p9APKahCINSB5gSh06NK1PCKaUcsqY1rCS47bmGpjrVU8AQx9pzNfpXQdiuVgvBxY+oiUV8B3yVtsJnRh3XnAVnuTzE79cQtS5Vgw5icHj1y1HHJm/fvNEccGbPrhml0WscVTvze35sjEfKejNOA6G4Rnrh7dVAzE95BUD+Y+k78y5eDh9W95PwBFHIiMZlGiiijEC0YR2gwAUUUUACJgwjGEQ0EI4jRxABCOIhFAAlkqIrEB6Ydbi6Nubl72PlIhJaR1B7x84n4J467bT+55xtfBH4nwwnWvYAjfc2X1FjfvnsuIwnx8OtOoLEZVde1YqLHuOu6+m4zD6S7IQ47Astus5V+5kPxFB8VD/AOWdfjaFwzJo1tfxAc5lt+D0a1vjwcm3RXBhdVIP3rgW8t05javRlASaOJH5Wt8wfpN+tRq16uSnR+I5+1VLCjT/AMP2zqPCcztqvVDmiWQtnqIQlBVRQhsGJ5Egi17jjwkpT8k6cJ6ZTwqYvCvdWLLxUNnUjwOonomxtorXQNax3MOKnlOIwtCpTyE2s4BsOy1+Q4Hw3zXwmGxD4hKdFxTLo7u2UMQi2AOviPWRtb8lk6S2vB1GJ2gKYPhPMtqYmtinbKTkudWNl8p0HSzZuJw6hjiWdGZVa4UWzG3CYWEwj4h1pouhIAXctt13PLuhjWlsjdIDB7Bo762IH5VKr7n9JtDYuFy2UE9+YmY1apWotkRlDZqqsBR6iZGKi7ltc1ie7vliolVVR6iJ11Vs9MGmyki9nXc2/wDpLGn8lcXDetEn/wAatF81O+U6EX4eE4/aK/3rn8X0neCmXW/P9/UTmdoYD/7CoB2kUjvbOQSfW5hL5DLPC0bvQygVR78chtyJBt7TorSpsrD5EK/it5AD9TLhl0vaOB1evrNL2AiIhGMYzMwYxhRjAATGjmNAYMUUUYBmMI8QgIUcRo4gNDxxGEKIBCSLpAEKAI6qrs4NVFRvsHOn5rZSf8rN6zVTUSngKgqUVObrEZTfcGXqkd1xJKFXhMVLXB6Sa75T+wONw2ZRl0ZdxGhBnHbXwQdy9SkC53mzrnt94KQrG3G07io4O42PrfxEo1MKX3lbeJ+Vo1RZOv6kcfhsA9VwSAOGoFgPA6AWnRdHMJd3r8G6lPh/dId/mdfSW6uDGUop7WhI0svGXcOAigKLAAAdwkWydPaOc6bUQ9BlPE2+s4/YgKnSwdT1uBY8GB752fScZk04G853B4cObjRhuI+R7pJPSJqfA2Lwy1HLvSBYkEnXrWFutYjNppreRVMM9RwX3DcP05CbaoftAe4jlFH7Pzg7GoS8IzWohV3f7/vTynNbRIXEo33UP8zED5GdPjKgtYTBGFz1GZh1RlA/FlBsPVn9BHHhkci5Rt4FroDzv+n0kxioU8iBeQ18YmmmVpaPL56VZKa92NGjmIyRSwTBMIwTABWjGOIzRgNFFFAYRjCOYwiIijxRQJIcQoEcQAIQ4EKAF/Z20Wok2F1OpB58xN7DYgVFzgWuTcciDOTE3uj73R15MD5Ef0MpyytbOh0Oelahvg1kN5YVZDTEtKJmTOzTIK5Cgk6AAknumfh9u0GLIrA5dDlKsV/MOE2GQEai95gno9h6bPURLOVYZtSQDqbGAS5a0zP2ztNCpyr3DXS3MzG2UAGJBBDa6EGUtvbPZk64ul7ga2NuY4wNiqU1v3WGgA5AR+xoWvCOqY2Eo4l5K1a4lHEPeQRMpYqpLOGwmSxJ13275ScZmA5kD1M2WmrHKa5ON+pZ6lqZflcgQGhkwGl5wxojFGMAGMBocEwAQjNHjGADRRRQAIxhHMYQEOIoojABR1MaIQJBiPeMI4EAHWaWxa+R7Hcwt57x+++ZywlMjU7WieO+y1S9jtUMnD2F5kbPxWdVJ0OvnY2lvE1erMNLT0ejilcpr3ArbYpJmL1FVV7RJAtMWv0ywzDKucodM9mA8Q1re8mbZGGvnekjPe+cgFh4EyntLadOmMoTMOQCiEtMvjHPuUdo9IcIUCK2YDQsCp+V5nU6lF9adRT5i8lTFU6gIFLLfnb6SBdnU812RWI3XAIEltIucz7FsuV04SGo8eu4lWo9oStlTrRNgkzPfgoJ89w/fdNMmRYShkXXtHU/QSSbInSPNdXl+rlbXhcIUAwmMGSMoxg3hNAJgMUExExgYAOYxjwTABoorxRgSGMI5gxERzETGvEIDCiEUQgMNYYEjWSiACjxRRETd2XTz0DbtK7W9AfrJErZ+qdDF0cPUcfiB9V/pI9o0CpzLoRMeRepnoekreFFtdnl950jVdhUQLuMx79BM5NtZRZtGGkrYzbxYWkFJqVU/cs4vZFJdUAA7pkYjCZb2MJtrgpb1mTiceTfXSHY2W/U0gMQ4HHdKtBs7gcLr56yEuXPdLmEp2dPzL8xLZWinI9y39joHkZElaAZqPLsBhAkhEjaMQxMAxzGgMYxo5jQAUExzGMAGijRRgTGAYcExEUDCBgxCBIMRxGEcQANZJIg0MNeAmGISUy24QAY2xHNfGJTHYS7tyYp2f5iPSJvRbhwvK38LydZsnDimGT7Yy5z+Ii9h3AaesnxFO8o7OLLi8WjneaDoP8AtlCP9YeatVdJjv8AczvYZUQkjnMfskODacvjcC9Mm49J6JKG0cKrKdJHZdLPO3v3yAoTvP1m9jMKAZmvTkkyZDh6cmq1PhjP90g+klpU9JR22SUKL2mso/MxAHzkpfqQrXoezpaVYOoYHeAfIwrznulNF6FGlUpsVekQrEcUew1HEZguneZp7Kxwr01cbyLMOTDeP3zmnZ5zLh7V3Lx/BdJkbQiYBkjMDGjtAMBjmDeK8aAxRGKIwAaKK8UYEw3QGMSnSMTAihoo14rxEggYQMjvCVoAHeIGPTQsbKCTyGs2sNsbIrPW7KqzFb6mwvY8hKsmaMa5ZZiwXkekjDxNXKpPHcPGXP7OaYNfEMd+WkB4DP8Ar7TnsXiS7EnvsBoB3Acpq9C8Z8PEFb9tbeLLrb0Jim+6jsrpfoYGvLfLO62zhGDJiKYu6Aq6jfUpE3IHMg6jxPOTUK61FDKbgiXke+vAzIxmGNBi9PsHV1+4T9od3P1kcs+6DBlT9L/A9dbHSVMTXAU5jwlsVAwvKePoB1IIveUGydJ8nI1qudiRu4SD4NzNl8GFG6Q06Wt+USLXoqV0CCRbI2caj/xFQWRScg/6j7s3gOHf4TeobH+J16wITgu41PHkvzh4ysOFgq6ADQADlL8ce7MHVZ1rtk5rpjUthnB3tYe85jo9tL4FwwJQ2v3EcRL/AEvxecqg3XvObVrS+uNFWLErxtV4Z6Hh8WlQZkYEelvGSFpzHRZyXcX0y3876TpEN5RXUzNdtGev0ytd0Pf2ZJBaOUa2gvIi3OXTkmuUzBeK4eqWh4o14ryZAcwTFeMYAPFGigIcNHvI7xK1zYb+UYw4008FsWrU1tlXm2noN838FsGlT1frt32t5CZMvV4sfDe39jRi6XJk8LS+WcrhMC9U9RSe/gPOb+D6NAa1XPgunvN4WGgFhyGkZmnMy/qF1xPCOli6CJ5rlkNHDJSFqaAfM+J3yDF3alWHEo9v8pk28yRB7zF9Ruu5vZ0JiYWkjyNjBpVSjBlNmUgg8iJd2xhPg1XQ7lY5e9Dqvtb0mc4neitpUixpNHr3R7aq4mkHXeNHXijcfEd81MXXSnTd6jBURWdydbIoudOM8g6PbYfCVQ66qdHXdnXj58p1PTnpBTqYNEouD8dwGAIzJTSzMGG8G+UeF5oVKjl5MLx1x4L+z8Uteka+GRwuZ+o1s2VTvW2nfl9IlxwYXBmd0MqmjRezAgDOUOl7byCfC3pD2qFVxUpiyOTdfuvvPhf6GV5Ma8ouw5dvtr8EzqXIAFyTYDmTKuIxQog/DKs4PbNmRD+BT2z3nTkDvlilXy02cDrGyL3FgczeNhb/ABTGqIWHIQxRvkOozdvpRuYbbH8TTDWAcHK4G4N94dxHyImRtTEhQbmwGpPKV9m4pMO7F+rSKMGPJgMynvNxb/FOO21thqzG2i3Nh56E98ubUsyxidv7FXaOK+I5b08JTGsSqTJVW0g3vlm+Z0tI6TolSPXe2nVUeO8/MTpQkrbGwfwqKKe0es3iZpKk4+a+62zZE6kjQSRqYbeIYEJZUrpPaCsU2tUtlR8D90+RlOrSZO0JtLDKXFiLia8fXVPFcnNz/pkVzD0/9HPZorzRxGzQdUNu47pnOhU2IsZ0cWeMi4Zx83T5ML9S/I8Ujil+jPssYbCvWbJTGp48FHMzrNk7Dp4cXPXfeWPPul/C4VKKBEFha55luJJ5wajzg9T11ZH2zwv5O503QzPNcssNVtIPiyIuIykTDs6ShIn+KYg95GLRmHKRHpFi8Yyv8RhCWvANGF0w2YaqfFQddAcwG9qe8+Y3+s4Maz1rPf8Ae+cR0n2AaRNait6ZJLqP+WeYH3flOj0nUJeivwC+DnCk5vF44tXYg9UWUeX9bzcxuJyU2Yb7WHid05vCUCTczqz8leT4Op2X0hq0xlIDryO/yM7ejXXF4fOiqG7QtoQy7wQO6/rPNKVOdZ0KxeSoaR7LjMPzDePMSSrfDM+bElPdPlHTYai2QK3Nn043CgDyC+84jb3SchilCwUEjNoxa3EX0E7TpbjxhsM+U9dlVF8WGp/y39J49lJN5J8cIqwx3t3RLiNoVKhDPUY2I3k2t4SV0uZTamTL1EHIAd408pBmqVodVtN3o1sz4jfFcdRDpf7b/oPn4SrsXZbYl9bimvabn+Ed87ulRCAKgsqiwHKY+pz9q7Z8l2ONvYaJzhWjBTDVDOYX6GAhjwhrShhInSDZGEkirDAhiQdEWyK0hxOGVxqNecuWkLnXwk8eSpraK7xzklzRk/wLfu0U1bx5s/52Qwf9biOhcZrjjM1yZoK2oP7tKuOTK1xuPznNXJunh6K5jZos0AwLCdKksJUBlBZOjxNCaLLKDIXS0NWjvaRI+CMGSo/A7pVY2hI8ZJraOZ6R9CUrjNh2CEm5Q3CE/hI7Py8JxeM2NVw+lSmyd9rqfBhp7z2EG8ZlvpvHI6zZi624Wq5RDtPGkFpZw1f4LpU4IwJ/KdG9iZ6RitgYapq9BAeaXpn+W15kbQ6J4YI7dcAI5IzXFgpNt15tjrob8MTnaaMT+0TEZ6qIDplDEa8hr3jQ+s5JlvoJ2r7OTF1ya6urLTpiwbQKxfjlBBupFu7fNTD9H8KnZoBu9y1T2Y2luXq5h6aeyGLH6Vo86w+GZzamjMfwgt8t039n9FnaxrHKu/KCCx7iRoJ26Uwosqqo5KAB6COEmS+uquJWi6caXkqYbCrTUIi2Ubh+ssBZKFhWmJ22WLgjCQwsMLCtIOgbAAj2hWiyxEQbRQiIMEMLNYEmVA1z7ybEtYBeep8BKdJrmWSuNjRbtFD+GYodwGssW0ewPKNFK5Kf6kUBHiijLRhDEUUQmTLDMUUiQZXqRliijLPYnpyWKKBBgvKW1P8AgVf/AB1P9Biik8X7kJ+DlNlf/or/AJML/wC2dBTiimvrP/QeH9qCjiKKYywIQhGigAQhRRRMQoooohAtGXfGijQyDH9o+AlbBduKKXT+0a8GvFFFKQP/2Q=="
                                                    alt="">
                                            </div>
                                            <h5 class="user-name"><span><?php echo $nom_apprenant; ?></span>
                                                <?php echo $prenom_apprenant; ?></h5>
                                            <h6 class="user-email"><?php echo $email_apprenant; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mb-3">Personal Details</h6>
                                        </div>
                                        <?php
   if(isset($_POST['update'])) {

      // Retrieve the form values
      $firstname = $_POST['nom_apprenant'];
      $lastname = $_POST['prenom_apprenant'];
      $email = $_POST['email_apprenant'];
      $password = $_POST['mot_de_pass'];

      if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
        echo '<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs</div>';
     } else {
        $sql = "UPDATE apprenants SET nom_apprenant='$firstname', prenom_apprenant='$lastname', email_apprenant='$email', mot_de_pass='$password' WHERE id_apprenant = 3";
        // Replace 'id_apprenant = 3' with the appropriate condition to identify the user you want to update
     
        // Execute the update query
        if(mysqli_query($conn, $sql)) {
           // Update successful
           echo '<div class="alert alert-success" role="alert">Les données de lutilisateur ont été mises à jour avec succès</div>';
        } else {
           // Update failed
           echo '<div class="alert alert-danger" role="alert">Une erreur sest produite lors de la mise à jour des données de lutilisateur : ' . mysqli_error($conn) . '</div>';
        }
     }
   }
?>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" >
                                            <div class="form-group">
                                            <form action="#Profile" method="POST">
                                                <label for="FIRSTNAME">FIRST NAME</label>
                                                <input type="text" class="form-control" id="FIRSTNAME" name="nom_apprenant"
                                                    placeholder="<?php echo $nom_apprenant; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="LAST NAME">LAST NAME</label>
                                                <input type="LAST NAME" class="form-control" id="LAST NAME" name="prenom_apprenant"
                                                    placeholder="<?php echo $prenom_apprenant; ?>">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="email">email</label>
                                                <input type="text" class="form-control" id="email" name="email_apprenant"
                                                    placeholder="<?php echo $email_apprenant; ?>">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="Password" name="mot_de_pass"
                                                    placeholder="<?php echo $mot_de_pass; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                <button type="button" id="submit" name="cancel"
                                                    class="btn btn-secondary">Cancel</button>
                                                <button type="submit" id="update" name="update"
                                                    class="btn btn-primary">Update</button>
                                                <a id='logout' href="logout.php" id="submit" name="submit"
                                                    class="btn btn-danger">Log out</a>
                                                    </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
               
        </section><!-- End Profile Section -->
        <!-- ======= training Section ======= -->
        <section id="training" class="resume">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>training</h2>
                </div>
                <div class="top-nav-right">
                    <form class="form-inline" action="#" method="post" style="display: flex;">
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" name="titre" placeholder="Search"
                                style="width:10vw;">
                        </div>
                        <div class="form-group mx-sm-3 mb-3">
                            <select class="form-select" aria-label="Default select example" name="Categorie">
                                <option selected name="etat">Categorie</option>
                                <option value="informatique" name="informatique">informatique</option>
                                <option value="Marketing" name="Marketing">Marketing</option>
                                <option value="Gestion de projet" name="Gestion de projet">Gestion de projet</option>
                            </select>
                        </div>
                        <div class="form-group mx-sm-3 mb-3">
                            <select class="form-select" aria-label="Default select example" name="Masse_horaire">
                                <option selected>Masse horaire</option>
                                <option value="30" name="30">30</option>
                                <option value="40" name="40">40</option>
                                <option value="50" name="50">50</option>

                            </select>
                        </div>
                        <button type="submit" name="recherche" class="btn btn-primary mb-2"
                            style="background-color: #DFF3FC;border:1px solid #000;color:#000;margin-top:-1%;"
                            id="btn">SEARCH</button>
                    </form>
                </div>
                <section class="py-5">
                    <div class="container px-4 px-lg-5 mt-5">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            <?php
                                $query="";
                                $result = "";
                                if(isset($_POST["recherche"])){
                                    $titre = $_POST["titre"];
                                    $Categorie = $_POST["Categorie"];
                                    $Masse_horaire = $_POST["Masse_horaire"];

                                    if($titre!=""){
                                        $titre_escaped = mysqli_real_escape_string($conn, $titre);
                                        $query="SELECT * FROM `formation` WHERE titre = '$titre_escaped'";
                                        $result= mysqli_query($conn,$query);
                                    }     
                                    elseif($Categorie!=""){
                                        $query="SELECT * FROM `formation` WHERE `Categorie` = '$Categorie'";
                                        $result= mysqli_query($conn,$query);
                                    }
                                    elseif($titre!="" && $Categorie!=""){
                                        $query="SELECT * FROM `formation` WHERE titre = $titre_escaped and 'Categorie' = $Categorie ";
                                        $result= mysqli_query($conn,$query);
                                        }
                                }else{
                                    $query="SELECT * FROM `formation`";
                                    $result=mysqli_query($conn,$query);
                                }
                               
              
                                // $row = mysqli_fetch_assoc($result);
                                while ($row = mysqli_fetch_assoc($result)){
                                    ?>
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="<?php echo $row['image'];?>" alt="..." width="250" height="250"/>
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder"> <?php echo $row['titre'];?></h5>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" name="id"
                                                href="details.php?id=<?php echo $row['id_formation'];?>">Join</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                
                                }
                    
                            ?>
                </section>
                          
        </section>



        </section><!-- End training Section -->

        <!-- ======= History Section ======= -->
        <section id="History" class="portfolio section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>History</h2>
                </div>
                <?php
// Fetch all the sessions the user is registered for
$user_id = $_SESSION['id_apprenant'];
$result = mysqli_query($conn, "SELECT * FROM inscription INNER JOIN sessions ON inscription.id_session = sessions.id_session INNER JOIN formation ON sessions.id_formation = formation.id_formation WHERE id_apprenant = '$user_id'");

// Separate the sessions into two categories: past and future
$past_sessions = [];
$future_sessions = [];
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['date_fin'] < date('Y-m-d')) {
        // Session is in the past
        if ($row['resultat'] == 'validée') {
            $row['resultat'] = 'Formation validée';
        } else {
            $row['resultat'] = 'Formation non validée';
        }
        $past_sessions[] = $row;
    } else {
        // Session is in the future or ongoing
        $row['resultat'] = 'Formation en cours ou à venir';
        $future_sessions[] = $row;
    }
}
?>

                <div class="row">
                    <div class="col-lg-6">
                        <h3>Formations passées</h3>
                        <?php if (count($past_sessions) > 0) { ?>
                        <ul class="list-group">
                            <?php foreach ($past_sessions as $session) { ?>
                            <li class="list-group-item">
                                <h5><?php echo $session['titre']; ?></h5>
                                <p><?php echo $session['date_debut'] . ' - ' . $session['date_fin']; ?></p>
                                <p><?php echo $session['resultat']; ?></p>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } else { ?>
                        <p>Aucune formation passée trouvée.</p>
                        <?php } ?>
                    </div>
                    <div class="col-lg-6">
                        <h3>Formations en cours ou à venir</h3>
                        <?php if (count($future_sessions) > 0) { ?>
                        <ul class="list-group">
                            <?php foreach ($future_sessions as $session) { ?>
                            <li class="list-group-item">
                                <h5><?php echo $session['titre']; ?></h5>
                                <p><?php echo $session['date_debut'] . ' - ' . $session['date_fin']; ?></p>
                                <p><?php echo $session['resultat']; ?></p>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } else { ?>
                        <p>Aucune formation en cours ou à venir trouvée.</p>
                        <?php } ?>
                    </div>
                </div>


        </section><!-- End History Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                </div>

                <div class="row mt-1">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                    required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3><span><?php echo $nom_apprenant; ?></span> <?php echo $prenom_apprenant; ?></h3>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>Center</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: [license-url] -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/ -->
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>