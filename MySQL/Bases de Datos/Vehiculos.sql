CREATE Table if not exists vehiculos(
    matricula VARCHAR(10) PRIMARY KEY,
    marca VARCHAR(20) NOT NULL,
    modelo VARCHAR(20) NOT NULL,
    color VARCHAR(10) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    correo VARCHAR(100) NOT NULL, 
    img  VARCHAR(100) NOT NULL
);
