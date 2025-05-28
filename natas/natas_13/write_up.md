## Name: Natas Level 13 → Level 14

password:username ->
natas14:z3UYcr4v4uBpeX8f7EZbMHlzK4UR2XtQ

## The Trick: 

Craft a malicious PHP file, that allows for arbitrary command execution.
Add image magic bytes: Prepend the PHP script with the magic bytes of an image format (e.g., \xff\xd8\xff for JPEG). This makes the file look like a valid image to the server's validation.
Upload the crafted file: Upload this "polyglot" file to the server.
Locate the uploaded file: Determine the URL or path where the uploaded file is stored.
Execute commands: Access the uploaded file via its URL and pass commands as a GET parameter (e.g., http://natas13.natas.labs.overthewire.org/upload/your_file.php?cmd=cat+/etc/natas_webpass/natas14). This will execute the PHP code and display the output of the command.


## Vulnarability: File Upload Functionality & Insufficient File Type Validation & Bypass with Magic Bytes (File Signature) & Directory Traversal/Path Disclosure

Lets look at the sourc code shall we :)

![Alt text for the image](the_password_13.png)

First lets craft our pyaload! We add the magic bytes of the jpeg to the .php payload to trick the server into thinking its an image.

![Alt text for the image](the_password_13.png)

With burp suite intercept the payload while you upload it

![Alt text for the image](the_password_13.png)

Change the name of the payload to the original name in my case "image.php".

![Alt text for the image](the_password_13.png)

Upload it to the server and visit the link and voila you have the password. 

![Alt text for the image](the_password_13.png)

## Mitigation: 


