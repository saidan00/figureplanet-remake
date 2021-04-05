$(document).ready(function() {
  $("#checkout-btn").on("click", function(e) {
    e.preventDefault();
    swal({
        title: "Checkout",
        text: "Do you want to check out?",
        icon: "info",
        buttons: true,
      })
      .then((checkout) => {
        if (checkout) {
          document.forms["checkout-form"].submit();
        }
      });
  });

  $("#cancel-btn").on("click", function(e) {
    e.preventDefault();
    swal({
        title: "Cancel",
        text: "Do you want to cancel?",
        icon: "warning",
        buttons: true,
      })
      .then((cancel) => {
        if (cancel) {
          document.forms["cancel-form"].submit();
        }
      });
  });
});