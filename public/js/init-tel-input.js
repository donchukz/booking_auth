$((function(){var e=document.querySelector("#phone"),n=document.querySelector("#output"),t=window.intlTelInput(e,{allowDropdown:!0,autoPlaceholder:"aggressive",formatOnDisplay:!0,geoIpLookup:function(e){$.get("https://ipinfo.io",(function(){}),"jsonp").always((function(n){var t=n&&n.country?n.country:"US";e(t)}))},hiddenInput:"phone_number",initialCountry:"auto",nationalMode:!0,placeholderNumberType:"MOBILE",separateDialCode:!0,utilsScript:"{{ asset('plugins/intl-tel-input/build/js/utils.js') }}"}),o=function(){var e=t.isValidNumber()?"International: "+t.getNumber():"Please enter a number below",o=document.createTextNode(e);n.innerHTML="",n.appendChild(o)};e.addEventListener("change",o),e.addEventListener("keyup",o)}));
//# sourceMappingURL=init-tel-input.js.map
