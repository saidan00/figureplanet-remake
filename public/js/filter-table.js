$(document).ready(function() {
  if ($('#products-table').length) {
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        let min = $('#min-price').val();
        let max = $('#max-price').val();
        let age = data[3] || 0; // use data for the price column

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
    $.fn.dataTable.moment('dd/MM/YYYY - HH:mm');
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        let fromDate = $('#from-date').val();
        let toDate = $('#to-date').val();
        let date = data[1] || 0; // use data for the date column

        date = date.split(' - ')[0];
        date = date.split('/');

        date = new Date(date[2] + "-" + date[1] + "-" + date[0]);
        fromDate = new Date(fromDate);
        toDate = new Date(toDate);

        date = date.getTime();
        fromDate = fromDate.getTime();
        toDate = toDate.getTime();

        let result = false;

        if (isNaN(fromDate) && isNaN(toDate)) {
          result = true;
        } else if (isNaN(fromDate) && date <= toDate) {
          result = true;
        } else if (isNaN(toDate) && date >= fromDate) {
          result = true;
        } else if (date >= fromDate && date <= toDate) {
          result = true;
        }

        return result;
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
    if ($(this).val() !== '') {
      let n = parseInt($(this).val().replace(/\D/g, ''), 10);
      $(this).val(n.toLocaleString());
      productsTable.draw();
    }
  });

  // orders table
  let ordersTable = $('#orders-table').DataTable({
    order: [
      [1, "asc"]
    ],
    columnDefs: [{
      "orderable": false,
      "targets": -1
    }]
  });

  // filter by date
  $('#from-date, #to-date').on('change', function() {
    ordersTable.draw();
  });

  // refresh date
  $('#refresh-date').on('click', function() {
    $("input[type=date]").val("");
    $('#from-date, #to-date').trigger('change');
  });

  // users table
  $('#users-table').DataTable({
    order: [
      [6, "asc"],
      [5, "asc"]
    ],
    columnDefs: [{
      targets: -1,
      orderable: false
    }]
  });
});