create schema `eshopper`;

use `eshopper`;

create table category(
	Id int not null auto_increment,
    Name varchar(100) not null,
    Status boolean not null,
    Register_Date timestamp default current_timestamp not null,
    Modified_Date timestamp on update current_timestamp,
    
    primary key (Id)
);

create table product(
	Id int not null auto_increment,
    Name varchar(100) not null,
    Description varchar(2000) not null,
    Price decimal(10,2) not null,
    Currency varchar(3) not null,
	Category_Id int not null,
    Status boolean not null,
    Register_Date timestamp default current_timestamp not null,
    Modified_Date timestamp on update current_timestamp,
    
    primary key(Id),
    foreign key (Category_Id) references category (Id)
);

create table user(
	Id int not null auto_increment,
    First_Name varchar(100) not null,
    Last_Name varchar(100) not null,
	Email varchar(200) not null,
    Password varchar(255) not null,
    Gender char not null,
    Birthdate date not null,
    Admin boolean not null,
    Status boolean not null,
    Register_Date timestamp default current_timestamp not null,
    Modified_Date timestamp on update current_timestamp,
    
    primary key (Id)
);

create table image(
	Id int not null auto_increment,
    File_Name varchar(200) not null,
    File_Type varchar(100) not null,
    File_Size varchar(100) not null,
    File_Path varchar(200) not null,
    Product_Id int not null,
    Thumbnail boolean not null,
    Status boolean not null,
    Register_Date timestamp default current_timestamp not null,
    Modified_Date timestamp on update current_timestamp,
    
    primary key (Id),
    foreign key (Product_Id) references product (Id)
);

ALTER DATABASE eshopper CHARACTER SET utf8mb4 COLLATE
utf8mb4_unicode_ci;