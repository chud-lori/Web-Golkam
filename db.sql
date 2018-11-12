drop database golkam;
create database golkam;
use golkam;

create table users(
	id_user int(100) auto_increment,
	name varchar(255),
	username varchar(100) unique,
	password varchar(100),
	role char(7) default 'member',
	constraint pkuser primary key(id_user)
);

create table contents(
	id_content int(100) auto_increment,
	title varchar(255),
	body text,
	image varchar(20),
	id_user int(100),
	constraint pkcontent primary key(id_content),
	constraint fkcontentuser foreign key(id_user) references users(id_user) on delete cascade on update cascade
);

create table lessons(
	id_lesson int(100) auto_increment,
	lesson_name varchar(255),
	lesson_desc text,
	constraint pklesson primary key(id_lesson)
);


create table learn(
	id_user int(100),
	id_lesson int(100),
	constraint pklearn primary key(id_user, id_lesson),
	constraint fklearnuser foreign key(id_user) references users(id_user) on delete cascade on update cascade,
	constraint fklearnlesson foreign key(id_lesson) references lessons(id_lesson) on delete cascade on update cascade
);
