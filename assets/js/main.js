$(function() {
    console.log( "ready!" );
    $('#add_data').on('click', ()=>{
        $('.inp-datos').append(`<div class="d-flex d-flex-row justify-content-center ">
        <div class="p-3">
            <label for="email" class="h6 text-dark">Correo</label>
            <input type="email" class="form-control correos" name="correos[]">
        </div>
        <div class="p-3">
            <label for="nombre" class="h6 text-dark">Nombre</label>
            <input type="email" class="form-control nombre" name="nombre[]">
        </div>
        </div>`);
        $('.inp-datos').scrollTop(500000);
        
    });
    

    $('#guardar_config').on('click', (e) =>{
        e.preventDefault();
        const host_value = $('#host').val();
        const correo = $('#correo').val();
        const password = $('#pwd').val();
        const puerto = $('#puerto').val();

        $.post({
            url: '/correos/config/guardar',
            data: {
                host: host_value,
                correo: correo,
                password: password,
                puerto: puerto
            }
        }).done((response) => {
            data = JSON.parse(response);
            if(data.status == false){
                swal({
                    title: "Error.",
                    text: "Datos incorrectos",
                    icon: "warning"
                });
            }
            else{
                swal({
                    title: "Correcto.",
                    text: "Datos Guardados.",
                    icon: "success"
                })
                .then(() =>{
                    window.location.reload();
                });
            }
            
        });
    });

    $('#sendemail').on('click', (e) =>{
        e.preventDefault();
        let correos = $(".correos").map(function(){return $(this).val();}).get();
        const nombres = $(".nombre").map(function(){return $(this).val();}).get();
        const mensaje = $('#mensaje').val();
        const asunto = $('#asunto').val();
        //verify lenght
        let correos_verify = [];
        correos.forEach(correo => {
            if(correo.length > 5){
                correos_verify.push(correo)
            }
        });

        let nombres_verify = [];
        nombres.forEach(nombre => {
            if(nombre.length > 5){
                nombres_verify.push(nombre)
            }
        })

        $.post({
            url: '/correos/enviar',
            data: {
                correos: correos_verify,
                nombres: nombres_verify,
                mensaje: mensaje,
                asunto: asunto
            }
        }).done((response) =>{
            const data = JSON.parse(response);
            if(data.status == true){
                swal({
                    title: "Exitoso.",
                    text: data.response,
                    icon: "success"
                });
            }else{
                swal({
                    title: "Error",
                    text: data.response,
                    icon: "error"
                });
            }
        });
    });
});