set client_encoding = 'UTF8';

create table login (
  id serial primary key,
  idname varchar(30) not null,
  pass varchar(30) not null
);

insert into login(idname, pass) values
  ('shimizu', 'p'),
  ('yamada', 'yamada');
