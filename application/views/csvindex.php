    <div id="columnacentral">
        
        <div class="container-fluid" style="margin-top:50px">    
            <h2>Importar Estudiantes</h2>

                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                    <?php echo form_label('  Archivo :');?></br>
                    <input type="file" name="userfile" class = "span3"><br><br>
                    <div id="divError"><h3><?php echo form_error('userfile');?></h3></div>
                    <div id="divError"><h3><?php echo $error;?></h3></div>
                    <input type="submit" name="submit" value="Ingresar Estudiantes" class="btn btn-primary">
                </form>
                <div class="row">
                    
                    <?php if ($this->session->flashdata('success') == TRUE): ?>
                    <div class="alert alert-success span3">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            <br><br>
            <table class="table table-striped table-hover table-bordered">
                <caption><h2>Estudiantes Inscritos</h2></caption>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>ApellidoP</th>
                        <th>ApellidoM</th>
                        <th>nombre usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($addressbook == FALSE): ?>
                        <tr><td colspan="4">Actualmente no hay estudiantes</td></tr>
                    <?php else: ?>
                        <?php foreach ($addressbook as $row): ?>
                            <tr>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['apellidoP']; ?></td>
                                <td><?php echo $row['apellidoM']; ?></td>
                                <td><?php echo $row['loggin']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <hr>
        </div>
    
</div>
