```
#!/bin/bash

# Nombre de la base de datos
DB_NAME="Proyecto"

# Comandos SQL para crear las tablas
SQL_COMMANDS="
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
"

# Ejecutar los comandos SQL usando las credenciales de ~/.my.cnf
mysql -e "$SQL_COMMANDS"

echo "Tablas creadas exitosamente."
```

Despues debemos concederle los permisos de ejecucción 
```
chmod +x .crear-tablas.sh
```
Y ejecutamos escript
```
./.crear-tablas.sh
```
