create database db_simplon;
/*==============================================================*/
/* Table : APPRENANTS                                           */
/*==============================================================*/
create table APPRENANTS
(
   id_apprenant         int not null auto_increment,
   id_tuteur            int not null,
   nom                  varchar(50),
   prenom               varchar(50),
   date_naiss           datetime,
   ville                varchar(50),
   formation            varchar(50),
   etabliss             varchar(50),
   contact              int,
   photo                varchar(50),
   primary key (id_apprenant)
);

/*==============================================================*/
/* Table : TUTEURS                                              */
/*==============================================================*/
create table TUTEURS
(
   id_tuteur            int not null auto_increment,
   nom                  varchar(50),
   prenom               varchar(50),
   profession           varchar(50),
   contact              int,
   primary key (id_tuteur)
);

alter table APPRENANTS add constraint FK_Association_1 foreign key (id_tuteur)
      references TUTEURS (id_tuteur) on delete restrict on update restrict;
