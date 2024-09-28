<h1 align="center">INSTALACIÓN DE NGINX</h1>

Lo primero va ser instalar nginx
```
sudo apt install nginx
```
![image](https://github.com/user-attachments/assets/b8c32d57-416f-44f2-9509-d5b30521f5d5)

Antes de probar Nginx, se deben aplicar ajustes al software del firewall para permitir el acceso al servicio. Nginx se registra de forma automática como un servicio con ufw tras la instalación, lo que hace que sea sencillo permitir el acceso de Nginx.

```
sudo ufw app list
```
![image](https://github.com/user-attachments/assets/55a60a6a-8629-4499-9ecc-ab4e4d58f9d9)

Se recomienda habilitar el perfil más restrictivo, que de todos modos permitirá el tráfico que configuró. En este momento, solo tendremos que permitir el tráfico en el puerto 80.

Puede habilitarlo escribiendo lo siguiente:
```
sudo ufw allow 'Nginx HTTP'
```
![image](https://github.com/user-attachments/assets/6b4538d5-d909-4c6a-bb93-23d4ac3f586b)

Puede verificar el cambio escribiendo lo siguiente: 
```
sudo ufw status
```
![image](https://github.com/user-attachments/assets/2ba8ef11-93c0-4c4a-9b85-8ea56e33f9e1)

Debremos activar el firewall con el comando
```
sudo ufw enable
```
![image](https://github.com/user-attachments/assets/e36930dd-889d-443d-9183-682525d9c960)

Puede verificar el cambio escribiendo lo siguiente: 
```
sudo ufw status
```
![image](https://github.com/user-attachments/assets/dc60c664-2573-42a1-8eae-e6333b39f931)

Al final del proceso de instalación, Ubuntu 20.04 inicia Nginx. El servidor web ya debería estar activo.

Realice una verificación con systemd init para asegurarse de que el servicio esté en ejecución escribiendo lo siguiente:
````
systemctl status nginx
````
![image](https://github.com/user-attachments/assets/9398547c-8ddb-4cb9-94b6-75f6c54107b4)

Puede acceder a la página de aterrizaje predeterminada de Nginx para confirmar que el software funcione correctamente dirigiéndose a la dirección IP de su servidor. Si no conoce la dirección IP de su servidor, puede buscarla con la herramienta icanhazip.com, que le proporcionará su dirección IP pública tal como la recibió de otra ubicación en Internet:
````
curl -4 icanhazip.com
````
![image](https://github.com/user-attachments/assets/9f153281-a2be-40e4-85f9-72317ea059a4)

Cuando tenga la dirección IP de su servidor, introdúzcala en la barra de direcciones de su navegador:
````
http://your_server_ip
````
