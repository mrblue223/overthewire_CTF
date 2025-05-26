## Name: Natas Level 6 → Level 7

password:username ->
natas7:bmg8SvU1LizuWjx3y7xkNERkHxGre0GS  

## The trick
When you view the source code of Natas 6, you'll see a PHP include statement that pulls in a file: include "includes/secret.inc";. This means the application is including content from another file into the current page.

The vulnerability arises because the secret.inc file is directly accessible via the web server. By navigating your browser (or using curl) directly to 

## Vulnarability:  Local File Inclusion (LFI) & information disclosure.

First we get a look at the web page with the source code:



## Mitigation: 


