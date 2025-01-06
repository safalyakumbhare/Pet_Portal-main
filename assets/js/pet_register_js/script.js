$(document).ready(function () {
  $("#pets").validate({
    rules: {
      petname: {
        required: true,
        minlength: 2,
      },
      species: { required: true },
      breed: { required: true },
      dob: { required: true },
      color: { required: true },
      gender: {
        required: true,
      },
      weight: { required: true },
      image: {
        required: true,
      },
      medical: {
        required: true,
        minlength: 4,
      },
    },

    messages: {
      petname: {
        required: "Please enter your pet's name",
        minlength: "Your pet's name must be at least 2 characters long",
      },
      species: { required: "Please select your pet's species" },
      breed: { required: "Please enter your pet's breed" },
      dob: { required: "Please enter your pet's date of birth" },
      color: { required: "Please enter your pet's color" },
      gender: { required: "Please select your pet's gender" },
      weight: { required: "Please enter your pet's weight" },
      image: { required: "Please select your pet's image" },
      medical: {
        required: "Please provide at least 4 characters of medical history",
        minlength: "Your medical history must be at least 4 characters long",
      },
    },
  });
});
function EnableDisableTextBox(select) {
  var txtOther = document.getElementById("txtOther");
  if (select.value === "other") {
    txtOther.style.display = "block";
  } else {
    txtOther.style.display = "none";
    txtOther.value = ""; // Clear input when hidden
  }
}
