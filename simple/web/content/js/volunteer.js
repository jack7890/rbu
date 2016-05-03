$(function() {
  $('#top-apply-button').click(function() {
    $('html, body').animate({
        scrollTop: $("#application").offset().top
    }, 400);
    return false;
  });

  var ref = new Firebase("https://rbu.firebaseio.com/");
  var applicationRef = ref.child("applications");

  $('#submit-application').click(function(evt){
    evt.preventDefault();
    var input_values = {};
    input_values.company    = $('#application-form input[name=company]').val();
    input_values.email      = $('#application-form input[name=email]').val();
    input_values.employees  = $('#application-form input[name=employees]').val();

    var validation = valudate_form(input_values);

    if(validation.length === 0) {
      // Submit data to Firebase
      applicationRef.push().set({
        company:    input_values.company,
        email:      input_values.email,
        employees:  input_values.employees
      }, function() {
        $('#application-form').hide();
        $('#success-message').fadeIn(680);
      });
    } else {
      // Show errors to user
      var markup = "<ul>";
      $.each(validation, function(index, val) {
        markup += "<li>";
        markup += val;
        markup += "</li>";
      });
      markup += "</ul>";
      $('#form-errors').html(markup);
      $('#form-errors').fadeIn(300);
    }
    return false;
  });
});

function valudate_form(input) {
  var errors = [];
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if(input.company.length === 0) {
    errors.push("Please enter a company name");
  }
  
  if(re.test(input.email) !== true) {
   errors.push("Please enter a valid email"); 
  }

  if((input.employees.length === 0) || (isInt(input.employees) !== true)) {
   errors.push("Please enter a valid number of employees"); 
  }

  return errors;
}

function isInt(n) {
  console.log(n % 1 === 0);
  return n % 1 === 0;
}