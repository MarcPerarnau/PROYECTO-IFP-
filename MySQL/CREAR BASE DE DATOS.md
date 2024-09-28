Como puede haber ciertos errores y defectos al probar el servidor hemos decidido crear una archivo .sh con los comandos para crear automaticamente la bd, las tablas y las relaciones 
```
#!/bin/bash

# Variables
MYSQL_USER="cahce3815"
MYSQL_PASSWORD="z1fVrI&ZVfyonsZ"

# Comando SQL para crear la base de datos
SQL_COMMANDS="
CREATE DATABASE IF NOT EXISTS Proyecto;
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
