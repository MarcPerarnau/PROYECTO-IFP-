<h1 align="center">CONFIGURACIÓN DE MySQL</h1>

Como es una nueva instalación de MySQL deberemos instalar y cambiar cosas para poder hacer la BBDD un poquito mas segura. 

Lo primero que deberemos hacer sera ejecutar el `mysql_secure_installation`
```
sudo mysql_secure_installation
```
El comando anterior nos guiara a través de una serie de instrucciones mediante las cuales podrá realizar cambios en las opciones de seguridad de su intalación de MySQL: 
```
Press y|Y for Yes, any other key for No: Y
There are three levels of password validation policy:

LOW    Length >= 8
MEDIUM Length >= 8, numeric, mixed case, and special characters
STRONG Length >= 8, numeric, mixed case, special characters and dictionary                  file

Please enter 0 = LOW, 1 = MEDIUM and 2 = STRONG: 2
Remove anonymous users?: y
Disallow root login remotely?: y
Remove test database and access to it?: y
Reload privilege tables now?: y
```
Ahora deberemos entrar en MySQL 
```
sudo mysql
```
![image](https://github.com/user-attachments/assets/ed959a39-1f3a-41a7-b140-6ecda434d4c4)

A continuación, con el siguiente comando comprovamos el método de autenticación utilizado por una de sus cuentas de usuario de MySQL:
```
SELECT user,authentication_string,plugin,host FROM mysql.user;
```
![image](https://github.com/user-attachments/assets/8d1bf962-c9c3-403d-9b36-89e55f3a4117)

Podemos observar que el usaurio root esta utilizando el plugin `auth_socket`. Para configurar que el usuario root deba escribir una contraseña, deberemos ejecuar una instrucción de `ALTER USER` para poder cambiar el plugin. 
```
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'contraseña';
```
>[!CAUTION]
>Recuerda la contraseña debe tener al menos 8 caracteres, 1 número, 1 letra mayuscula, 1 letra minuscula, 1 caracter especial. Ex: 12345Fg&

![image](https://github.com/user-attachments/assets/f2ce15e3-65f3-4144-baed-b2ec088519d8)

A continuación, ejecutamos FLUSH PRIVILEGES para indicar al servidor que vuelva a cargar la tabla de permisos y aplique sus nuevos cambios:

```
FLUSH PRIVILEGES;
```
![image](https://github.com/user-attachments/assets/9f72dffa-0fac-4e01-8b7a-eb642c11ac6f)

Comprovamos de nuevo los métodos de autenticación empleados por cada uno de sus usuarios para confirmar que root deje de realizarla usando el complemento de auth_socket:
```
SELECT user,authentication_string,plugin,host FROM mysql.user;
```
![image](https://github.com/user-attachments/assets/da8c9750-149c-44cf-a1de-660ef0ca6caf)

Puodemos ver en este resultado de ejemplo que el root user de MySQL ahora autentica usando caching_sha2_password. Una vez que confirme esto en su propio servidor, podrá cerrar el shell de MySQL:

```
exit
```
![image](https://github.com/user-attachments/assets/d0135ea8-784e-46fc-a74d-5c1f7de8fbe0)

Por otra parte, para el flujo de trabajo de algunos puede resultar más conveniente la conexión a MySQL con un usuario dedicado. Para crear dicho usuario, abra el shell de MySQL de nuevo:
```
mysql -u root -p
```
![image](https://github.com/user-attachments/assets/f57be9fe-ce6e-4a07-8d8e-23b88a8a7f95)

A partir de ahí, crearemos un usuario nuevo y asigne una contraseña segura:
```
CREATE USER 'user'@'localhost' IDENTIFIED BY 'password';
```
![image](https://github.com/user-attachments/assets/b24f7fb8-94e1-4b94-868d-22b41327db84)

Luego, conceda a su nuevo usuario los privilegios apropiados. Por ejemplo, con el siguiente comando podría conceder privilegios de usuario a todas las tablas dentro de la base de datos, así como la facultad de añadir, cambiar y eliminar privilegios de usuario:

```
GRANT ALL PRIVILEGES ON *.* TO 'user'@'localhost' WITH GRANT OPTION;
```
![image](https://github.com/user-attachments/assets/0a60f201-79fc-4fe3-ab41-f1166737ef87)
