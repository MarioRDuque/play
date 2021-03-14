--CREATE DATABASE "juego" ENCODING 'UTF8';

CREATE TABLE resultados(
   id serial not null primary key,
   mesa text not null,
   respuesta text not null,
   fecha timestamp not null,
   correcta boolean
);

CREATE TABLE puntajes(
   mesa text not null primary key,
   puntaje text not null
);