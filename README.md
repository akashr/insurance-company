

# Insurance Company
---
by: Abrar Sheikh & Akash Rungta

Release: Developer Version  
Version: 1.1  
Date: November 15 2010


#### AIM
Create a Insurance Company database management system through a front end , perform smart query on database with multiple functionality 

#### DETAILS  
The project contains following components:
Database : A Backend database running on mysqli .It contains the tables used to store datas and retrieve information.
Frontend : A html frontend using php to link to the database, tables and various components like images,docs will be accessed through a front end html page which is linked through database.
Mobile application : A mobile application developed on Java platform which can also access our database to perform various queries and retrieve information.

#### Synopsis
Database is acceses by using phpmyadmin. We are using mysqli for project. 
Apache HTTP Server  is used  to host our website. It’s a web server software .
PHP : Hypertext Preprocessor is a widely used, general-purpose scripting language that is designed for web development to produce dynamic web pages  . It is used in our project to produce all contents. 
Phone Application details.
* This application runs on J2ME(java to micro edition) platform of java.
* This feature is used by the customers to have an update on their current policy status.
* Customer needs to have a account with the company to access his policy updates and detais.
* He is asked to authenticate himself first by enetering his user id and password, and only then is he allowed to gain access to the critical information.
* Customer can access his account information irrespective of the cell phone he or she owns.
* There are two phase in overall running of this application.
* One login phase
* Second the utilization phase.

#### Software Platform

PHP Application
WAMP(windows, apache, mysqli, php)  package whose principal components of the are: Apache, MySQL .It runs on Windows Operating system. WAMP build this application.

- Apache 2.2.11
- MySQL 5.1.36
- PHP 5.3.0 
- External classes used
    - Class.PHPmailer
    - Class.HTMLpurifier
- phpMyAdmin is an open source tool written in PHP intended to handle the administration of MySQL over the World Wide Web. It can perform various tasks such as creating, modifying or deleting databases, tables, fields or rows; executing SQL statements; or managing users and permissions.

##### Web designing

- HTML : Hyper Text Markup Language .It uses markup tags which is used to describe web pages.
- CSS : Cascading Style Sheets.Styles define how to display HTML elements.Styles are normally stored in Style Sheets
- Hand made template designe for body, menues, sidebars, header and footers.
- Spry Ajax framework : To create dropdown menus , and other website features.
- Adobe Dreamvewer CS5 was used for application workspace.

###### Basic Configuration 

```
Mysqli : engine=innodb : to let update and deletion possible
Username : root
Password : ” ”
```

#### Motto
Our main motto of our were :
* To create a minimalist design for our webpage.
* To create a user friendly interface with no clutter , and inessential on the main interface.
* Easy navigational menu.
* To make our project as application rich as possible.
* To maintain our project connectivity through various modes – like handheld device app.
* Easy and self-descriptive pages.

There are three sets of users: Officers , Agents and Customers. Each of them have following functionality.

###### Officier
* Admin Is the top level  user  of the organization.
* He has complete access to the database and all the customer  and agent records.
* He can create new customer and provide them their appropriate customer ID.
* He can create new agent by specify and provide them their appropriate agent ID.
* He has a right to create new policies.
    - Here is has two path to choose from.
    - One by selecting the agent an then appropriately filling out the form for that agent.
    - Another way is the select the customer from the list and then filling out the form for that customer by precisely assigning a agent to his.
    - Both ways work perfectly the symmetric and are identical in end result action.

###### Agent 
* See his list of customers.
* View details of each customer along with the current policies which is hold under that respective agent.
* Can see the details of policies of his customers along with the renewal date and past payment records.
* Has a right to dispatch policy create by the admin by setting the next premium and its renewal date.
* Has a right to update the policy status of each customers policy.
    - Pending
    - Paid
    - Scrap
* Has a right to extend a policy which has been paid by the customer and extend it to next specified premium date along with new premium.
* Has check the claims made by his customer s on their policies.
* Agent has the right to part claims made by customer; he can either dispatch it with appropriate amount or can discard it.
* Agent has a unique application of sending intimation mails to his customers depending on their upcoming renewal dates.
* An appropriate mail is send to the customer ID along with all the policy details his premium and renewal date.

###### Customer
* Has a right to check all his policies which gives a detailed explanation about his past history.
* He can also see the agent under whom the policy was taken along with his details.
* Customer is provided with agent contact details and permissible personal details, so thathe can contact is agent at time of need.
* He is provided with a detailed view of the policy he select with exhaustive explanation and user friendly appropriate display.
* Customer has a privilege to claim on any of his policy which he has taken under the company.
* Customer is required to select his current available policies from the list of dropdown.
* Now detpending on the type on policy he own the application forwards him to appropriate registration page.
* Here he is required to fill in the details of the claim along with his incurred damage amount.
* His form filled by customer is cross verified by the agent and it is upto the his agent to decide what to do next.
* Customer can also see his list of claims in an orderly manner so that he is updated about is current status for the claims he has made.
* Even at this point the customer can see full description on the agent details and corresponding policy number.


##### Session management
* There are three kinds of user
    - Admin
    - Agent
    - Customer
* For each type of user sessions are maintained in the server application.
* It stores the id and the name of the respective user.
* This session corresponding to each user is secure and difficult to be tampered to learned users.
* Passwords are stored in a hashed manner in the database so that it is not visible to any level of users who have access to the database
* This password hashing technique used is sh1 which is a 40bit encryption and is a one way hashing algorithm i.e it can never be backtracked.
Phone Application details.
* There are two phase in overall running of this application.
* One login phase
* Second the utilization phase.

##### Login phase
* The user login in handled by making a request to the url  http://localhost/ins_website/cust.php
* Here the username and password and provided as a post action to the page.
* If the user is valid the php application redirects him to the home page which signifies that the login has been successful.
* Otherwise If he is directed to the same page then to login has been unsuccessfull.
* Login is handled to our php application.
* This illustrates a perfect example to issuing post action in java application to a remote php application.

##### Utilization phase
* Here the user is provided with a set of utilities that he can issue on the account.
* These as of now includes 
    - Checking for policy renewal date.
    - And its corresponding premium.
* In this case the user is required to enter the policy number on submitting this the policy number is forwarded to a servlet running on the server at http://localhost:8084/policy_erv?policyno=
* This servlet retrieves this via a get request.


The Officier tree directory containing various php pages :
* Sidebar, topbar is responsible for respective views
* Includes contain constans, connection ,functions file which is included in all the php pages for error checking and session management.
* Make_policy subdirectory contains further fields of updating policies.
* Menu.php display top dropdown menu using Spry Ajax framework.


#### Notes

* This project is a 2 tire application. 
* The database is stored in a remote computer (say 172.16.16.2) and any request made by the browser is made to the web server (say 172.16.16.1), which is running on apache.
* Now the web server fetches the data from the database server and responds to the client with appropriate HTTP response in context to its HTTP request.


#### Summary

* Project can be applicable for companies with various kind of users with different kind of access to databases.
* It offers wide functionality to both customers as well agents .
* Email integration i.e intimation to customers in case of updates and renewal of policy.
* A minimalist design for our webpage and a user friendly interface with no clutter , and inessential on the main interface.
* Easy navigational menu for assistance to customers.
* To make our project as application rich as possible.
*  Our project connects through various modes – like handheld device app.
* Project provides various news updates by officers , and downloadable documents.


#### Refrences
* W3schools.com
* Wikipedia.org
* Php.in
* Mysql.com
* Database Systems, Elmasri Navathe

---
#### CONTACT
abrar2002as@gmail.com  
akash.rngt@gmail.com  

copyright Abrar and Akash