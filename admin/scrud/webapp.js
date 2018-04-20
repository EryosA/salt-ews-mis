$(document).ready(function(){
  
  // On page load: datatable
  var table_rental_pool = $('#table_rental_pool').dataTable({
    "ajax": "data.php?job=get_rental_pool_registration_records",
    "columns": [
//      { "data": "rank" },
      { "data": "Model",   "sClass": "Model" },
//      { "data": "industries" },
//      { "data": "revenue",        "sClass": "integer" },
//      { "data": "fiscal_year",    "sClass": "integer" },
//      { "data": "employees",      "sClass": "integer" },
//      { "data": "market_cap",     "sClass": "integer" },
//      { "data": "headquarters" },
      { "data": "functions",      "sClass": "functions" }
    ],
    "aoColumnDefs": [
      { "bSortable": false, "aTargets": [-1] }
    ],
    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    "oLanguage": {
      "oPaginate": {
        "sFirst":       " ",
        "sPrevious":    " ",
        "sNext":        " ",
        "sLast":        " ",
      },
      "sLengthMenu":    "Records per page: _MENU_",
      "sInfo":          "Total of _TOTAL_ records (showing _START_ to _END_)",
      "sInfoFiltered":  "(filtered from _MAX_ total records)"
    }
  });
  
  // On page load: form validation
  jQuery.validator.setDefaults({
    success: 'valid',
    rules: {
      fiscal_year: {
        required: true,
        min:      2000,
        max:      2025
      }
    },
    errorPlacement: function(error, element){
      error.insertBefore(element);
    },
    highlight: function(element){
      $(element).parent('.field_container').removeClass('valid').addClass('error');
    },
    unhighlight: function(element){
      $(element).parent('.field_container').addClass('valid').removeClass('error');
    }
  });
  var form_rental_pool = $('#form_rental_pool');
  form_rental_pool.validate();

  // Show message
  function show_message(message_text, message_type){
    $('#message').html('<p>' + message_text + '</p>').attr('class', message_type);
    $('#message_container').show();
    if (typeof timeout_message !== 'undefined'){
      window.clearTimeout(timeout_message);
    }
    timeout_message = setTimeout(function(){
      hide_message();
    }, 8000);
  }
  // Hide message
  function hide_message(){
    $('#message').html('').attr('class', '');
    $('#message_container').hide();
  }

  // Show loading message
  function show_loading_message(){
    $('#loading_container').show();
  }
  // Hide loading message
  function hide_loading_message(){
    $('#loading_container').hide();
  }

  // Show lightbox
  function show_lightbox(){
    $('.lightbox_bg').show();
    $('.lightbox_container').show();
  }
  // Hide lightbox
  function hide_lightbox(){
    $('.lightbox_bg').hide();
    $('.lightbox_container').hide();
  }
  // Lightbox background
  $(document).on('click', '.lightbox_bg', function(){
    hide_lightbox();
  });
  // Lightbox close button
  $(document).on('click', '.lightbox_close', function(){
    hide_lightbox();
  });
  // Escape keyboard key
  $(document).keyup(function(e){
    if (e.keyCode == 27){
      hide_lightbox();
    }
  });
  
  // Hide iPad keyboard
  function hide_ipad_keyboard(){
    document.activeElement.blur();
    $('input').blur();
  }

  // Add company button
  $(document).on('click', '#add_rental_pool', function(e){
    e.preventDefault();
    $('.lightbox_content h2').text('Add rental pool');
    $('#form_rental_pool button').text('Add rental pool');
    $('#form_rental_pool').attr('class', 'form add');
    $('#form_rental_pool').attr('data-id', '');
    $('#form_rental_pool .field_container label.error').hide();
    $('#form_rental_pool .field_container').removeClass('valid').removeClass('error');
    $('#form_rental_pool #rank').val('');
    $('#form_rental_pool #Model').val('');
    $('#form_rental_pool #industries').val('');
    $('#form_rental_pool #revenue').val('');
    $('#form_rental_pool #fiscal_year').val('');
    $('#form_rental_pool #employees').val('');
    $('#form_rental_pool #market_cap').val('');
    $('#form_rental_pool #headquarters').val('');
    show_lightbox();
  });

  // Add company submit form
  $(document).on('submit', '#form_rental_pool.add', function(e){
    e.preventDefault();
    // Validate form
    if (form_rental_pool.valid() == true){
      // Send company information to database
      hide_ipad_keyboard();
      hide_lightbox();
      show_loading_message();
      var form_data = $('#form_rental_pool').serialize();
      var request   = $.ajax({
        url:          'data.php?job=add_rental_pool',
        cache:        false,
        data:         form_data,
        dataType:     'json',
        contentType:  'application/json; charset=utf-8',
        type:         'get'
      });
      request.done(function(output){
        if (output.result == 'success'){
          // Reload datable
          table_rental_pool.api().ajax.reload(function(){
            hide_loading_message();
            var Model = $('#Model').val();
            show_message("Company '" + Model + "' added successfully.", 'success');
          }, true);
        } else {
          hide_loading_message();
          show_message('Add request failed', 'error');
        }
      });
      request.fail(function(jqXHR, textStatus){
        hide_loading_message();
        show_message('Add request failed: ' + textStatus, 'error');
      });
    }
  });

  // Edit company button
  $(document).on('click', '.function_edit a', function(e){
    e.preventDefault();
    // Get company information from database
    show_loading_message();
    var id      = $(this).data('id');
    var request = $.ajax({
      url:          'data.php?job=get_rental_pool',
      cache:        false,
      data:         'id=' + id,
      dataType:     'json',
      contentType:  'application/json; charset=utf-8',
      type:         'get'
    });
    request.done(function(output){
      if (output.result == 'success'){
        $('.lightbox_content h2').text('Edit company');
        $('#form_rental_pool button').text('Edit company');
        $('#form_rental_pool').attr('class', 'form edit');
        $('#form_rental_pool').attr('data-id', id);
        $('#form_rental_pool .field_container label.error').hide();
        $('#form_rental_pool .field_container').removeClass('valid').removeClass('error');
        $('#form_rental_pool #rank').val(output.data[0].rank);
        $('#form_rental_pool #Model').val(output.data[0].Model);
        $('#form_rental_pool #industries').val(output.data[0].industries);
        $('#form_rental_pool #revenue').val(output.data[0].revenue);
        $('#form_rental_pool #fiscal_year').val(output.data[0].fiscal_year);
        $('#form_rental_pool #employees').val(output.data[0].employees);
        $('#form_rental_pool #market_cap').val(output.data[0].market_cap);
        $('#form_rental_pool #headquarters').val(output.data[0].headquarters);
        hide_loading_message();
        show_lightbox();
      } else {
        hide_loading_message();
        show_message('Information request failed', 'error');
      }
    });
    request.fail(function(jqXHR, textStatus){
      hide_loading_message();
      show_message('Information request failed: ' + textStatus, 'error');
    });
  });
  
  // Edit company submit form
  $(document).on('submit', '#form_rental_pool.edit', function(e){
    e.preventDefault();
    // Validate form
    if (form_rental_pool.valid() == true){
      // Send company information to database
      hide_ipad_keyboard();
      hide_lightbox();
      show_loading_message();
      var id        = $('#form_rental_pool').attr('data-id');
      var form_data = $('#form_rental_pool').serialize();
      var request   = $.ajax({
        url:          'data.php?job=edit_rental_pool&id=' + id,
        cache:        false,
        data:         form_data,
        dataType:     'json',
        contentType:  'application/json; charset=utf-8',
        type:         'get'
      });
      request.done(function(output){
        if (output.result == 'success'){
          // Reload datable
          table_rental_pool.api().ajax.reload(function(){
            hide_loading_message();
            var Model = $('#Model').val();
            show_message("Company '" + Model + "' edited successfully.", 'success');
          }, true);
        } else {
          hide_loading_message();
          show_message('Edit request failed', 'error');
        }
      });
      request.fail(function(jqXHR, textStatus){
        hide_loading_message();
        show_message('Edit request failed: ' + textStatus, 'error');
      });
    }
  });
  
  // Delete company
  $(document).on('click', '.function_delete a', function(e){
    e.preventDefault();
    var Model = $(this).data('name');
    if (confirm("Are you sure you want to delete '" + Model + "'?")){
      show_loading_message();
      var id      = $(this).data('id');
      var request = $.ajax({
        url:          'data.php?job=delete_rental_pool&id=' + id,
        cache:        false,
        dataType:     'json',
        contentType:  'application/json; charset=utf-8',
        type:         'get'
      });
      request.done(function(output){
        if (output.result == 'success'){
          // Reload datable
          table_rental_pool.api().ajax.reload(function(){
            hide_loading_message();
            show_message("Company '" + Model + "' deleted successfully.", 'success');
          }, true);
        } else {
          hide_loading_message();
          show_message('Delete request failed', 'error');
        }
      });
      request.fail(function(jqXHR, textStatus){
        hide_loading_message();
        show_message('Delete request failed: ' + textStatus, 'error');
      });
    }
  });

});