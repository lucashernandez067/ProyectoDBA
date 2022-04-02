/*!
    * Start Bootstrap - SB Admin v6.0.1 (https://startbootstrap.com/templates/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
(function ($) {
    "use strict";

    // ocultar sidenav cuando se hace click en el botón
    $("#sidebarToggle").on("click", function (e) {
        e.preventDefault();
        $("#main").toggleClass("sb-sidenav-toggled");
    });

})(jQuery);
