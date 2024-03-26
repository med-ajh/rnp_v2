<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;700&display=swap" rel="stylesheet">


        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== CSS ===============-->

        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

        <style>
.header {
    position: relative;
}

.navbar-background {
    position: absolute;
    top: -260%; /* Adjust the top position */
    right: 15%; /* Adjust the right position */
    width: 60%; /* Adjust the width of the background image */
    height: 330px; /* Adjust the height of the background image */
    background-image: url('{{ asset('assets/images/green.svg') }}');
    background-size: contain; /* Use 'contain' to fit the whole image within the container */
    background-position: center;
    background-repeat: no-repeat; /* Prevent background image from repeating */
    z-index: -1;
    opacity: 0.22; /* Adjust the opacity value (0.0 to 1.0) */
    pointer-events: none; /* Disable pointer events for the background */
}


.nav.container {
    position: center;
    z-index: 1;
}
        </style>

    </head>
    <body>
        <!--=============== HEADER ===============-->
        <header class="header">
            <div class="navbar-background"></div>
            <nav class="nav container">
                <div class="nav__data">

                    <div class="nav__logo">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    </div>

                    <div class="nav__toggle" id="nav-toggle">
                        <i class="ri-menu-line nav__toggle-menu"></i>
                        <i class="ri-close-line nav__toggle-close"></i>
                    </div>
                </div>

                <!--=============== NAV MENU ===============-->
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li>
                            <a href="#" class="nav__link">A PROPOS</a>
                        </li>

                        <!--=============== DROPDOWN 1 ===============-->
                        <li class="dropdown__item">
                            <div class="nav__link dropdown__button">
                                SERVICES  <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                            </div>

                            <div class="dropdown__container">
                                <div class="dropdown__content">
                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-flashlight-line"></i>
                                        </div>

                                        <span class="dropdown__title">Remplir La Demande D'inscription</span>

                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="#" class="dropdown__link">Services En Ligne</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Besoin D'aide ?</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">JavaScript OOP</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-heart-3-line"></i>
                                        </div>

                                        <span class="dropdown__title">Centre d’inscription</span>

                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="#" class="dropdown__link">Development with Flutter</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Web development with React</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Backend development expert</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-book-mark-line"></i>
                                        </div>

                                        <span class="dropdown__title">Services En Ligne</span>

                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="#" class="dropdown__link">Web development</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Applications development</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">UI/UX design</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Informatic security</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="dropdown__group">
                                        <div class="dropdown__icon">
                                            <i class="ri-file-paper-2-line"></i>
                                        </div>

                                        <span class="dropdown__title">Besoin D'aide ?</span>

                                        <ul class="dropdown__list">
                                            <li>
                                                <a href="#" class="dropdown__link">Course certificates</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown__link">Free certifications</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!--=============== DROPDOWN 2 ===============-->

                        <li>
                            <a href="#" class="nav__link">PROCÉDURE </a>
                        </li>


                        <li>
                            <a href="#" class="nav__link">QUESTIONS FRÉQUENTES</a>
                        </li>




                     <!--=============== language button and seach section  ===============-->
                     <div class="nav__search">
                        <input type="text" placeholder="Rechercher..." class="nav__search-input">
                        <button class="nav__search-button"><i class="ri-search-line"></i></button>
                        <button class="nav__language-button">عربية</button>
                    </div>
                </div>

                    </ul>




            </nav>
        </header>

        <!--=============== MAIN JS ===============-->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>
