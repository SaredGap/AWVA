<div class="page-content">
<div class="col-md-12">
        <div class="card">
            <div class="card-body rounded-0">
                <h1 class="d-flex justify-content-center">Calificaciones <br></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <center>
                    <h4 class="card-title">Lista de Exámenes y Calificaciones</h4>
                    </center>
                    <p class="card-title-desc">A continuación, se muestra una tabla que contiene los exámenes realizados y sus calificaciones correspondientes obtenidas por el usuario.</p>
                    <div class="table-responsive">
                        <table class="table table-lg mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre del Examen</th>
                                    <th>Calificación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($calificaciones as $calificacion): ?>

                                    <tr>
                                        <th scope="row"><?php echo $calificacion->id_usuarios; ?></th>
                                        <td><?php echo $calificacion->Examen; ?></td>
                                        <td pattern=""><?php echo $calificacion->CalificacionFinal; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

</div>