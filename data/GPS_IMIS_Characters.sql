-- -----------------------------------------------------
-- Create Users for 'GPS_IMIS'
-- -----------------------------------------------------


--  All User's Default Password is 'password'

USE `GPS_IMIS`;

INSERT INTO `users` (firstName, lastName, username, dob, sex, contact, address, password, position)
VALUES ('Tony', 'Stark', "Iron Man", '1990-09-09', 'Male', '592-000-0000', "Lot Z Advance Street, Georgetown, Guyana", '$2y$10$NDM89nx3Eij.EgvofR9J6.LLRQgv3Dsbh7cjmPn4nnWqnWrm4Hczq', 'Administrator'),
('Jane', 'Smith', "Power", '1990-09-09', 'Female', '592-000-0000', "Lot A Fast Lane, Georgetown, Guyana", '$2y$10$s4OLnrdZ/iPCu.TsST9fOOuut1CPBPxgS.NnLBwjvytQ48y5G33.m', 'Departments'),
('James', 'Bond', "Mr. Bond", '1990-09-09', 'Male', '592-000-0000', "Lot A Slow Lane, Georgetown, Guyana", '$2y$10$HC1QbiellE/j.JB3BDUswOqjLDkpu.Lx1zILSqrpovFrBoSugeSmi', 'Reception'),
('Dick', 'Grayson', "Robin", '1990-09-09', 'Male', '592-000-0000', "Lot B Fast Avenue, Georgetown, Guyana", '$2y$10$9p1UdllLybGrBIpRV9r.5eMOVk2rcNjguR.jEH4FoXoHW7UDMgYhO', "Ministry Personnel"),
('Bruce', 'Wayne', "Batman", '1990-09-09', 'Male', '592-000-0000', "Lot A Slow Avenue, Georgetown, Guyana", '$2y$10$kviv7GaGoo8R3gB69J6S6utdTXW5fYECc2TiLskT7WXyQWz5WP8mm', "Service Directorate"),
('Peter', 'Parker', "Spiderman", '1990-09-09', 'Male', '592-000-0000', "Lot B Fast Lane, Georgetown, Guyana", '$2y$10$FsrLENo7h1hQDSsrE0rut.35KvT8DKXFzhCTabgMYZRC8jzl1H2Au',"Civilian Directorate");
