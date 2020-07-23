jQuery(document).ready(function($) {

   var selectors = MsElementConditions.selectors;

   console.log(selectors);

   $.each(selectors, function(key, selector) {

      $('body').on('click touch', selector, function(e) {
         createCookie("visitor_type", key, 365);
         setTimeout(function() {
            window.location.reload();
            return false;
         }, 500);

      });


   });

});


function createCookie(name,value,days) {

	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
   else var expires = "";
   
   document.cookie = name + "=" + value + expires + "; path=/;";

}