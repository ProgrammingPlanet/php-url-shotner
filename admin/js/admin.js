

$('#op').hide();

function sort(btnobj)
{
   $(btnobj).text('shorting...');
   $('#op').hide();
   $.ajax({
       url: 'ajax.php',
       type: 'POST',
       data: {op: 'short', longurl: $('#urlin').val(), alias: $('#alias').val()},
       success:function(result){
           // return console.log(result);
           if(result.status == 1)
           {
               const homeurl = location.protocol+'//'+location.hostname;
               $('#urlout').val(homeurl+'/'+result.shorturlid);
               $('#op').fadeIn();
               $('#urlin').val('');
               $('#alias').val('')
           }
           else
                alert(result.msg);
           $(btnobj).text('short');
       },
       error:function(response)
       {
           console.log(response);
           $(btnobj).text('short');
       }
   });
}

function copytoclipboard(btnobj,inputid)
{
   
    $('#'+inputid).prop("disabled", false).select();
    document.execCommand("copy");
    $('#'+inputid).prop("disabled", true);
    $(btnobj).text('copied');
}