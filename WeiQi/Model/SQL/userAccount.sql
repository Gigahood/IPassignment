/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Kuek Yong Boon

 */

# Privileges for `weiqi_someone`@`%`

# Privileges for `weiqi_admin`@`localhost`

GRANT ALL PRIVILEGES ON *.* TO 'weiqi_admin'@'localhost' IDENTIFIED BY PASSWORD '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9' WITH GRANT OPTION;


# Privileges for `weiqi_guest`@`localhost`

GRANT SELECT, INSERT ON *.* TO 'weiqi_guest'@'localhost' IDENTIFIED BY PASSWORD '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9';


# Privileges for `weiqi_staff`@`localhost`

GRANT SELECT, INSERT, UPDATE, DELETE ON *.* TO 'weiqi_staff'@'localhost' IDENTIFIED BY PASSWORD '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9';


# Privileges for `weiqi_student`@`localhost`

GRANT SELECT, UPDATE ON *.* TO 'weiqi_student'@'localhost' IDENTIFIED BY PASSWORD '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9';