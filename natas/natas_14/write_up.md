## Name: Natas Level 14 → Level 15

password:username ->
natas15:SdqIqBsFcz3yotlNYErZSZwblkm0lrvx

## The Trick: 

Natas 14 demonstrates a classic SQL Injection vulnerability where a web application directly incorporates user input into an SQL query without proper sanitization. This allows an attacker to inject malicious SQL code. The injected code then manipulates the original query, often causing the database to return all records or bypass authentication, highlighting the critical need for developers to use parameterized queries or prepared statements to prevent user input from being interpreted as executable code.

## Vulnarability: SQL injection

The source code

![Alt text for the image](source_code_13.png)

The login page

![Alt text for the image](source_code_13.png)

Our payload, i found 3 SQL injections that work il put them as natas14.txt.

![Alt text for the image](source_code_13.png)

The password!

![Alt text for the image](source_code_13.png)

## Mitigation: 


