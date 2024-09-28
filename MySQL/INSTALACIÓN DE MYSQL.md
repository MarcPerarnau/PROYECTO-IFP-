<h1 align="center">INSTALACIÓN DE MySQL</h1>

Lo primero que debemos hacer es actualizar Ubuntu con el siguiente comando:

```
sudo apt update & sudo apt full-upgrade -y
```
>[!TIP]
> Se utiliza el -y para que el ordenador sepa que todas las preguntas que nos haga la respuesta sera si. El & lo utilizamos para que dos comandos se ejecuten mediante una sola linea. 

![image](https://github.com/user-attachments/assets/9b357d59-449e-4188-9ca8-f662d848d1f7)

Cuando la actualización termine procederemos a instalar el servicio de MySQL mediante el comdando: 
```
sudo apt install mysql-server -y
```
![image](https://github.com/user-attachments/assets/a7bd363b-26ce-44fd-a38a-5e9e4f30c720)


Al finalizar la actualización del servidor de MySQL executaremos el siguiente comando para ver si el servicio esta activado. 

```
sudo systemctl status mysql
```
![image](https://github.com/user-attachments/assets/2acc8444-d827-48ed-8bc0-beaf355c26e6)

>[!IMPORTANT]
> En caso de que al ejecutar el comando anterior el resultado fuera que el servicio esta activo no ejecutar el siguiente paso.

Como se puede observar en la imagen el servicio que acabamos de instalar esta inactivo, para poder encender-lo deberemos utilizazar el comando.
```
sudo systemctl start mysql
```
![image](https://github.com/user-attachments/assets/c6a0b690-d1e6-45ab-a00a-aa0cc75d7afc)
