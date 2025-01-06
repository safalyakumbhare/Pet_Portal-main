$(document).ready(function () {
  $("#live-search").keyup(function () {
    var input = $(this).val();

    // alert(input)
      if (input != "") {
        $.ajax({
          url: "search.php",
          method: "POST",
          data: { input: input },
          success: function (data) {
            $("#live-search-results").html(data);
            $("#all-data").css("display", "none");
          },
        });
      } else {
        $("#live-search-results").css("display", "none");
        $("#all-data").css("display", "block");
      }
    
  });
});
