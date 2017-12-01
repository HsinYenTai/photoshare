create table activities
(
	id INT,
	created_at DATETIME,
	updated_at DATETIME,
	deleted_at DATETIME,
	name VARCHAR(255),
	owner_id INT
)
;

create table albums
(
	id INTEGER,
	owner_id INT,
	title VARCHAR(255),
	description VARCHAR(255),
	created_at DATETIME,
	updated_at DATETIME,
	deleted_at DATETIME,
	background VARCHAR(255),
	label VARCHAR(255),
	likes INT
)
;

create unique index albums_id_uindex
	on albums (id)
;

create table items
(
	id INTEGER,
	created_at DATETIME,
	updated_at DATETIME,
	deleted_at DATETIME,
	url VARCHAR(255),
	description TEXT,
	owner_id INT,
	album_id INT
)
;

create unique index items_id_uindex
	on items (id)
;

create table users
(
	id INTEGER not null
		primary key
		 autoincrement,
	name VARCHAR(255),
	email VARCHAR(255),
	password VARCHAR(255) not null,
	created_at DATETIME,
	updated_at DATETIME,
	deleted_at DATETIME,
	avatar VARCHAR(255)
)
;

create table watches
(
	id INT,
	watcher_id INT,
	watched_id INT,
	created_at DATETIME,
	updated_at DATETIME,
	deleted_at DATETIME,
	"group" VARCHAR(255)
)
;

