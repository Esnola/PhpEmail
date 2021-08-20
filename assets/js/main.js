$(function() {
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
        $('#sendemail').remove();
        $('.send').append(`<button class="btn btn-primary" type="button" id="sendemail" disabled>
            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            <span class="sr-only">Enviando...</span>
        </button>`)
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
            if(nombre.length > 2){
                nombres_verify.push(nombre)
            }
        })

        $.post({
            url: '/correos/enviando',
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
            $('#sendemail').remove();
            $('.send').append(`<button type="submit" id="sendemail" class="btn btn-outline-info">Enviar Correos</button>`)
        });
    });

    $('#cargarmas').on('click', (e) =>{
        e.preventDefault();
        $.post({
            url: '/correos/paginate',
            data: {
                offset: offSet,
                limit: 10
            }
        }).done((response) =>{
            const data = JSON.parse(response);
            if(data.data.length > 0){
                data.data.forEach((msj) => {
                    offSet++
                    $('#tbody-mensajes').append(`<tr class="something">
                    <th scope="row">${offSet}</th>
                    <td>${msj.correo}</td>
                    <td>${msj.asunto}</td>
                    <td class="collapse" id="mensaje_colapse<?=$index?>" aria-expanded="true">${msj.mensaje}</td>
                    <td>
                        <a class="btn btn-outline-success" data-bs-toggle="collapse"  role="button" aria-expanded="false" aria-controls="collapseExample" href="#mensaje_colapse${offSet}">Ver Mensaje</a>
                    </td>
                </tr>`);
                });
            }else{
                $('#cargarmas').remove();
            }
        });
    });
});