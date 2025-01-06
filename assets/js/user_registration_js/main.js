// (function($) {

//   $('#reset').on('click', function(){
//       $('#register-form').reset();
//   });

// })(jQuery);

$(document).ready(function(){
  $('#register-form').validate({
    rules: {
      name: {
        required: true,
        minlength: 2
      },
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 6
      },
      confirmpassword: {
        required: true,
        minlength: 6,
        equalTo: '#password'
      },
      phone:{
        required: true,
        number: true,
        maxlength: 10,
        minlength: 10,
      },
      address:{
        required: true
      },
      gender:{
        required: true
      },
      dob:{
        required: true
      },
      pincode:{
        required: true,
        number: true,
        minlength: 6,
        maxlength: 6
      },
      imageupload:{
        required: true
      }
    },
    messages: {
      name: {
        required: "Please enter your name",
        minlength: "Name must be at least 2 characters long"
      },
      email: {
        required: "Please enter your email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please enter a password",
        minlength: "Password must be at least 6 characters long"
      },
      confirmpassword: {
        required: "Please confirm your password",
        minlength: "Password must be at least 6 characters long"
      },
      phone: {
        required: "Please enter your phone number",
        number: "Please enter a valid phone number",
        minlength: "Phone number must be at least 10 digits long",
        maxlength: "Phone number not more than 10 digits ",
      },
      address: {
        required: "Please enter your address"
      },
      gender:{
        required: "Please select your gender"
      },
      dob:{
        required: "Please select your date of birth"
      },
      imageupload:{
        required: "Please upload your image"
      }
    }
  })
})