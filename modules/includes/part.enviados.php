<div class="d-flex flex-column">
    <div class="d-flex flex-row justify-content-center justify-content-sm-start">
        <h1 class="text-center">Correos Enviados</h1>
    </div>
    <div class="d-flex flex-row">
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Correo</th>
                <th scope="col">Asunto</th>
                <th scope="col">Mensaje</th>
                </tr>
            </thead>
            <tbody id="tbody-mensajes">
            <?php
                $index = 1;
                foreach($correos_enviados as $correo_enviado):
                    ?>
                    <tr class="something">
                        <th scope="row"><?=$index?></th>
                        <td><?=$correo_enviado['correo']?></td>
                        <td><?=$correo_enviado['asunto']?></td>
                        <td class="collapse" id="mensaje_colapse<?=$index?>" aria-expanded="true"><?=$correo_enviado['mensaje']?></td>
                        <td>
                            <a class="btn btn-outline-success" data-bs-toggle="collapse"  role="button" aria-expanded="false" aria-controls="collapseExample" href="#mensaje_colapse<?=$index?>">Ver Mensaje</a>
                        </td>
                    </tr>
                <?php $index++; endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
            if(count($correos_enviados) >= 10):
                ?>
                <div class="d-flex flex-row justify-content-center">
                    <button class="btn btn-primary" id="cargarmas">Cargar mas</button>
                </div>
            <?php
                endif;
        ?>

</div>
<script>
    var offSet = <?=$index-1?>;
</script>