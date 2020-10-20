$(document).ready(function() {
  bindEvent();

  // button add to cart - index
  $(".block2-btn-addcart").each(function() {
    let productName = $(this).parent().parent().parent().find(".block2-name").html();

    $(this).on("click", function() {
      let productId = $(this).data('productId');
      addToCart(productId, productName);
    });
  });

  // button add to cart - product detail
  $(".btn-addcart-product-detail").each(function() {
    let productName = $(".product-detail-name").html();

    $(this).on("click", function() {
      // get quantity and handle it with number handler (main.js)
      let quantity = $("#num-product").val();
      quantity = quantityHandler(quantity);

      // get product id
      let productId = $(this).data('productId');

      addToCart(productId, productName, quantity);
    });
  });

  // button add to wishlist
  $(".block2-btn-addwishlist").each(function() {
    var nameProduct = $(this).parent().parent().parent().find(".block2-name").html();
    $(this).on("click", function() {
      // Alert using sweetalert
      swal(nameProduct, "is added to wishlist !", "success");
    });
  });

  // button apply coupon
  $("#btn-coupon").click(function() {
    swal("", "Invalid Code", "error");
  });

  // button remove from cart
  $(document).on("click", ".cart-img-product", function() {
    let productId = $(this).data('productId');

    removeFromCart(productId);
  });

  // Remove from cart (with AJAX)
  function removeFromCart(productId) {
    let _token = $('meta[name="csrf-token"]').attr('content');

    let data = {
      product_id: productId,
      _token: _token
    };

    let json = JSON.stringify(data);

    $.ajax({
      url: "/cart/removefromcart",
      type: "POST",
      data: json,
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function(response) {
        $('#product-' + productId).remove();
        loadCart(response);
      },
    });
  }

  // Add to cart (with AJAX)
  function addToCart(productId, productName, quantity = 1) {
    let _token = $('meta[name="csrf-token"]').attr('content');

    let data = {
      product_id: productId,
      quantity: quantity,
      _token: _token
    };

    let json = JSON.stringify(data);

    $.ajax({
      url: "/cart/addtocart",
      type: "POST",
      data: json,
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function(response) {
        // load total carts (main.js)
        loadTotalCart();

        // Alert using sweetalert
        swal(productName, "is added to cart !", "success");
      },
    });
  }

  // update cart
  function updateCart(productId, quantity, row) {
    let _token = $('meta[name="csrf-token"]').attr('content');

    let data = {
      product_id: productId,
      quantity: quantity,
      _token: _token
    };

    let json = JSON.stringify(data);

    jQuery.ajax({
      url: "/cart/updatecart",
      type: "POST",
      data: json,
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function(response) {
        // console.log(response);
        let item = response.cart_items.filter(i => i.product.id == productId)[0];

        $(row).find('.column-5')[0].innerHTML = item.total;

        loadCart(response);
      },
    });
  }

  // reload cart
  function loadCart(cart) {
    if ($('#table-shopping-cart tr').length == 1) {
      $("#cart-logged-in").attr("class", "bg-title-page p-t-50 p-b-40 flex-col-c-m");
      $("#cart-logged-in").html(
        "<h2>Nothing to show</h2>" + "<p>" + "Your cart is empty. Please buy something." + "</p>"
      );
    } else {
      $("[data-name='sub-total']").html(cart.subtotal);
      $("[data-name='shipping']").html(cart.shipping_fee);
      $("[data-name='total']").html(cart.total);
    }
    loadTotalCart();
  }

  // using to bind again event after ajax
  function bindEvent() {
    // update cart
    $("[data-name='cart']").each(function() {
      let row = $(this)[0];
      let productId = $(this).data("productId"); // "this" here is ".table-row" element
      $(this)
        .find("input")
        .change(function() {
          let quantity = quantityHandler($(this).val()); // "this" here is input element

          updateCart(productId, quantity, row);
        });
    });
  }
});