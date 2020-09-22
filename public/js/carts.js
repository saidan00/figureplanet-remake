$(document).ready(function () {
  bindEvent();

  // button add to cart - index
  $(".block2-btn-addcart").each(function () {
    let productName = $(this).parent().parent().parent().find(".block2-name").html();

    $(this).on("click", function () {
      let productSKU = $(this).attr("data-sku");
      addToCart(productSKU, productName);
    });
  });

  // button add to cart - product detail
  $(".btn-addcart-product-detail").each(function () {
    let productName = $(".product-detail-name").html();

    $(this).on("click", function () {
      // get quantity and handle it with number handler (main.js)
      let quantity = $("#num-product").val();
      quantity = quantityHandler(quantity);

      // get product sku
      let productSKU = $(this).attr("data-sku");

      addToCart(productSKU, productName, quantity);
    });
  });

  // button add to wishlist
  $(".block2-btn-addwishlist").each(function () {
    var nameProduct = $(this).parent().parent().parent().find(".block2-name").html();
    $(this).on("click", function () {
      // Alert using sweetalert
      swal(nameProduct, "is added to wishlist !", "success");
    });
  });

  // button apply coupon
  $("#btn-coupon").click(function () {
    swal("", "Invalid Code", "error");
  });

  // remove from cart
  $(document).on("click", ".cart-img-product", function () {
    let productSKU = $(this).attr("data-sku");
    jQuery.ajax({
      url: URLROOT + "/carts/removeFromCart/" + productSKU,
      type: "POST",
      success: function (data) {
        loadCart();
      },
    });
  });

  // Add to cart (with AJAX)
  function addToCart(productSKU, productName, quantity = 1) {
    jQuery.ajax({
      url: URLROOT + "/carts/addToCart/" + productSKU + "/" + quantity,
      type: "POST",
      success: function (data) {
        data = JSON.parse(data);
        if (data["status"] == true) {
          // load total carts (main.js)
          loadTotalCart();

          // Alert using sweetalert
          swal(productName, "is added to cart !", "success");
        } else if (data["status"] == "out_of_stock") {
          swal("Oops", "Product is out of stock", "error");
        } else if (data["status"] == "less_than_required") {
          swal("Oops", "Product is less than required", "error");
        } else {
          swal("Oops", "Something went wrong", "error");
        }
      },
    });
  }

  // update cart
  function updateCart(productSKU, quantity) {
    jQuery.ajax({
      url: URLROOT + "/carts/updateCart/" + productSKU + "/" + quantity,
      type: "POST",
      success: function (data) {
        data = JSON.parse(data);
        if (data["status"] == "less_than_required") {
          swal("Oops", "Product is less than required", "error");
        }
      },
    });
  }

  // reload cart
  function loadCart() {
    jQuery.ajax({
      url: URLROOT + "/carts/getCartByCurrentUser",
      type: "POST",
      success: function (data) {
        data = JSON.parse(data);

        if (data["totalCart"] == 0) {
          $("#cart-logged-in").attr("class", "bg-title-page p-t-50 p-b-40 flex-col-c-m");
          $("#cart-logged-in").html(
            "" + "<h2>Nothing to show</h2>" + "<p>" + "Your cart is empty. Please buy something." + "</p>"
          );
        }
        let productsTable = "";
        for (let i = 0; i < data["totalCart"]; i++) {
          productsTable +=
            "" +
            '<tr id="' +
            data["cart"][i].sku +
            '" class="table-row" data-sku="' +
            data["cart"][i].sku +
            '" data-name="cart">' +
            '<td class="column-1">' +
            '<div class="cart-img-product b-rad-4 o-f-hidden" data-sku="' +
            data["cart"][i].sku +
            '">' +
            '<img src="' +
            URLROOT +
            "/" +
            data["cart"][i].imgPath +
            '" alt="IMG-PRODUCT">' +
            "</div>" +
            "</td>" +
            '<td class="column-2"><a href="' +
            URLROOT +
            "/products/product/" +
            data["cart"][i].sku +
            '">' +
            data["cart"][i].productName +
            "</a></td>" +
            '<td class="column-3">$' +
            data["cart"][i].price +
            "</td>" +
            '<td class="column-4">' +
            '<div class="flex-w bo5 of-hidden w-size17">' +
            '<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">' +
            '<i class="fs-12 fa fa-minus" aria-hidden="true"></i>' +
            "</button>" +
            '<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="' +
            data["cart"][i].quantity +
            '">' +
            '<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">' +
            '<i class="fs-12 fa fa-plus" aria-hidden="true"></i>' +
            "</button>" +
            "</div>" +
            "</td>" +
            '<td class="column-5">$' +
            myToFixed(parseFloat(data["cart"][i].quantity) * parseFloat(data["cart"][i].price), 3) +
            "</td>" +
            "</tr>";
        }

        $("#cart-table").html(
          "" +
            '<table class="table-shopping-cart">' +
            '<tr class="table-head">' +
            '<th class="column-1"></th>' +
            '<th class="column-2">Product</th>' +
            '<th class="column-3">Price</th>' +
            '<th class="column-4 p-l-70">Quantity</th>' +
            '<th class="column-5">Total</th>' +
            "</tr>" +
            productsTable +
            "</table>"
        );

        $("[data-name='sub-total']").html("$" + myToFixed(data["subTotal"], 3));
        $("[data-name='shipping']").html("$" + myToFixed(data["shipping"], 3));
        $("[data-name='total']").html("$" + myToFixed(data["total"], 3));

        loadTotalCart();

        bindEvent();
      },
    });
  }

  // using to bind again event after ajax
  function bindEvent() {
    // update cart
    $("[data-name='cart']").each(function () {
      let productSKU = $(this).attr("data-sku"); // "this" here is ".table-row" element
      $(this)
        .find("input")
        .change(function () {
          let quantity = $(this).val(); // "this" here is input element

          updateCart(productSKU, quantity);

          loadCart();
        });
    });
  }
});
