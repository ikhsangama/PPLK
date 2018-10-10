$.validator.setDefaults({
  errorClass: 'invalid',
  validClass: "valid",
  rules: {
      nama: {
          required: true,
          minlength:5
      },
      email: {
          required: true,
          minlength:5,
          email:true
       },
      password: {
        required: true,
        minlength: 5
      },
      password_verify:{
        required:true,
        equalTo:'#password'
      }
  },
  errorPlacement: function (error, element) {
    $(element).siblings('span.sec').remove();
    $(element).siblings('span.main').attr('data-error', error.text());
  },
  success: function(label) {
    var nama =label.attr('for');
    var nilai = $('input[name="'+nama+'"]').siblings('span.sec').remove();

  }
});
