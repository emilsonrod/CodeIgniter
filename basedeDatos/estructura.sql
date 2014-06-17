/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     12/06/2014 07:09:41 a.m.                     */
/*==============================================================*/


drop table if exists DOCUMENTO_DOCENTE;

drop table if exists ENTREGA;

drop table if exists EVENTO;

drop table if exists EVENTO_PARTICULAR;

drop table if exists FORMULARIO;

drop table if exists GRUPO;

drop table if exists HISTORIA_USUARIO;

drop table if exists INTEGRANTES_GRUPO;

drop table if exists NOTA;

drop table if exists NOTA_ESTUDIANTE;

drop table if exists RESPONSABLE_TAREA;

drop table if exists ROL;

drop table if exists ROL_FORMULARIO;

drop table if exists ROL_USUARIO;

drop table if exists TAREA;

drop table if exists TIPO_EVENTO;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: DOCUMENTO_DOCENTE                                     */
/*==============================================================*/
create table DOCUMENTO_DOCENTE
(
   ID_USUARIO           int not null,
   COD_DOC_DOC          int not null,
   NOMBRE_DOC           varchar(100),
   FECHA_SUBIDA         date,
   DESCRIPCION          text,
   primary key (ID_USUARIO, COD_DOC_DOC)
);

/*==============================================================*/
/* Table: ENTREGA                                               */
/*==============================================================*/
create table ENTREGA
(
   ID_ENTREGA           int not null auto_increment,
   COD_GRUPO            int,
   ID_EVENTO            int,
   NOMBRE_ENTREGA       varchar(50),
   FECHA_ENTREGA        date,
   COMENTARIO           varchar(250),
   primary key (ID_ENTREGA)
);

/*==============================================================*/
/* Table: EVENTO                                                */
/*==============================================================*/
create table EVENTO
(
   FECHA_EVENTO         date,
   ID_EVENTO            int not null auto_increment,
   ID_TIPO_EVENTO       int not null,
   ID_USUARIO           int not null,
   AVISO                varchar(250),
   primary key (ID_EVENTO)
);

/*==============================================================*/
/* Table: EVENTO_PARTICULAR                                     */
/*==============================================================*/
create table EVENTO_PARTICULAR
(
   COD_GRUPO            int not null,
   ID_EVENTO            int not null,
   primary key (COD_GRUPO, ID_EVENTO)
);

/*==============================================================*/
/* Table: FORMULARIO                                            */
/*==============================================================*/
create table FORMULARIO
(
   ID_FORM              int not null auto_increment,
   NOMBRE_FORM          varchar(30) not null,
   CONTROLADOR          varchar(100) not null,
   primary key (ID_FORM)
);

/*==============================================================*/
/* Table: GRUPO                                                 */
/*==============================================================*/
create table GRUPO
(
   COD_GRUPO            int not null auto_increment,
   ID_DOCENTE           int not null,
   ID_REPRESENTANTE       int not null,
   CORREO_GRUPO         varchar(50) not null,
   NOMBRE_LARGO         varchar(100) not null,
   NOMBRE_CORTO         varchar(50) not null,
   PASSW_GRUPO          varchar(15) not null,
   ACTIVO               bool not null DEFAULT  '1',
   primary key (COD_GRUPO)
);

/*==============================================================*/
/* Table: HISTORIA_USUARIO                                      */
/*==============================================================*/
create table HISTORIA_USUARIO
(
   ID_HISTORIA          int not null auto_increment,
   ID_EVENTO            int not null,
   NOM_HISTORIA         varchar(150) not null,
   primary key (ID_HISTORIA)
);

/*==============================================================*/
/* Table: INTEGRANTES_GRUPO                                     */
/*==============================================================*/
create table INTEGRANTES_GRUPO
(
   COD_GRUPO            int not null,
   ID_USUARIO           int not null,
   primary key (COD_GRUPO, ID_USUARIO)
);

/*==============================================================*/
/* Table: NOTA                                                  */
/*==============================================================*/
create table NOTA
(
   ID_ENTREGA           int not null,
   CALIFICACION         int not null,
   OBSERVACION          text,
   primary key (ID_ENTREGA)
);

/*==============================================================*/
/* Table: NOTA_ESTUDIANTE                                       */
/*==============================================================*/
create table NOTA_ESTUDIANTE
(
   ID_USUARIO           int not null,
   NOTA_ESTUDIANTE      int not null,
   OBSERVACION_ESTUDIANTE varchar(250),
   primary key (ID_USUARIO)
);

/*==============================================================*/
/* Table: RESPONSABLE_TAREA                                     */
/*==============================================================*/
create table RESPONSABLE_TAREA
(
   COD_GRUPO            int not null,
   ID_USUARIO           int not null,
   ID_TAREA             int not null,
   primary key (COD_GRUPO, ID_USUARIO, ID_TAREA)
);

/*==============================================================*/
/* Table: ROL                                                   */
/*==============================================================*/
create table ROL
(
   ID_ROL               int not null auto_increment,
   NOMBRE_ROL           varchar(25) not null,
   primary key (ID_ROL)
);

/*==============================================================*/
/* Table: ROL_FORMULARIO                                        */
/*==============================================================*/
create table ROL_FORMULARIO
(
   ID_FORM              int not null,
   ID_ROL               int not null,
   primary key (ID_FORM, ID_ROL)
);

/*==============================================================*/
/* Table: ROL_USUARIO                                           */
/*==============================================================*/
create table ROL_USUARIO
(
   ID_ROL               int not null,
   ID_USUARIO           int not null,
   primary key (ID_ROL, ID_USUARIO)
);

/*==============================================================*/
/* Table: TAREA                                                 */
/*==============================================================*/
create table TAREA
(
   ID_TAREA             int not null auto_increment,
   ID_HISTORIA          int not null,
   NOM_TAREA            varchar(150) not null,
   EVALUACION_EST       int not null,
   EVALUACION_DOC       int not null,
   primary key (ID_TAREA)
);

/*==============================================================*/
/* Table: TIPO_EVENTO                                           */
/*==============================================================*/
create table TIPO_EVENTO
(
   ID_TIPO_EVENTO       int not null,
   NOMBRE_TIPO_EVENTO   varchar(25) not null,
   primary key (ID_TIPO_EVENTO)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   ID_USUARIO           int not null auto_increment,
   NOMBRE               varchar(25) not null,
   APELLIDOP            varchar(50) not null,
   APELLIDOM            varchar(50) not null,
   LOGGIN               varchar(50) not null,   
   PASSW                varchar(15) not null,
   CORREO               varchar(25) not null,
    ACTIVO               bool not null DEFAULT  '1',   
   CI_DOCENTE           int not null,
   primary key (ID_USUARIO)
);

alter table DOCUMENTO_DOCENTE add constraint FK_RELATIONSHIP_21 foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete cascade on update cascade;

alter table ENTREGA add constraint FK_RELATIONSHIP_15 foreign key (COD_GRUPO)
      references GRUPO (COD_GRUPO) on delete cascade on update cascade;

alter table ENTREGA add constraint FK_RELATIONSHIP_16 foreign key (ID_EVENTO)
      references EVENTO (ID_EVENTO) on delete cascade on update cascade;

alter table EVENTO add constraint FK_RELATIONSHIP_13 foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete cascade on update cascade;

alter table EVENTO add constraint FK_RELATIONSHIP_14 foreign key (ID_TIPO_EVENTO)
      references TIPO_EVENTO (ID_TIPO_EVENTO) on delete cascade on update cascade;

alter table EVENTO_PARTICULAR add constraint FK_RELATIONSHIP_18 foreign key (ID_EVENTO)
      references EVENTO (ID_EVENTO) on delete cascade on update cascade;

alter table EVENTO_PARTICULAR add constraint FK_RELATIONSHIP_19 foreign key (COD_GRUPO)
      references GRUPO (COD_GRUPO) on delete cascade on update cascade;

alter table GRUPO add constraint FK_RELATIONSHIP_3 foreign key (ID_DOCENTE)
      references USUARIO (ID_USUARIO) on delete cascade on update cascade;

alter table GRUPO add constraint FK_RELATIONSHIP_9 foreign key (ID_REPRESENTANTE)
      references USUARIO (ID_USUARIO) on delete cascade on update cascade;

alter table HISTORIA_USUARIO add constraint FK_RELATIONSHIP_22 foreign key (ID_EVENTO)
      references EVENTO (ID_EVENTO) on delete cascade on update cascade;

alter table INTEGRANTES_GRUPO add constraint FK_RELATIONSHIP_6 foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete cascade on update cascade;

alter table INTEGRANTES_GRUPO add constraint FK_RELATIONSHIP_7 foreign key (COD_GRUPO)
      references GRUPO (COD_GRUPO) on delete cascade on update cascade;

alter table NOTA add constraint FK_RELATIONSHIP_17 foreign key (ID_ENTREGA)
      references ENTREGA (ID_ENTREGA) on delete cascade on update cascade;

alter table NOTA_ESTUDIANTE add constraint FK_RELATIONSHIP_20 foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete cascade on update cascade;

alter table RESPONSABLE_TAREA add constraint FK_RELATIONSHIP_24 foreign key (COD_GRUPO, ID_USUARIO)
      references INTEGRANTES_GRUPO (COD_GRUPO, ID_USUARIO) on delete cascade on update cascade;

alter table RESPONSABLE_TAREA add constraint FK_RELATIONSHIP_25 foreign key (ID_TAREA)
      references TAREA (ID_TAREA) on delete cascade on update cascade;

alter table ROL_FORMULARIO add constraint FK_RELATIONSHIP_4 foreign key (ID_ROL)
      references ROL (ID_ROL) on delete cascade on update cascade;

alter table ROL_FORMULARIO add constraint FK_RELATIONSHIP_5 foreign key (ID_FORM)
      references FORMULARIO (ID_FORM) on delete cascade on update cascade;

alter table ROL_USUARIO add constraint FK_RELATIONSHIP_1 foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete cascade on update cascade;

alter table ROL_USUARIO add constraint FK_RELATIONSHIP_2 foreign key (ID_ROL)
      references ROL (ID_ROL) on delete cascade on update cascade;

alter table TAREA add constraint FK_RELATIONSHIP_23 foreign key (ID_HISTORIA)
      references HISTORIA_USUARIO (ID_HISTORIA) on delete cascade on update cascade;

------------------------
