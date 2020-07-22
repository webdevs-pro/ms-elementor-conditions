jQuery(document).ready(function($) {

   var selectors = MsElementConditions.selectors;

   console.log(selectors);

   $.each(selectors, function(key, selector) {

   //    $(function() {
   //       $(this).click(function() {
   //          alert('boom4');
   //          console.log(this);   
   //       });
   //   });

   //    var selector = this;


      $('body').on('click touch', selector, function(e) {
         // alert('private');
         console.log(key);
         createCookie("visitor_type", key, 365)
      });


      // $(selector).click(function(){
      //    alert('boom3');
      //    console.log(this);
      // });
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
   v
}