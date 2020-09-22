// filter handler for products page
$(document).ready(function () {
  // get current category
  function getCurrentCategory() {
    let currentCategory = $(".active1").attr("data-categoryCode");
    return currentCategory;
  }

  // get name filter
  function getFilterName() {
    let filter_name = $("#search-product").val();
    filter_name = filter_name.toLowerCase();
    filter_name = filter_name.trim();
    filter_name = filter_name.replace(/[^a-z0-9 ]/gi, "");
    filter_name = filter_name.replace(/  +/g, " ");
    filter_name = filter_name.replace(/ /gi, "_");
    if (filter_name == "") {
      filter_name = "none";
    }
    return filter_name;
  }

  // get price filter
  function getFilterPriceFrom() {
    let filter_priceFrom = $("#minPrice").val();
    if (filter_priceFrom == "" || filter_priceFrom < 0 || filter_priceFrom > 9999 || isNaN(filter_priceFrom)) {
      filter_priceFrom = 0;
    }
    return filter_priceFrom;
  }
  function getFilterPriceTo() {
    let filter_priceTo = $("#maxPrice").val();
    if (filter_priceTo == "" || filter_priceTo < 0 || filter_priceTo > 9999 || isNaN(filter_priceTo)) {
      filter_priceTo = 9999;
    }
    return filter_priceTo;
  }

  // get sort
  function getSort() {
    return $("[name='sorting']").val();
  }

  // get current page
  function getCurrentPage() {
    let currentPage = 1;
    return currentPage;
  }

  getCurrentPage();
  // get all filter
  function getAllFilter() {
    // create filter object
    let filter = {
      filter_currentCategory: getCurrentCategory(),
      filter_name: getFilterName(),
      filter_priceFrom: getFilterPriceFrom(),
      filter_priceTo: getFilterPriceTo(),
      filter_sort: getSort(),
      filter_currentPage: getCurrentPage(),
    };

    return filter;
  }

  // redirect
  function redirect(link) {
    location.href = URLROOT + "/products/search/" + link;
  }

  // filter event handler
  function filterHanlder() {
    let filter = getAllFilter();
    // check and set value if needed
    if (parseInt(filter["filter_priceFrom"]) > parseInt(filter["filter_priceTo"])) {
      filter["filter_priceTo"] = 9999;
      filter["filter_priceFrom"] = 0;
    }

    // default link format: URLROOT/products/search/category/name/priceFrom/priceTo/sort/page
    let link =
      filter["filter_currentCategory"] +
      "/" +
      filter["filter_name"] +
      "/" +
      filter["filter_priceFrom"] +
      "/" +
      filter["filter_priceTo"] +
      "/" +
      filter["filter_sort"] +
      "/" +
      filter["filter_currentPage"];
    redirect(link);
  }

  // evetn handler
  $("#filter-price").click(function () {
    filterHanlder();
  });

  $("#btn-search").click(function () {
    filterHanlder();
  });

  $("#search-product").keypress(function (e) {
    if (e.which == 13) {
      filterHanlder();
    }
  });

  $("#sort").change(function () {
    filterHanlder();
  });
});
