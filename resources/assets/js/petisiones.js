$(document).ready(function(){
    $( ".input-actividad" )
    .change(function () {
        var id = $(this).data('id');
        var campo = $(this).data('campo');
        var data = $( "#actividad-"+ campo +"-"+id ).val();
        console.log(data);
        console.log(campo);
        if (data){
            axios.put('/actividad-interno/',{
                [campo]: data,
                id: id                
            }).then(response => {
                console.log(response.config.data);
                window.location.href = "factores-internos";
                
            }).catch(error => console.error(error));
        }
    });

    $('#editar_facin').on('submit', function(e){
        e.preventDefault();
        var form = $(this).serialize();
        var id = $('.activity_id').val();
        var url = $('.url').val();
        
        axios.put('/actividad-interno/',{
            form: form,
            id: id                
        }).then(response => {
            console.log(response);
            //location.href = url;
            
        }).catch(error => console.error(error));

    });
    
});