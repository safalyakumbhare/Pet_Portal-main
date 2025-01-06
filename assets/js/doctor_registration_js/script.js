$(document).ready(function () {
  $("#doctor_form").validate({
    rules: {
      // basic Information
      fname: { required: true, minlength: 2 },
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        number: true,
        minlength: 10,
        maxlength: 10,
      },
      dob: {
        required: true,
        date: true,
      },
      address: {
        required: true,
      },
      gender: {
        required: true,
      },
      profile: {
        required: true,
      },

      //   Professional Details
      license: {
        required: true,
        minlength: 10,
      },
      specialization: {
        required: true,
      },
      experience: {
        required: true,
      },
      certification: {
        required: true,
      },

      //   Clinic Details
      clinic_name: {
        required: true,
        minlength: 5,
      },
      clinic_address: {
        required: true,
      },
      clinic_phone: {
        required: true,
        number: true,
        minlength: 10,
        maxlength: 10,
      },
      opening_time: {
        required: true,
        time: true,
      },
      closing_time: {
        required: true,
        time: true,
      },
      opening_days: {
        required: true,
      },
      closing_days: {
        required: true,
      },

      fees: {
        required: true,
        number: true,
      },

      //   Passwords
      password: {
        required: true,
        minlength: 6,
      },
      confirm_password: {
        required: true,
        minlength: 6,
        equalTo: "#password",
      },
    },

    messages: {
      // basic Information
      fname: {
        required: "Full name is required",
        minlength: "Full name should have at least 2 characters",
      },
      email: {
        required: "Email address is required",
        email: "Please enter a valid email address",
      },
      phone: {
        required: "Phone number is required",
        number: "Please enter a valid phone number",
        minlength: "Phone number should have 10 digits",
        maxlength: "Phone number should not have more than 10 digits",
      },
      dob: {
        required: "Date of birth is required",
        date: "Please enter a valid date",
      },
      address: { required: "Address is required" },
      gender: { required: "Gender is required" },
      profile: { required: "Profile picture is required" },

      //   Professional Info
      license: {
        required: "License number is required",
        minlength: "License number should have at least 10 characters",
      },
      specialization: { required: "Specialization is required" },
      experience: {
        required: "Experience is required",
      },
      certification: { required: "Certification is required" },
      //   Clinic Details
      clinic_name: {
        required: "Clinic name is required",
        minlength: "Clinic name should have at least 5 characters",
      },
      clinic_address: { required: "Clinic address is required" },
      clinic_phone: {
        required: "Clinic phone number is required",
        number: "Please enter a valid phone number",
        minlength: "Clinic phone number should have 10 digits",
        maxlength: "Clinic phone number should have not more than 10 digits",
      },
      opening_time: { required: "Opening time is required", time: "Please enter a valid time" },
      closing_time: { required: "Closing time is required", time: "Please enter a valid time" },
      opening_days: { required: "Opening days are required" },
      closing_days: { required: "Closing days are required" },

      password :{
        required: "Password is required",
        minlength: "Password should have at least 6 characters",
      },
      confirm_password: {
        required: "Confirm password is required",
        minlength: "Confirm password should have at least 6 characters",
        equalTo: "Passwords do not match",
      }
    },
  });
});
