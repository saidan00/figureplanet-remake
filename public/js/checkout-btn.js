$(document).ready(function() {
  $("#checkout-btn").on("click", function(e) {
    e.preventDefault();
    swal({
      title: "Checkout",
      text: "Are you want to check out?",
      icon: "info",
      buttons: true,
    })
    .then((checkout) => {
      if (checkout) {
        document.forms["checkout-form"].submit();
      }
    });
  });
});
