$(document).ready(function () {
  // Check if the URL has a success parameter
  const urlParams = new URLSearchParams(window.location.search);
  const successParam = urlParams.get('success');

  if (successParam === '1') {
    // Display a success message (you can customize this part)
    $('#successMessage').html(
      '<div class="alert alert-success">Your message has been sent.</div>'
    );

    // Optionally, reset the form or perform other actions
    $('#contactForm').trigger('reset');
  }
});
