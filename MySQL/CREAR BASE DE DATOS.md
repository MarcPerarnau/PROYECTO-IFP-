Como puede haber ciertos errores y defectos al probar el servidor hemos decidido crear una archivo .sh con los comandos para crear automaticamente la bd, las tablas y las relaciones 
```
#!/bin/bash

# Variables
MYSQL_USER="cache3815"       

# Solicitar la contraseña
read -sp "Introduce la contraseña de MySQL: " MYSQL_PASSWORD
echo

# Comando SQL para crear la base de datos
SQL_COMMANDS="
CREATE DATABASE IF NOT EXISTS proyecto;
"

# Ejecutar comando SQL
mysql -u $MYSQL_USER -p$MYSQL_PASSWORD -e "$SQL_COMMANDS"

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
