CREATE TABLE users (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    fullnames VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    location VARCHAR(100) NOT NULL,
    user_type VARCHAR(30) NOT NULL,
    password CHAR(128) NOT NULL,
    code INT(10) NULL,
    status VARCHAR(100) NOT NULL
);
create table tenders(
section_name varchar(255) not null, 
tender_id int(10) primary key, 
city varchar(255) not null, 
description varchar(255) not null, 
tender_image varchar(100) not null, 
tender_document varchar(100) not null, 
start_date datetime not null,
end_date  datetime not null,csignup
price int(10) not null, 
date_duration varchar(10)
);
create table bid(
id int(10) primary key auto_increment,
tender_id int(10) not null,
user_id int(10) not null,
email varchar(100) not null,
quote  int(10) not null,
description varchar(100) not null,
status varchar(30) 
);
