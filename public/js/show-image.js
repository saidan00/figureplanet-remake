function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#img-product')
        .attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("input[name='price']").on('keyup', function() {
  $('#formatted-price').html(parseInt($(this).val().replace(/\D/g, ''), 10).toLocaleString());
});