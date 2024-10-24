<h1 align="center">
A0 - Documento briefing: presentación del proyecto
</h1>
Andrea Sandu y Marc Liang Perarnau.
<h2 align="center">Instrucciones de la actividad</h2>
<p>
El briefing de un proyecto es una breve descripción de los elementos clave del mismo. Considéralo como un resumen rápido para los participantes del proyecto y los colaboradores. Tu briefing debe comunicar los requisitos del proyecto, sin ahogar a los participantes con demasiados detalles, debe explicar la raíz del proyecto de forma sencilla y concisa.
Para ello elabora un documento y entrégalo en pdf con los siguientes apartados completados:
</p>

<h2 align="center">EXPLICACIÓN DE LA WEB</h2>

Nuestro proyecto está diseñado con el fin de que los propietarios de los coches puedan ser notificados de manera rápida cuando hay problemas, como por ejemplo, cuando bloquea el paso, está mal estacionado o se ha producido algún accidente. 
Los usuarios se podrán registrar dentro de la página web y asociar su coche introduciendo datos como la matrícula, marca, modelo, etc.


Con lo anterior conseguimos que cualquier persona que pase por la calle y vea algún coche con problemas, podrá buscar la matrícula en la página web y enviar un mensaje al propietario mediante el correo electrónico o SMS. El dueño al ser notificado, podrá actuar rápidamente antes de que la situación se agrave.


La plataforma consistirá en mejorar la convivencia de las personas en las calles, resolviendo cualquier inquietud rápidamente. Su interfaz es sencilla e intuitiva, permitiendo que cualquier rango de edad sepa interactuar con ella sin problema. 


<h2 align="center">OBJETIVO QUE SE PERSIGUE (Temática)</h2>

El principal objetivo de nuestro proyecto es aprovechar nuestros conocimientos tecnológicos e informáticos para mejorar la vida urbana, enfocándonos en la resolución de problemas relacionados con los vehículos de nuestros propietarios registrados en la plataforma. 


Buscamos simplificar la comunicación, haciendo que las personas en el espacio público usen sus dispositivos móviles para notificar de manera rápida una situación importante. Es un mensaje que se tarda menos de un minuto en escribir y en resolver conflictos que pueden afectar a más personas, asegurando que a la vez el propietario sea informado y pueda actuar ante lo ocurrido.


<h2 align="center">ORGANIZACIÓN Y ROLES DEL EQUIPO</h2>

- **Jefe de proyecto**: Andrea Michaela Sandu y Marc Liang Perarnau
- **Programador**: Marc Liang Perarnau
- **Administrador de bases de datos**: Andrea Michaela Sandu
- **Desarrollador web**: Marc Liang Perarnau / Andrea Michaela Sandu
- **Maquetador**: Andrea Michaela Sandu

<h2 align="center">TECNOLOGÍAS UTILIZADAS (lenguajes, frameworks, sistemas, software...)</h2>

- **Frontend** (apariencia, interactividad de la página web):  
  HTML (estructura), CSS (diseño + colores), JavaScript (interactividad, formularios, animaciones)
- **Backend** (bases de datos, procesamiento de los datos, validación de usuarios…):  
  PHP, Mysql
- **Herramientas**:  
  Visual Studio Code (donde escribiremos todo el código)  
  VirtualBox (Linux - servidor)

<h2 align="center">ARQUITECTURA DEL SISTEMA</h2>

La arquitectura será cliente-servidor, de manera que el cliente es el que solicita información, y el servidor es el sistema que responde con datos y el que almacena toda la información.

- **Cliente**: Parte del frontend, esta es la interfaz que verán los usuarios y con la que interactuarán. Se trabaja con HTML, CSS, JavaScript.
- **Servidor**: Parte del backend, esta parte procesa lo que el cliente solicita, y se comunica con la base de datos para obtener la información. Se trabaja con PostgreSQL y se envían correos mediante Postfix.


<h2 align="center">FUNCIONALIDADES DE LA WEB</h2>

- **Registro de usuarios y vehículos**
  - Los propietarios podrán crear una cuenta en la plataforma y registrar sus vehículos proporcionando los datos más        importantes, así como la matrícula, marca, modelo, etc.

- **Notificación de los incidentes**
  - En caso de un problema con algún vehículo registrado en la plataforma, cualquier persona podrá buscar la matrícula     del coche y notificar al propietario mediante un mensaje. Los mensajes se pueden enviar por correo electrónico o SMS.

- **Envío rápido de mensajes**
  - La plataforma es rápida para que los incidentes se puedan resolver en menos de un minuto, de modo que se previenen     más conflictos. El mensaje le llegará inmediatamente al propietario.

- **Interfaz sencilla**
  - La página web está diseñada para que se 	pueda interactuar fácilmente con el sistema y sea accesible para             cualquier tipo de usuario. Gracias a la interfaz sencilla para cualquier dispositivo, los usuarios interactuarán       de manera rápida y sin complicaciones.
    
- **Gestión de vehículos**
  - Los propietarios pueden administrar la información de sus vehículos dentro de la cuenta personal, con la opción de     añadir, eliminar o modificar los detalles según sea necesario y manteniendo la información actualizada.

- **Gestión de incidencias**
  - Los propietarios podrán visualizar los mensajes que han recibido sobre sus vehículos. 

- **Permisos de administración**
  - Los administradores de la plataforma tendrán acceso a todas las funciones, así como la gestión de los usuarios, la      verificación de los incidentes, información de los vehículos, etc. Gracias a esta función se podrá mantener la          plataforma operativa y segura.
  
- **Detalle de tareas**
  - Desarrollar la parte lógica del backend con todas las funcionalidades.
  - Diseñar y gestionar la base de datos.
  - Desarrollar el backend de la plataforma con HTML, CSS, JavaScript y PHP. 
  - Diseño responsive.
  - Implementar formularios de registro, notificaciones de incidentes, gestión de usuarios, vehículos e incidentes.
  - Implementar sistemas de notificación, como correo electrónico y SMS.
  - Conectar la plataforma con la base de datos para el registro de los usuarios y vehículos.

- **Planificación del proyecto**

![image](https://github.com/user-attachments/assets/50f7b046-75d7-4a63-ba6c-45fcf82daf43)



![image](https://github.com/user-attachments/assets/fa75a8c6-b9fa-422c-95ff-a22898a93870)


- **Diagrama de base de datos (puede ser relacional o E-R)**
  
![image](https://github.com/user-attachments/assets/dce5c5fb-4982-4c33-9799-59dadc67438c)


Como se puede observar en la imagen, disponemos de tres tablas dentro de la base de datos de CarConnect. 
  - Los **usuarios** contienen información como el nombre, apellidos, email, teléfono, contraseña y foto del usuario.
  - Los **vehículos** contienen información como la matrícula, la marca, el modelo, imagen de vehículo y la fecha de       registro.
  - Los **mensajes** contienen información como el texto y la fecha de entrega.


Todas las relaciones son 1:N. Estas relaciones las obtenemos de las siguientes conclusiones:
  - Un vehículo puede tener más de un mensaje pero un mensaje no puede tener más de un vehículo.
  - Un usuario puede tener más de un vehículo pero un vehículo no puede tener más de un usuario.


La base de datos se crea de la siguiente manera:

![image](https://github.com/user-attachments/assets/9239d914-7cb7-4888-a5aa-2b21b0542edd)

![image](https://github.com/user-attachments/assets/428311fd-ce7f-49ef-aa50-8d1e638a0470)

![image](https://github.com/user-attachments/assets/77d88040-98aa-4a6d-bfeb-c3e98a21f30e)

![image](https://github.com/user-attachments/assets/1c629d2a-fbb5-41c7-8e85-7188fb1b7ce8)

![image](https://github.com/user-attachments/assets/a2054fdf-2eee-4103-a352-ca93e94daa9e)


<h2 align="center">REFERENCIAS (bibliografía y webgrafía)</h2>

- [Mark Drake, Mayo 19 de 2020, *Como instalar y utilizar PostgreSQL en Ubuntu 20.04*, DigitalOcean](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-postgresql-on-ubuntu-20-04-es)
- [Hanif Jetha & Mark Drake, Julio 16 de 2020, *Cómo instalar y utilizar Postfix en Ubuntu 20.04*, DigitalOcean](https://www.digitalocean.com/community/tutorials/how-to-install-and-configure-postfix-on-ubuntu-20-04-es)
- [Xema Aceituno, *Manual de comandos para MySQL*](https://www.cartagena99.com/recursos/alumnos/apuntes/210927124637-Manual%20MySQL.pdf)
- [Jab & Ester Torres, 2015 - 2019, *HTML5 y CSS3*, HTML6.es](https://www.html6.es/)
