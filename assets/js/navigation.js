/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var puremag_primary_container, puremag_primary_button, puremag_primary_menu, puremag_primary_links, puremag_primary_i, puremag_primary_len;

    puremag_primary_container = document.getElementById( 'puremag-primary-navigation' );
    if ( ! puremag_primary_container ) {
        return;
    }

    puremag_primary_button = puremag_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof puremag_primary_button ) {
        return;
    }

    puremag_primary_menu = puremag_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof puremag_primary_menu ) {
        puremag_primary_button.style.display = 'none';
        return;
    }

    puremag_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === puremag_primary_menu.className.indexOf( 'nav-menu' ) ) {
        puremag_primary_menu.className += ' nav-menu';
    }

    puremag_primary_button.onclick = function() {
        if ( -1 !== puremag_primary_container.className.indexOf( 'puremag-toggled' ) ) {
            puremag_primary_container.className = puremag_primary_container.className.replace( ' puremag-toggled', '' );
            puremag_primary_button.setAttribute( 'aria-expanded', 'false' );
            puremag_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            puremag_primary_container.className += ' puremag-toggled';
            puremag_primary_button.setAttribute( 'aria-expanded', 'true' );
            puremag_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    puremag_primary_links    = puremag_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( puremag_primary_i = 0, puremag_primary_len = puremag_primary_links.length; puremag_primary_i < puremag_primary_len; puremag_primary_i++ ) {
        puremag_primary_links[puremag_primary_i].addEventListener( 'focus', puremag_primary_toggleFocus, true );
        puremag_primary_links[puremag_primary_i].addEventListener( 'blur', puremag_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function puremag_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'puremag-focus' ) ) {
                    self.className = self.className.replace( ' puremag-focus', '' );
                } else {
                    self.className += ' puremag-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( puremag_primary_container ) {
        var touchStartFn, puremag_primary_i,
            parentLink = puremag_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, puremag_primary_i;

                if ( ! menuItem.classList.contains( 'puremag-focus' ) ) {
                    e.preventDefault();
                    for ( puremag_primary_i = 0; puremag_primary_i < menuItem.parentNode.children.length; ++puremag_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[puremag_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[puremag_primary_i].classList.remove( 'puremag-focus' );
                    }
                    menuItem.classList.add( 'puremag-focus' );
                } else {
                    menuItem.classList.remove( 'puremag-focus' );
                }
            };

            for ( puremag_primary_i = 0; puremag_primary_i < parentLink.length; ++puremag_primary_i ) {
                parentLink[puremag_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( puremag_primary_container ) );
} )();