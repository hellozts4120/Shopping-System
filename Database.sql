create database portal;
use portal;
create table Users(
	UserID varchar(11) PRIMARY KEY,
	Passwords varchar(30) ,
	SEX varchar(10),
	AGE int
);

create table Users1(
	UserID varchar(11) PRIMARY KEY,
	Passwords varchar(30) ,
	SEX varchar(10),
	AGE int
);

create table Product(
	ProductID varchar(100) PRIMARY KEY,
	ProductName varchar(100),
	Price float,
    OwnerID varchar(11),
    foreign key(OwnerID)references Users(UserID)
);

create table Account(
	UserID varchar(11) PRIMARY KEY,
    Money float,
    foreign key(UserID)references Users(UserID)
);

create table Admin(
	AdminName varchar(15) PRIMARY KEY,
    AdminPass varchar(15) 
);

create table GuanZhu(
	YourName varchar(11),
    GuanZhuName varchar(11),
    foreign key(YourName)references Users(UserID),
    foreign key(GuanZhuName)references Users(UserID)
);

create table ShouCang(
	UserID varchar(11),
    ProductID varchar(100),
    foreign key(UserID)references Users(UserID)
);

insert into  Users VALUES
('赵日天123','123456','男', 18),
('江蛤蛤','1234567','男',18),
('习奥塞斯库','12345678','女',19),
('Fuckia4120','123456','女',20),
('Guammo','123123123','男',17),
('Zeta001','111111','男',22),
('Joice4141','hellojoy','女',25),
('welcome','12345','男',40),
('Indosi17','helloInod','男',25),
('KillYouAll','123456','男',50),
('American','1234567','女',25);

insert into  Product VALUES
('01','管制刀具',5.5,'习奥塞斯库'),
('02','假币',100,'赵日天123'),
('03','计算机体系课本',150,'江蛤蛤'),
('04','计生用品',6.66,'赵日天123'),
('05','电锯',7.41,'江蛤蛤'),
('06','雷管',100.0,'江蛤蛤'),
('07','数据结构教科书',1500,'Fuckia4120'),
('08','单片机',2600,'welcome'),
('09','四路泰坦显卡',8000,'Joice4141'),
('10','古币',800,'Joice4141'),
('11','纸钱',15,'Zeta001'),
('12','戴尔外星人电脑',9500,'江蛤蛤'),
('13','古惑仔全集',1000,'American'),
('14','人造卫星',25000,'American'),
('15','教科书索引',100,'welcome'),
('16','个底斯堡演讲稿',1000,'Guammo'),
('17','离散数学教科书',50.5,'Zeta001'),
('50','膜法大全',150,'赵日天123');

insert into Account VALUES
('赵日天123',1400.50),
('江蛤蛤',2417.5),
('习奥塞斯库',433.5),
('Fuckia4120',4541.0),
('Guammo',1500),
('Zeta001',45),
('Joice4141',400),
('welcome',2000),
('Indosi17',275),
('KillYouAll',503),
('American',1111);

insert into Admin VALUES
('admin','1234567'),
('adminBackup','1234567');

insert into GuanZhu VALUES
('江蛤蛤','赵日天123'),
('江蛤蛤','Joice4141'),
('江蛤蛤','American'),
('American','Zeta001'),
('American','江蛤蛤');

insert into ShouCang VALUES
('江蛤蛤','04'),
('American','01'),
('American','02'),
('American','09'),
('江蛤蛤','17');