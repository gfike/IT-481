CREATE ROLE "SalesRole"@"localhost";
CREATE ROLE "HRRole"@"localhost";
CREATE ROLE "CEORole"@"localhost";

CREATE USER "User_CEO"@"localhost" IDENTIFIED WITH mysql_native_password BY 'password';
GRANT CEORole to "User_CEO"@"localhost";
CREATE USER "User_HR"@"localhost" IDENTIFIED WITH mysql_native_password BY 'password';
GRANT HRRole to "User_HR"@"localhost";
CREATE USER "User_Sales"@"localhost" IDENTIFIED WITH mysql_native_password BY 'password';
GRANT SalesRole to "User_Sales"@"localhost";

-- ALTER USER User_CEO@'localhost' IDENTIFIED BY 'New-Password-Here';
-- alter user User_CEO @ 'localhost' IDENTIFIED BY "password";
-- alter user User_HR IDENTIFIED BY "password";
-- alter user User_Sales IDENTIFIED BY "password";

-- GRANT SELECT ON northwind.orders TO SalesRole @"localhost";
-- GRANT SELECT ON northwind.custoemrs TO SalesRole @"localhost";
-- GRANT SELECT ON northwind.employees TO HRRole @"localhost";
-- GRANT SELECT ON northwind.Orders TO CEORole @"localhost";
-- GRANT SELECT ON northwind.Customers TO CEORole @"localhost";
-- GRANT SELECT ON northwind.employees TO CEORole @"localhost";