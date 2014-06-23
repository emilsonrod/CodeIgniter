delimiter //
create procedure tareasInicioEstudiante(in login varchar(50), in pass varchar(15))
begin
	declare rol int;
	declare idT1 int;
	declare idT2 int;
	declare idT3 int;
	declare idT4 int;
	declare idT5 int;
	declare idT6 int;
	declare idT7 int;
	declare idUser int;


	set idUser=(select id_usuario from usuario where loggin=login and passw=pass);
	set rol = (select id_rol from rol  where nombre_rol='estudiante');
    insert into rol_usuario (id_rol,id_usuario)values(rol,idUser); 
	 
	set idT1 = (select id_form from formulario where nombre_form='Grupos Existentes');
	set idT2 = (select id_form from formulario where nombre_form='Registrar Grupo');
	set idT3 = (select id_form from formulario where nombre_form='Inscribirse');
	
	set idT4 = (select id_form from formulario where nombre_form='Fijar fechas de entrega de hitos');
	set idT5 = (select id_form from formulario where nombre_form='Subir Documento Estudiante');
	set idT6 = (select id_form from formulario where nombre_form='Subir hitos');
	set idT7 = (select id_form from formulario where nombre_form='Historias de Usuario');

	insert into actividad_usuario(id_usuario,id_form,permitido)values
	(idUser,idT1,'1'),
	(idUser,idT2,'1'),
	(idUser,idT3,'1'),
	(idUser,idT4,'0'),
	(idUser,idT5,'0'),
	(idUser,idT6,'0'),
	(idUser,idT7,'0');
	
end
//