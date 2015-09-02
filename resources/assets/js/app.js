/*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });*/

$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

 $(function(){
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });

    $('#flashMessage').not('.alert-important').delay(2000).slideUp(300);

     $('#confirmDelete').on('show.bs.modal', function (e) {
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);
      $title = $(e.relatedTarget).attr('data-action');
      $(this).find('.modal-action').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });


  $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });

  $('[data-toggle="tooltip"]').tooltip({placement: 'top'})

  $('.input-group.date').datepicker({
      format: "dd.mm.yyyy",
      weekStart: 1,
      todayBtn: true,
      language: "de",
      autoclose: true,
      todayHighlight: true
  });

  // clickable tr
  $("tr.clickable").click(function(e) {
        window.document.location = $(this).data("href");
    });

  // inserat create / edit
  // issue select onchange
  $('#issue_id').on('change', function() {
    $.ajax({
        method: 'GET',
        type: 'json',
        url: '/issue/'+$(this).val()
    }).done(function( data ) {
      var sel = $('#format_id');
      sel.empty();
      for (var i=0; i<data.length; i++) {
        sel.append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
      }
    })
  });

function getInseratTotals() {
  var ele = $('#format_id').val();
  var rabatt = $('#rabatt').val();
  var provision = $('#provision').val();
    $.ajax({
        method: 'GET',
        type: 'json',
        url: '/inserat/'+ele,
        data: 'rabatt='+rabatt+'&provision='+provision
    }).done(function( data ) {
      $('#preis').val(data.preis);
      $('#preis2').val(data.totals.rabatt);
      $('#preis3').val(data.totals.provision);
      $('#preis4').val(data.totals.werbeabgabe);
      $('#brutto').val(data.totals.brutto);
    })

}

  // inserat create / edit
  // format select onchange
  $('#format_id').on('change', function() {
      getInseratTotals()
  });
$('#rabatt,#provision').on('blur', function() {
      getInseratTotals()
});


});





