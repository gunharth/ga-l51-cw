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

var formatTemplate;

  $( "input.mediumAutoComplete" ).autocomplete({
      source: '/mediumAutoComplete',
      //appendTo: $('#issue').parent(),
      select: function(e,ui) {
        var field = $(this).attr('name');
        var fieldval = $(this).val();
        $('#'+field+'_id').val(ui.item.id);
        var issue_id = ui.item.id;
        var sel = $('.format_id:eq(0)');
        if(issue_id == 0) {
          sel.prop('disabled',true);
          $('.manual-input').prop('disabled',true);
          return false;
        }
        sel.prop('disabled',true);
        $.ajax({
            method: 'GET',
            type: 'json',
            url: '/issue/'+issue_id
        }).done(function( data ) {
          sel.empty();
          sel.append('<option value="0">-- Auswahl --</option>');
          for (var i=0; i<data.length; i++) {
            sel.append('<option value="' + data[i].id + '" data-calc="' + data[i].type + '">' + data[i].name + '</option>');
          }
          sel.prop('disabled',false);
        })
        $.ajax({
          method: 'GET',
          type: 'json',
          url: '/issuedetails/'+issue_id
        }).done(function( html ) {
          $('#issueDetails').html(html);
          formatTemplate = $('#formats-outer').html();
        })
      }
    });

function getInseratTotals() {
  //alert('called');
  var issue_id = $('#issue_id').val();
  if(issue_id == 0) {
    //alert('Bitte wählen Sie ein Medium/Ausgabe');
      $('.manual-input').prop('disabled',true);
    return false;
  }
  var format_id_string = '';
  $('select.format_id').each(function(i) {
    //console.log(i+'aaa'+$(this).val());
    var format_id = $(this).val();
    if(format_id > 0) {
      format_id_string += '&format_id[]='+$(this).val();
    }
  })
  //console.log(format_id_string);
  if(format_id_string == '') {
    //alert('Bitte wählen Sie ein Format');
      $('.manual-input').prop('disabled',true);
    return false;
  }
  $('.manual-input').prop('disabled',false);
  if($('#isAgent').text() == 0) {
      $('#provision').prop('disabled',true);

  }
  //var type = $('#format_id').find('option:selected').data("calc");
  //$('#type').val(type);
  /*if(type == 1) {
    $('input[name=art]').prop('disabled',true)
  }*/
  //$('#strecke').prop('disabled',true);
  /*if($('#format_id').find('option:selected').text() == 'Strecke') {
    $('#strecke').prop('disabled',false);
  }*/
  var art = $('input[name=art]:checked').val()
  var rabatt = $('#rabatt').val();
  var preisinput = $('#preisinput').val();
  var preisaddinput = $('#preisaddinput').val();
  var preistotal = preisinput+preisaddinput;
  var nettoinput = $('#nettoinput').val();
  var bruttoinput = $('#bruttoinput').val();
  var provision = $('#provision').val();
  $.ajax({
      method: 'GET',
      type: 'json',
      url: '/inserat/1',
      data: 'art='+art+'&rabatt='+rabatt+'&provision='+provision+'&preisinput='+preisinput+'&preisaddinput='+preisaddinput+'&bruttoinput='+bruttoinput+'&nettoinput='+nettoinput+format_id_string
  }).done(function( data ) {
    $('#preis').val(data.totals.preis);
    $('#wert_rabatt').val(data.totals.wert_rabatt);
    $('#preis2').val(data.totals.rabatt);
    $('#wert_provision').val(data.totals.wert_provision);
    $('#preis3').val(data.totals.provision);
    $('#wert_werbeabgabe').val(data.totals.wert_werbeabgabe);
    $('#preis4').val(data.totals.wa);
    $('#netto').val(data.totals.netto);
    $('#ust').val(data.totals.ust);
    $('#brutto').val(data.totals.brutto);
  })
}

var formatTemplates = 0;
$('#formats-outer').on('click','.addFormat', function(e) {
    e.preventDefault()
    //var html = $.parseHTML(formatTemplate);
    //html.find('input').hide();
    $('#formats-outer').append(formatTemplate);
    //$('#formats-outer input:eq('+formatTemplates+')');
    formatTemplates++;
    $('#formats-outer input:eq('+formatTemplates+')').attr('name','pr['+formatTemplates+']');
  });

  // inserat create / edit
  // format select onchange
  $('#reCalculate').on('click', function(e) {
        e.preventDefault()
        getInseratTotals()
  });
  $('#formats-outer').on('change','select', function() {
      getInseratTotals()
  });
  /*$('#rabatt,#provision').on('blur', function() {
        getInseratTotals()
  });*/
  $('#preisinput').on('blur', function() {
        $('#nettoinput').val(0);
        $('#bruttoinput').val(0);
        //getInseratTotals()
  });
  $('#nettoinput').on('blur', function() {
        $('#preisinput').val(0);
        $('#bruttoinput').val(0);
        //getInseratTotals()
  });
  $('#bruttoinput').on('blur', function() {
        $('#nettoinput').val(0);
        $('#preisinput').val(0);
        //getInseratTotals()
  });
  /*$('input[name="art"]:radio' ).on('change', function() {
        getInseratTotals()
  });*/


    $( "input.clientAutoComplete" ).autocomplete({
      source: '/clientAutoComplete',
      //appendTo: $('#client').parent(),
      select: function(e,ui) {
        var field = $(this).attr('name');
        $('#'+field+'_id').val(ui.item.id);
        $.ajax({
          method: 'GET',
          type: 'json',
          url: '/client/'+ui.item.id
        }).done(function( html ) {
          $('#'+field+'Details').html(html);
          //$('.ui-autocomplete').hide();
        })
      }
      
    });

    $('#inseratSubmit').on('click', function(e) {
      e.preventDefault();
      $('#inserat').submit();
    })

 /*$(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });*/


});





