function setHelper(err) {
  $.each(err, function( index, value ) {
    var split=value.split(' ');
    var inName=split[0];
    var $element=$('input[name="'+inName+'"]');
    var $errmain=$element.siblings('span.main').attr("data-error");
     if ($errmain) {
       $('<span class="helper-text sec" data-error="'+value+'" data-success=""></span>').insertAfter($element);
       console.log(inName+' main ada');
     }else {
       $element.siblings('span.main').attr("data-error",value);
       console.log('kosong');
     }
    $element.addClass('invalid');

    // $('input[name="'+index+'"]').addClass('invalid');
    // console.log(index);
    // $('<span class="helper-text sec" data-error="'+value+'" data-success=""></span>').insertAfter('input[name="'+index+'"]');
   });
}
function test(){
  alert('yooo');
}
