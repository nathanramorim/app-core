/*========= PÁGINA HOME ==========*/
function filter_search() {
    // declarando e instanciando os elementos
    var input, filter, ul, li, a, i, header;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');
    

    // Loop procurando pela palavra digitada na input
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("search")[0];
        console.log(a);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
            
        } else {
            li[i].style.display = "none";
        }
    }
}
/*========= PÁGINA HOME ==========*/




/*========= PÁGINA CURSO ==========*/

/* EDITOR DE TEXTO PÁGINA DE GRADE  */
$(document).ready(function(){
    
    $('.jqte-test').jqte();
    
    // settings of status
    var jqteStatus = true;
    $(".status").click(function()
    {
        jqteStatus = jqteStatus ? false : true;
        $('.jqte-test').jqte({"status" : jqteStatus})
    });
    
});
/* EDITOR DE TEXTO PÁGINA DE GRADE  */


/* BUTTONS */

/* UPDATE GRADE CURSO @INSERÇÃO DB */
$(document).ready(function(){
    $('#box-editar').hide();
    $("form#form-editar-grade").submit(function() {
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: './assets/RequirePost.php',
            data: formData,
            async: false,
            success: function (data) {
                if(data == 'true'){
                    $('.msg').attr('class','row msg alert alert-success');
                    $('.msg').text('Grade atualizada, com sucesso!');
                    $('html, body').animate({
                        scrollTop: $('header').offset().top
                    }, 300);
                    $('.msg').fadeIn('slow').delay(1000).fadeOut('slow');
                    
                    setTimeout(location.reload.bind(location), 2000);
                }else{
                    console.log(data);
                    $('.msg').attr('class','row msg alert alert-danger');
                    $('html, body').animate({
                        scrollTop: $('header').offset().top
                    }, 300);
                    $('.msg').text('Grade não atualizada, tente novamente');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    });

    $('#btn-editar').click(function(){
        $('#box-editar').toggle('slow');
        $('#box-grade').hide('slow');
        $('#btn-box-grade').hide('slow')
    });

    $('#open-box-grade').click(function (){
        $('#box-grade').show('slow');
        $('#btn-box-grade').show('slow')
        $('#box-editar').toggle('slow');
    });
});
/* UPDATE GRADE CURSO  */

/* TOOGLE EDITAR GRADE CURSO  */


/* TOOGLE EDITAR GRADE CURSO  */

/* BUTTONS */

/*========= PÁGINA CURSO ==========*/


