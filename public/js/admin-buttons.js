$(document).ready(function() {
  console.log('hello');
  $('#btn-cancel').on('click', function(e) {
    e.preventDefault();
    swal({
      text: 'Enter cancel reason:',
      content: 'input',
    }).then(note => {
      if (note != null) {
        $('#cancel-note').val(note);
        $('#cancel-form').trigger('submit');
      }
    });
  })

  $('#btn-reopen').on('click', function(e) {
    e.preventDefault();
    swal({
        title: "Re-open Order",
        text: "Do you want to re-open order?",
        icon: "warning",
        buttons: true,
      })
      .then((reopen) => {
        if (reopen) {
          $('#reopen-form').trigger('submit');
        }
      });
  });

  $('#btn-process').on('click', function(e) {
    e.preventDefault();
    swal({
        title: "Process Order",
        text: "Do you want to process order?",
        icon: "warning",
        buttons: true,
      })
      .then((process) => {
        if (process) {
          $('#process-form').trigger('submit');
        }
      });
  });

  $('#btn-deliver').on('click', function(e) {
    e.preventDefault();
    swal({
        title: "Deliver Order",
        text: "Do you want to deliver order?",
        icon: "warning",
        buttons: true,
      })
      .then((deliver) => {
        if (deliver) {
          $('#process-form').trigger('submit');
        }
      });
  });

  $('#btn-complete').on('click', function(e) {
    e.preventDefault();
    swal({
        title: "Complete Order",
        text: "Do you want to complete order?",
        icon: "warning",
        buttons: true,
      })
      .then((complete) => {
        if (complete) {
          $('#process-form').trigger('submit');
        }
      });
  });
});