$(document).ready(function() {
  var actions = {
    switchSlide: function(e) {
      e.preventDefault(); // Prevent standard event
      $('ul.navigation').find('a.active').removeClass('active'); // Remove all active classes
      $(this).addClass('active'); // Add active to the clicked item
      var index = $(this).parent().index(); // Get the index of the clicked item 
      index++; // Add one to the index (this make sure we can target the correct slide)
      var slide = $('ul.slider').find('li.slide:nth-of-type(' + index + 'n)'); // Grab the slide we're switching to based on the anchor that was clicked
      var leftDistance = slide.offset().left; // Get distance of slide from left
      var currentMargin = $('ul.slider').offset().left; // Get distance of slider from left (in case it has already been transitioned)
      var total = leftDistance - currentMargin; // Do the math!
      $('ul.slider').css('margin-left', '-' + total + 'px'); // Apply the CSS which moves the slider
    }
  };

  $('body').on('click', '[data-action]', function() {
    var action = $(this).data('action');
    if (action in actions) {
      actions[action].apply(this, arguments);
    }
  });
});