jQuery(document).ready(function($) {

    if(puremag_ajax_object.sticky_menu){
    // grab the initial top offset of the navigation 
    var puremagstickyNavTop = $('.puremag-primary-menu-container').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var puremagstickyNav = function(){
        var puremagscrollTop = $(window).scrollTop(); // our current vertical position from the top
             
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative

        if(window.innerWidth > 1076) {
            if (puremagscrollTop > puremagstickyNavTop) {
                $('.puremag-primary-menu-container').addClass('puremag-fixed');
            } else {
                $('.puremag-primary-menu-container').removeClass('puremag-fixed'); 
            }
        }
    };

    puremagstickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
        puremagstickyNav();
    });
    }

    //$(".puremag-nav-primary .puremag-primary-nav-menu").addClass("puremag-primary-responsive-menu").before('<div class="puremag-primary-responsive-menu-icon"></div>');
    $(".puremag-nav-primary .puremag-primary-nav-menu").addClass("puremag-primary-responsive-menu");

    $(".puremag-primary-responsive-menu-icon").click(function(){
        $(this).next(".puremag-nav-primary .puremag-primary-nav-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1076) {
            $(".puremag-nav-primary .puremag-primary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".puremag-primary-responsive-menu > li").removeClass("puremag-primary-menu-open");
        }
    });

    $(".puremag-primary-responsive-menu > li").click(function(event){
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").toggleClass('puremag-submenu-toggle').parent().toggleClass("puremag-primary-menu-open");
        $(this).find(".children:first").toggleClass('puremag-submenu-toggle').parent().toggleClass("puremag-primary-menu-open");
    });

    $("div.puremag-primary-responsive-menu > ul > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").toggleClass('puremag-submenu-toggle').parent().toggleClass("puremag-primary-menu-open");
    });

    $(".post").fitVids();

    var scrollButtonEl = $( '.puremag-scroll-top' );
    scrollButtonEl.hide();

    $( window ).scroll( function () {
        if ( $( window ).scrollTop() < 20 ) {
            $( '.puremag-scroll-top' ).fadeOut();
        } else {
            $( '.puremag-scroll-top' ).fadeIn();
        }
    } );

    scrollButtonEl.click( function () {
        $( "html, body" ).animate( { scrollTop: 0 }, 300 );
        return false;
    } );


    $('#puremag-main-wrapper, #puremag-sidebar-wrapper').theiaStickySidebar({
        containerSelector: "#puremag-content-wrapper",
        additionalMarginTop: 0,
        additionalMarginBottom: 0,
        minWidth: 785,
    });

});