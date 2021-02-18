$('#btn-one').click(function() {
    $('#btn-one').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').attr('disabled', false);
});
  
$('#btn-two').click(function() {
    $('#two').html('<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div>').attr('disabled', false);
  });