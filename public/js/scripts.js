!function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=40)}({40:function(e,t,n){e.exports=n(41)},41:function(e,t){!function(e){"use strict";e(document).on("click",".ckfinder",(function(){var t=e(this);CKFinder.popup({selectActionFunction:function(e){t.val(e)}})})),e(".owl-carousel").owlCarousel({items:3,itemsDesktop:[1199,3],itemsDesktopSmall:[980,2],itemsMobile:[600,1],pagination:!0,navigationText:!0});var t=e("meta[name='csrf-token']").attr("content");e(document).ajaxError((function(e,t,n){alert("Error! An error occurred. Please try again later !!!")})),e(document).ajaxSuccess((function(e,t,n){alert("Saved successfully !!!")})),e("#layoutSidenav_nav .sb-sidenav a.nav-link").click((function(){e("#layoutSidenav_nav .sb-sidenav a.nav-link").removeClass("active"),e(this).addClass("active")}));var n=window.location.href;e("#layoutSidenav_nav .sb-sidenav a.nav-link").each((function(){this.href===n&&e(this).addClass("active")})),e("#sidebarToggle").on("click",(function(t){t.preventDefault(),e("body").toggleClass("sb-sidenav-toggled")})),e(".form-ajax").submit((function(n){n.preventDefault();var o=e(this).attr("action");o=o||window.location.href;var r=e(this).serializeArray();r.push({name:"_token",value:t}),e.ajax({method:"POST",url:o,data:r})})),e(".add_row").click((function(){var t=e(this).closest(".card-body").find(".row:first-child").clone();t.find("input").val(""),e(this).closest(".card-body").find(".form-input").append(t)})),e(document).on("click",".delete_row",(function(){e(this).closest(".row").remove()})),e(".form-toggle").change((function(){e(this).closest("form").toggleClass("disabled",!e(this).prop("checked"))}))}(jQuery)}});