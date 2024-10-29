CREATE Table if not exists mensajes(
    id_mensaje int AUTO_INCREMENT PRIMARY KEY,
    mensaje TEXT not NULL,
    matricula VARCHAR(70) NOT NULL,
    fecha timestamp default current_timestamp
);
