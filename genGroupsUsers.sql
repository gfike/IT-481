CREATE ROLE "SalesRole";
CREATE ROLE "HRRole";
CREATE ROLE "CEORole";

GRANT SELECT ON northwind.orders TO "SalesRole" @"localhost";
GRANT SELECT ON northwind.custoemrs TO "SalesRole" @"localhost";
GRANT SELECT ON northwind.employees TO "HRRole" @"localhost";
GRANT SELECT ON northwind.Orders TO "CEORole" @"localhost";
GRANT SELECT ON northwind.Customers TO "CEORole" @"localhost";
GRANT SELECT ON northwind.employees TO "CEORole" @"localhost";

CREATE USER "User_CEO"@"localhost" IDENTIFIED BY "password";
CREATE USER "User_HR"@"localhost" IDENTIFIED BY "password";
CREATE USER "User_Sales"@"localhost" IDENTIFIED BY "password";

-- ALTER USER User_CEO@'localhost' IDENTIFIED BY 'New-Password-Here';
-- alter user User_CEO @ 'localhost' IDENTIFIED BY "password";
-- alter user User_HR IDENTIFIED BY "password";
-- alter user User_Sales IDENTIFIED BY "password";

GRANT "CEORole" to "User_CEO"@"localhost";
GRANT HRRole to User_HR;
GRANT SalesRole to User_Sales;

