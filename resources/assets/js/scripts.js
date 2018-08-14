$(document).ready(function () {

    /** REMOVE MENU LEFT SLIDEDOWN PREVENT CLICK LINK **/
    $('.nav-tree ul li:has(ul) > a').unbind('click');

});