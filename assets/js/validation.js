$.validator.setDefaults({
  errorClass: 'invalid',
  validClass: "valid",
  errorPlacement: function (error, element) {
    $(element).siblings('span.main').attr('data-error', error.text());
    $(element).siblings('span.sec').remove();
  },
  success: function(label) {
  //  var nama =label.attr('for');
  //  var nilai = $('input[name="'+nama+'"]').val();
  //  console.log(nilai);
  }
});
