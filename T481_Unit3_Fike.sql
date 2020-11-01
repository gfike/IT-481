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