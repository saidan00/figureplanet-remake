$(document).ready(function() {
  $(".chosen-select").chosen();
  // =============
  // INIT TABLES
  // =============

  // products table
  let productsTable = $('#products-table').DataTable({
    // orderCellsTop: true,
    fixedHeader: true,
    // initComplete: function() {
    //   addColumnFilter('products-table', this);
    // },
    columnDefs: [{
      "orderable": false,
      "targets": -1
    }]
  });

  // orders table
  let ordersTable = $('#orders-table').DataTable({
    ordering: false
  });

  // users table
  let usersTable = $('#users-table').DataTable({
    order: [
      [6, "asc"],
      [5, "asc"]
    ],
    columnDefs: [{
      targets: -1,
      orderable: false
    }]
  });

  let reportTable = $('#report-table').DataTable({
    ordering: false,
    dom: 'B<"row mt-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>ritp',
    buttons: [{
      extend: 'pdfHtml5',
      footer: true,
      messageTop: 'Revenue report',
      className: 'btn-success'
    }]
  });


  // ==========================
  // SETUP AND FILTERING TABLES
  // ==========================

  if ($('#products-table').length) {
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        let min = $('#min-price').val();
        let max = $('#max-price').val();
        let age = data[5] || 0; // use data for the price column

        age = age.replace(/,/g, '');

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
  }

  if ($('#orders-table').length) {
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        let fromDate = $('#from-date').val();
        let toDate = $('#to-date').val();
        let status = $('#statuses').val();

        let date = data[1] || 0; // use data for the date column
        let orderStatus = data[5];

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

        if (status != '') {
          if (orderStatus == status) {
            result = true;
          } else {
            result = false;
          }
        }

        return result;
      }
    );
  }


  // ==========================
  // FILTER INDIVIDUAL COLUMNS
  // ==========================

  // Setup - add a text input to each footer cell
  function addColumnFilter(id, table) {
    $('#' + id + ' thead tr').clone(true).appendTo('#' + id + ' thead');
    $('#' + id + ' thead tr:eq(1) th').each(function(i) {
      if (i != $('#' + id + ' thead tr:eq(1) th').length - 1) {
        $(this).html('<input type="text" style=width:100%>');

        $('input', this).on('keyup change', function() {
          if (table.column(i).search() !== this.value) {
            table
              .column(i)
              .search(this.value)
              .draw();
          }
        });
      }
    });
  }

  // =============
  // EVENT BINDING
  // =============

  // filter min max price event
  $('#min-price, #max-price').on('keyup', function() {
    if ($(this).val() !== '') {
      productsTable.draw();
    }
  });

  // filter by date event
  $('#from-date, #to-date').on('change', function() {
    ordersTable.draw();
  });

  // refresh date
  $('#refresh-date').on('click', function() {
    $("input[type=date]").val("");
    $('#from-date').trigger('change');
  });

  // filter by status event
  $('#statuses').on('change', function() {
    ordersTable.draw();
  });
});