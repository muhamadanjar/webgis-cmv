function numeralsOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
    ((evt.which) ? evt.which : 0));
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Hanya Nomor yang bisa di input pada kolom ini.");
            return false;
        }
    return true;
}

function lettersOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
        ((evt.which) ? evt.which : 0));
    if (charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
        alert("Enter letters only.");
        return false;
    }
    return true;
}

function ynOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode > 31 && charCode != 78 && charCode != 89 && charCode != 110 && charCode != 121) {
    alert("Enter \"Y\" or \"N\" only.");
    return false;
    }
    return true;
}

(function($, window, document){
    $('.formConfirm').on('click', function(e) {
        e.preventDefault();
        var el = $(this).parent();
        var title = el.attr('data-title');
        var msg = el.attr('data-message');
        var dataForm = el.attr('data-form');
        
        $('#formConfirm')
        .find('#frm_body').html('<h6>'+msg+'</h6>')
        .end().find('#frm_title').html(title)
        .end().modal('show');
        
        $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);
    });

    $('#formConfirm').on('click', '#frm_submit', function(e) {
        var id = $(this).attr('data-form');
        console.log(id);
        $(id).submit();
    });

}(jQuery, window, document));


(function($, window, document){

  $(function() {
    $('#checkall').click(function(event) {  //on click
      console.log(event);
        if(this.checked) { // check select status
          $('.checkbox').each(function() { //loop through each checkbox
              this.checked = true;  //select all checkboxes with class "checkbox1"              
          });
        }else{
          $('.checkbox').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
          });        
        }
    });

    $('#checkall-field').click(function(event) {  //on click
      console.log(event);
        if(this.checked) { // check select status
          $('.checkbox-field').each(function() { //loop through each checkbox
              this.checked = true;  //select all checkboxes with class "checkbox1"              
          });
        }else{
          $('.checkbox-field').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
          });        
        }
    });
    $('#deskripsi').hide();
    $('#media-list').hide();
    $('#display-keyvalue').change(function (argument) {
      var value = this.value;
      if(value == 'custom'){
        $('#deskripsi').show();
        $('#field-list').hide()
      }else{
        $('#deskripsi').hide();
        $('#field-list').show();
      }
    });

    var typemedia = $('#type_m');
    typemedia.click(function (argument) {
      var value = this.value;
      console.log(value);
      if (value != 'image') {
        $('#media-list').show();
      }else{
        $('#media-list').hide();
      };
    });


    $('#layerurl').bind("enterUrl",function(e){
      alert("Enter");
    });
    $('#layerurl').keyup(function(e){
      if(e.keyCode == 13){
        $(this).trigger("enterUrl");
      }
    });

  });

}(jQuery, window, document));