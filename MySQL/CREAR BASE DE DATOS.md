Para que no salte un error de [Warnign] deberemos crear el archivo my.cnf
```
sudo nano ~/.my.cnf
```
Dentro del archivo deberemos escribir los siguiente:
```
[client]
user='user'
password='password'
```
Ahora establecemos permisos
```
chmod 600 ~/.my.cnf
```
Como puede haber ciertos errores y defectos al probar el servidor hemos decidido crear una archivo .sh con los comandos para crear automaticamente la bd, las tablas y las relaciones 
```
#!/bin/bash

# Comando SQL para crear la base de datos
SQL_COMMANDS="
CREATE DATABASE IF NOT EXISTS Proyecto;
"

# Ejecutar el comando SQL usando las credenciales de ~/.my.cnf
mysql -e "$SQL_COMMANDS"

echo "Base de datos 'Proyecto' creada exitosamente."
```

Despues debemos concederle los permisos de ejecucción 
```
chmod +x .crear-bd.sh
```
Y ejecutamos escript
```
./.crear-bd.sh
```
