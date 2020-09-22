USE northwind;
CREATE USER "User_Sales"@"localhost" IDENTIFIED WITH mysql_native_password BY 'password';
GRANT SELECT ON northwind.orders TO "User_Sales" @"localhost";
GRANT SELECT ON northwind.customers TO "User_Sales" @"localhost";

CREATE USER "User_HR"@"localhost" IDENTIFIED WITH mysql_native_password BY 'password';
GRANT SELECT ON northwind.employees TO "User_HR" @"localhost";

CREATE USER "User_CEO"@"localhost" IDENTIFIED WITH mysql_native_password BY 'password';
GRANT SELECT ON northwind.Orders TO "User_CEO" @"localhost";
GRANT SELECT ON northwind.Customers TO "User_CEO"  @"localhost";
GRANT SELECT ON northwind.employees TO "User_CEO"  @"localhost";

-- below code doesn't work
-- CREATE ROLE "HRRole"@"localhost";
-- CREATE ROLE "SalesRole"@"localhost";
-- CREATE ROLE "CEORole"@"localhost";
-- GRANT "CEORole" to "User_CEO"@"localhost";
-- GRANT SalesRole to "User_Sales"@"localhost";
-- GRANT "HRRole" to "User_HR"@"localhost";
-- GRANT SELECT ON northwind.orders TO "SalesRole" @"localhost";
-- GRANT SELECT ON northwind.custoemrs TO "SalesRole" @"localhost";
-- GRANT SELECT ON northwind.Orders TO CEORole @"localhost";
-- GRANT SELECT ON northwind.Customers TO CEORole @"localhost";
-- GRANT SELECT ON northwind.employees TO CEORole @"localhost";
-- GRANT "CEORole" to "User_CEO"@"localhost";