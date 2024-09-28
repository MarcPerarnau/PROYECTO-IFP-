```
create table usuarios (
nombre_usuario varchar(50) not null,
email varchar(100) primary key unique,
telefono varchar(15) not null,
contrasena varchar(255) not null
);
create table mensajes (
id_mensaje int auto_increment primary key, 
descripción text, 
matricula varchar(15) not null, 
fecha_registro timestamp default current_timestamp);
create table vehiculos (
matricula varchar(10) primary key,
marca varchar(10) not null,
modelo varchar(30) not null,
color varchar(20) not null,
fecha_registro timestamp default current_timestamp,
id_usuario int 
);
alter table vehiculos ADD constraint FK_usuario_vehiculo foreign key (email) references usuarios(email);
alter table mensajes ADD constraint FK_vehiculo_mensaje foreign key (matricula) references vehiculos(matricula);
```
