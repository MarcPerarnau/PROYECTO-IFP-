Como puede haber ciertos errores y defectos al probar el servidor hemos decidido crear una archivo .sh con los comandos para crear automaticamente la bd, las tablas y las relaciones 
```
#!/bin/bash

# Variables
MYSQL_USER="cache3815"     
DB_NAME="Proyecto"         

# Solicitar la contraseña
read -sp "Introduce la contraseña de MySQL de root: " MYSQL_PASSWORD
echo

# Comandos SQL para crear la base de datos, tablas y relaciones
SQL_COMMANDS="
CREATE DATABASE IF NOT EXISTS $DB_NAME;
USE $DB_NAME;

CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT,
    nombre_usuario VARCHAR(50) NOT NULL,
    email VARCHAR(100) PRIMARY KEY UNIQUE,
    telefono VARCHAR(15) NOT NULL,
    contrasena VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS mensajes (
    id_mensaje INT AUTO_INCREMENT PRIMARY KEY, 
    descripción TEXT, 
    matricula INT, 
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS vehiculos (
    id_vehiculo INT AUTO_INCREMENT,
    matricula VARCHAR(10) PRIMARY KEY,
    marca VARCHAR(10) NOT NULL,
    modelo VARCHAR(30) NOT NULL,
    color VARCHAR(20) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_usuario INT
);

ALTER TABLE vehiculos ADD CONSTRAINT FK_usuario_vehiculo FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario);

ALTER TABLE mensajes ADD CONSTRAINT FK_vehiculo_mensaje FOREIGN KEY (matricula) REFERENCES vehiculos(matricula);
"

# Ejecutar comandos SQL
mysql -u $MYSQL_USER -p$MYSQL_PASSWORD -e "$SQL_COMMANDS"

echo "Base de datos y tablas creadas exitosamente."
```

Despues debemos concederle los permisos de ejecucción 
```
chmod +x crear-BBDD.sh
```
Y ejecutamos escript
```
./crear_db_proyecto.sh
```
