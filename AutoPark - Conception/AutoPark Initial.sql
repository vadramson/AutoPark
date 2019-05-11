/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     12/05/2019 00:46:30                          */
/*==============================================================*/


/*==============================================================*/
/* Table: CarModel                                              */
/*==============================================================*/
create table CarModel
(
   idModel              int not null,
   model                varchar(254),
   year                 int,
   created              datetime,
   updated              datetime,
   mark                 varchar(254),
   status               boolean,
   primary key (idModel)
);

/*==============================================================*/
/* Table: Drivers                                               */
/*==============================================================*/
create table Drivers
(
   idDriver             int not null,
   idUser               int,
   name                 varchar(254),
   availability         boolean,
   licenseType          varchar(254),
   licenseID            varchar(254),
   picture              varchar(254),
   idNumber             varchar(254),
   email                varchar(254),
   phone                varchar(254),
   created              datetime,
   updated              datetime,
   status               boolean,
   primary key (idDriver)
);

/*==============================================================*/
/* Table: Expenditure                                           */
/*==============================================================*/
create table Expenditure
(
   idExpenditure        int not null,
   idVehicle            int not null,
   nature               varchar(254),
   description          varchar(1500),
   cost                 decimal(18,2),
   dateExpenditure      datetime,
   primary key (idExpenditure)
);

/*==============================================================*/
/* Table: Mentainence                                           */
/*==============================================================*/
create table Mentainence
(
   idMaintennce         int not null,
   idVehicle            int not null,
   idUser               int,
   fault                varchar(254),
   garage               varchar(254),
   cost                 decimal(18,2),
   state                varchar(254),
   dateIn               datetime,
   dateOut              datetime,
   primary key (idMaintennce)
);

/*==============================================================*/
/* Table: Rentals                                               */
/*==============================================================*/
create table Rentals
(
   idRental             int not null,
   idUser               int,
   idVehicle            int not null,
   idDriver             int,
   hours                int,
   unitHour             decimal(18,2),
   totalCost            decimal(18,2),
   rentalType           varchar(254),
   matriculation        varchar(254),
   status               varchar(254),
   created              datetime,
   updated              datetime,
   registeredBy         int,
   primary key (idRental)
);

/*==============================================================*/
/* Table: Users                                                 */
/*==============================================================*/
create table Users
(
   idUser               int not null,
   name                 varchar(254),
   username             varchar(254),
   password             varchar(254),
   role                 varchar(254),
   matricule            varchar(254),
   email                varchar(254),
   phone                varchar(254),
   picture              varchar(254),
   status               boolean,
   primary key (idUser)
);

/*==============================================================*/
/* Table: Vehicles                                              */
/*==============================================================*/
create table Vehicles
(
   idVehicle            int not null,
   idModel              int not null,
   matriculation        varchar(254),
   seats                int,
   colour               varchar(254),
   technology           varchar(254),
   availability         boolean,
   simNumber            varchar(254),
   feeWithDriver        decimal(18,2),
   feeWithoutDriver     decimal(18,2),
   created              datetime,
   updated              datetime,
   statut               boolean,
   primary key (idVehicle)
);

alter table Drivers add constraint FK_association1 foreign key (idUser)
      references Users (idUser);

alter table Expenditure add constraint FK_association6 foreign key (idVehicle)
      references Vehicles (idVehicle);

alter table Mentainence add constraint FK_association5 foreign key (idVehicle)
      references Vehicles (idVehicle);

alter table Mentainence add constraint FK_association7 foreign key (idUser)
      references Users (idUser);

alter table Rentals add constraint FK_association3 foreign key (idVehicle)
      references Vehicles (idVehicle);

alter table Rentals add constraint FK_association4 foreign key (idDriver)
      references Drivers (idDriver);

alter table Rentals add constraint FK_association8 foreign key (idUser)
      references Users (idUser);

alter table Vehicles add constraint FK_association2 foreign key (idModel)
      references CarModel (idModel);

