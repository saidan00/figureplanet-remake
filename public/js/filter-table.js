$(document).ready(function() {
  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = $('#min').val();
      var max = $('#max').val();
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
  var productTable = $('#products-table').DataTable({
    orderCellsTop: true,
    'fixedHeader': true,
    columnDefs: [{
      "orderable": false,
      "targets": -1
    }]
  });

  // filter min max price
  $('#min, #max').on('keyup', function() {
    if ($(this).val() != '') {
      var n = parseInt($(this).val().replace(/\D/g, ''), 10);
      $(this).val(n.toLocaleString());
      productTable.draw();
    }
  });



  // users table
  $('#users-table').DataTable({
    "columnDefs": [{
      "orderable": false,
      "targets": -1
    }]
  });

  // orders table
  $('#orders-table').DataTable({
    "columnDefs": [{
      "orderable": false,
      "targets": -1
    }]
  });
});