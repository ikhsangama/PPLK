$.validator.addMethod('moreThan', function(value, element, param) {
    var i = parseInt(value);
    var j = parseInt($(param).val());
    return i >= j;
}, "Harus Lebih Dari {0}");
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
      },
      gaji_min:{
        number:true
      },
      gaji_max:{
        number:true,
        moreThan:'#gaji_min'
      },
      usia_min:{
        number:true,
      },
      usia_max:{
        number:true,
        moreThan:'#usia_min'
      },
      idtingkat_pendidikan:{
        required:true
      },
      idbidang:{
        required:true
      },
      tgl_expired:{
        required:true
      },
      password_new:{
        required:true
      },
      password_new_verify:{
        required:true,
        equalTo:'#password_new'
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
