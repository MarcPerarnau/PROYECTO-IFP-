CREATE Table if not exists mensajes(
    id_mensaje int AUTO_INCREMENT PRIMARY KEY,
    texto TEXT not NULL,
    matricula VARCHAR(10) NOT NULL,
    fecha timestamp default current_timestamp
);