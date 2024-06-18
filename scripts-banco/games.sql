create database 'locadora-games';

create table games (
  id int primary key auto_increment,
  nome varchar(255) not null,
  genero varchar(255) not null,
  plataforma varchar(255) not null,
  preco decimal not null,
  imagem varchar(2000) not null
);



insert into games (nome, genero, plataforma, preco, imagem) values ('Mario Bros', 'Classico', 'Nintendo', 20, 'https://supermario-game.com/static/images/gp1-2.jpg');

select * from games;

--executar essas próximas linhas no banco locadora-games
alter table games add column qtd_disponivel int default 0;

create table usuario (
  id int primary key auto_increment,
  nome varchar(255) not null,
  email varchar(255) not null,
  ativo boolean not null default true,
  senha varchar(2000) not null
);

alter table usuario add column tipo varchar(80) default 'CLIENTE';

create table aluguel_game (
  id int primary key auto_increment,
  usuario_id int not null,
  game_id int not null,

  foreign key (usuario_id) references usuario(id),
  foreign key (game_id) references games(id)
);

-- a senha é 123456
insert into usuario (nome, senha, email) values ('admin', '$2y$10$L73Cx2c9fxDwYnE2ylgWGukYcS6K7ZSiiy/JINREYeclX.YIWUaDm', 'admin@email.com');