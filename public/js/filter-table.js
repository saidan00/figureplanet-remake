$(document).ready(function() {
  if ($('#products-table').length) {
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        var min = $('#min-price').val();
        var max = $('#max-price').val();
        var age = data[3] || 0; // use data for the price column

        age = age.replace(/,/g, '');
        min = min.replace(/,/g, '');
        max = max.replace(/,/g, '');

        age = parseInt(age, 10);
        min = parseInt(min, 10);
        max = parseInt(max, 10);

        if ((isNaN(min) && isNaN(max)) ||
          (isNaN(min) && age <= max) ||
          (min <= age && isNaN(max)) ||
          (min <= age && age <= max)) {
          return true;
        }
        return false;
      }
    );
  } else if ($('#orders-table').length) {
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        var fromDate = $('#from-date').val();
        var toDate = $('#to-date').val();
        var date = data[1] || 0; // use data for the date column

        date = date.split(' - ')[0];
        // console.log(date);
        date = date.split('/');
        // console.log(date[2] + "-" + date[1] + "-" + date[0]);

        date = new Date(date[2] + "-" + date[1] + "-" + date[0]);
        fromDate = new Date(fromDate);
        toDate = new Date(toDate);

        if (date.getTime() >= fromDate.getTime()) {
          return true;
        }

        return false;
      }
    );
  }

  // Setup - add a text input to each footer cell
  // $('#products-table thead tr').clone(true).appendTo('#products-table thead');
  // $('#products-table thead tr:eq(1) th').each(function(i) {
  //   var title = $(this).text();
  //   $(this).html('<input type="text" placeholder="Search ' + title + '" />');

  //   $('input', this).on('keyup change', function() {
  //     if (productTable.column(i).search() !== this.value) {
  //       productTable
  //         .column(i)
  //         .search(this.value)
  //         .draw();
  //     }
  //   });
  // });

  // products table
  let productsTable = $('#products-table').DataTable({
    orderCellsTop: true,
    'fixedHeader': true,
    columnDefs: [{
      "orderable": false,
      "targets": -1
    }]
  });

  // filter min max price
  $('#min-price, #max-price').on('keyup', function() {
    if ($(this).val() != '') {
      var n = parseInt($(this).val().replace(/\D/g, ''), 10);
      $(this).val(n.toLocaleString());
      productsTable.draw();
    }
  });

  // orders table
  let ordersTable = $('#orders-table').DataTable({
    "columnDefs": [{
      "orderable": false,
      "targets": -1
    }]
  });

  // filter by date
  $('#from-date, #to-date').on('change', function() {
    ordersTable.draw();
  });

  // users table
  $('#users-table').DataTable({
    "columnDefs": [{
      "orderable": false,
      "targets": -1
    }]
  });
});