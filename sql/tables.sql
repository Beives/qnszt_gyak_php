CREATE TABLE team_members(
    id INT NOT NULL,
    name VARCHAR(250) NOT NULL,
    position VARCHAR(250) NOT NULL,
    bio VARCHAR(250) NOT NULL,
    img BLOB NOT NULL,

    CONSTRAINT PK_team_members PRIMARY KEY(id)
);

CREATE TABLE menu_items(
    id INT NOT NULL,
    title VARCHAR(250) NOT NULL,
    price INT NOT NULL,
    blurb VARCHAR(250) NOT NULL,
    drink VARCHAR(250) NOT NULL,

    CONSTRAINT PK_menu_items PRIMARY KEY(id)
);

CREATE TABLE admin(
    id INT NOT NULL,
    name VARCHAR(250) NOT NULL,
    password VARCHAR(250) NOT NULL,

    CONSTRAINT PK_admin PRIMARY KEY(id)
);