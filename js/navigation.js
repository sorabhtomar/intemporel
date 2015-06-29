/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
( function() {

	var menu = document.querySelector('.menu-toggle');
	var nav = document.getElementById('site-navigation');

	menu.onclick = function() {
		if ( -1 !== nav.className.indexOf( 'toggled' ) ) {
			nav.className = nav.className.replace( ' toggled', '' );
		} else {
			nav.className += ' toggled';
		}
	}

	var search = document.querySelector('.search-toggle');
	var form = document.querySelector('.search-form');
	var input = document.querySelector('.search-field');

	search.onclick = function() {
		if ( -1 !== form.className.indexOf( 'search-toggled' ) ) {
			form.className = form.className.replace( ' search-toggled', '' );
			search.innerHTML = '<span class="genericon genericon-search"></span>';
		} else {
			form.className += ' search-toggled';
			search.innerHTML = '<span class="genericon genericon-close-alt"></span>';
			input.focus();
		}
	}

	input.setAttribute("placeholder","Enter query & press enter");

	window.addEventListener("scroll", function(evt) {

    // This value is your scroll distance from the top
    var distance_from_top = document.body.scrollTop;
    var header = document.getElementById("masthead");
    var menu = header.querySelector(".menu-toggle");
    var search = header.querySelector(".search-toggle");
    var title = header.getElementsByTagName("h1")[0];
    var form = header.getElementsByTagName("form")[0];
    var content = document.getElementById("content");

    // The user has scrolled to the tippy top of the page. Set appropriate style.
    if(distance_from_top === 0){
    	search.setAttribute("style","height:100px;line-height:100px");
    	menu.setAttribute("style","height:100px;line-height:100px");
    	title.setAttribute("style","height:100px;line-height:100px");
    	masthead.setAttribute("style","position:relative");
    	form.setAttribute("style","top:2em");
    	content.setAttribute("style","padding-top:0");
    }

    // The user has scrolled down the page.
    if(distance_from_top > 0){
    	search.setAttribute("style","height:48px;line-height:48px");
    	menu.setAttribute("style","height:48px;line-height:48px");
    	title.setAttribute("style","height:48px;line-height:48px");
    	masthead.setAttribute("style","position:fixed");
    	form.setAttribute("style","top:.3em");
    	content.setAttribute("style","padding-top:48px");
    }
});

} )();
