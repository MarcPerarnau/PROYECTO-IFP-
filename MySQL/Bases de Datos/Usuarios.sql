create Table if not exists usuaris(
    email VARCHAR(100) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    telefono VARCHAR(10) NOT NULL,
    contrasena VARCHAR(27) NOT NULL
);
