create Table if not exists usuaris(
    email VARCHAR(100) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido1  VARCHAR(100) NOT NULL,
    apellido2  VARCHAR(100) NULL,
    telefono VARCHAR(10) NOT NULL,
    contrasena VARCHAR(27) NOT NULL,
    fecha timestamp default current_timestamp,
    img  VARCHAR(100) NOT NULL
);
