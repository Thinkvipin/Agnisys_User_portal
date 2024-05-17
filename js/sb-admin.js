(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle").on('click',function(e) {
    e.preventDefault();
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    $(this).toggleClass('sidebarToggle2');
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll',function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });
  
   var myKeyVals = { A1984 : 1, A9873 : 5, A1674 : 2, A8724 : 1, A3574 : 3, A1165 : 5 }


/*
var saveData = $.ajax({
      type: 'POST',
      url: "https://agnisys.com/custom_url2",
      data: myKeyVals,
      dataType: "text",
      success: function(resultData) {  }
});
*/
// var fogbugzToken = $("#fogbugz_token").val();
// function activityWatcher(){

//     //The number of seconds that have passed
//     //since the user was active.
//     var secondsSinceLastActivity = 0;

//     //Five minutes. 60 x 5 = 300 seconds.
//     var maxInactivity = (60 * 10);

//     //Setup the setInterval method to run
//     //every second. 1000 milliseconds = 1 second.
//     setInterval(function(){
//         secondsSinceLastActivity++;
//         // console.log(secondsSinceLastActivity + ' seconds since the user was last active');
//         //if the user has been inactive or idle for longer
//         //then the seconds specified in maxInactivity
//         if(secondsSinceLastActivity > maxInactivity){
//             // console.log('User has been inactive for more than ' + maxInactivity + ' seconds');
//             //Redirect them to your logout.php page.
//             // location.href = 'logout.php
            
//             $.ajax({
//                 url: "https://www.portal.agnisys.com/fogbugz-logoff.php",
//                 type: 'POST',
//                 data: {fogbugzToken: fogbugzToken},
//                 success: function (data) {
//                 //   console.log(data);
//                 },
//                 error: function(){
//                 //   alert("Cannot get data from Fogbugz, Refresh the page!!");
//                 }
//             });
//         }
//     }, 1000);

//     //The function that will be called whenever a user is active
//     function activity(){
//         //reset the secondsSinceLastActivity variable
//         //back to 0
//         secondsSinceLastActivity = 0;
//     }

//     //An array of DOM events that should be interpreted as
//     //user activity.
//     var activityEvents = [
//         'mousedown', 'mousemove', 'keydown',
//         'scroll', 'touchstart'
//     ];

//     //add these events to the document.
//     //register the activity function as the listener parameter.
//     activityEvents.forEach(function(eventName) {
//         document.addEventListener(eventName, activity, true);
//     });


// }

// activityWatcher();

})(jQuery); // End of use strict
