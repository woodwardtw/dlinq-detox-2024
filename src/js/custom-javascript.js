// Add your JS customizations here

//looks for #submit in url to expand submission form

jQuery(document).ready(function() {

  if(window.location.hash == '#submission') {
    jQuery('#submission').modal('show');
  }
  //does it for anchor link to #submission
   window.addEventListener('hashchange', function() { 
        if(window.location.hash == '#submission') {
            jQuery('#submission').modal('show');
        }
    });

});