use JanflashMusic;
show databases;
drop schema JanflashMusic;
create schema JanflashMusic;

select 2+1 as suma;
select 10 as n1,
 20 as n2;
 insert into transaciones ( ID_trasaciones, nombre, dinero,fecha,ID_Rol )
values( '1', 'maria', '100','2023/01/01','1130'),
( '2', 'mario', '-50','2023/06/01','2029' ),
( '3', 'mariana', '10.5','2023/12/01,' ,'1938' ),
( '4', 'marylus', '15','2023/11/01,' ,'4444' ),
( '5', 'Romulo', '15','2023/08/05,' ,'1234' ),
( '6', 'Pedro', '15','2023/09/03,' ,'4355' );

update transaciones
set ID_Rol = '4444'
where ID_trasaciones = '4';


select count(Nombre) from Personas
where Documento = '333'
and Clave ='VVVp';


alter table transaciones
  add ID_Rol int not null;
  
  alter table PersonaS
  add Invitacion Varchar (100) null;
 

alter table Personas
  add Clave varchar(50) not null;

 

# Clave varchar(50) not null,
  
 CREATE TABLE Personas(
 Documento int NOT NULL,
   Nombre varchar(50) not NULL, 
   Clave varchar(50) not null,
 primary key( Documento)
 );
 
 drop table Personas;
 
 SELECT * FROM Personas;
 #este es un Volcado de datos de la tabla transaciones a personas pasar datos de una otra tabla"___________"
 INSERT INTO Personas (Documento,Nombre)
 SELECT ID_trasaciones, nombre
 from transaciones;
 
alter table Personas
  add Sitio Varchar(100) null;