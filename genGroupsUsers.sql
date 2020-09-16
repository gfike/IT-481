CREATE ROLE "SalesRole";
CREATE ROLE "HRRole";
CREATE ROLE "CEORole";

GRANT SELECT ON orders TO "SalesRole";
GRANT SELECT ON custoemrs TO "SalesRole";
GRANT SELECT ON employees TO "HRRole" ;
GRANT SELECT ON Orders TO "CEORole" ;
GRANT SELECT ON Customers TO "CEORole" ;
GRANT SELECT ON employees TO "CEORole" ;

CREATE USER "User_CEO";
CREATE USER "User_HR";
CREATE USER "User_Sales";

alter user User_CEO IDENTIFIED BY "password";
alter user User_HR IDENTIFIED BY "password";
alter user User_Sales IDENTIFIED BY "password";

GRANT CEORole to User_CEO;
GRANT HRRole to User_HR;
GRANT SalesRole to User_Sales;

-- https://www.tutorialspoint.com/error-1396-hy000-operation-create-user-failed-for-root-localhost#:~:text=in%20JavaScript%20work%3F-,ERROR%201396%20(HY000)%3A%20Operation%20CREATE%20USER%20failed%20for,root'%40'localhost'%3F&text=In%20the%20system%2C%20the%20root,result%20in%20the%20ERROR%201396.https://www.tutorialspoint.com/error-1396-hy000-operation-create-user-failed-for-root-localhost#:~:text=in%20JavaScript%20work%3F-,ERROR%201396%20(HY000)%3A%20Operation%20CREATE%20USER%20failed%20for,root'%40'localhost'%3F&text=In%20the%20system%2C%20the%20root,result%20in%20the%20ERROR%201396.