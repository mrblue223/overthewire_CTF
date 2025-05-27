## Name: Natas Level 12 → Level 13

password:username ->
natas13:trbs5pCjCrkuSknBBKHhaBxq6Wm1j3LC

## The Trick: 

The core trick in Natas12 is to bypass the web application's assumed file type filtering for uploads. Although the challenge presents an image upload feature, the server-side code likely only checks the file extension of the uploaded file name provided by the user. This means you can upload a PHP file containing a simple webshell, like <?php passthru($_GET['cmd']); ?>, while still manipulating the provided filename to appear as if it has an image extension (e.g., image.php). Once uploaded, you can then directly access this PHP file via its URL on the server and use the cmd GET parameter to execute arbitrary commands, ultimately allowing you to read the password for the next level.

## Vulnarability: file upload with an insecure file extension filter, leading to remote code execution.

First lets look at the code

![Alt text for the image](Screensho_2025-05-26_16-56-49.png)

Then lets try to upload our payload to the webserver with burpsuite.

![Alt text for the image](Screensho_2025-05-26_16-56-49.png)

Change the .jpeg -> .php to get our shell.

![Alt text for the image](Screensho_2025-05-26_16-56-49.png)

Lets us ls to list all files in the current directory!

Lets get our password: 

Make sure you put the payload in the url, should look like this = http://natas12.natas.labs.overthewire.org/upload/dyw9rnl8hc.php?cmd=cat%20/etc/natas_webpass/natas13

![Alt text for the image](Screensho_2025-05-26_16-56-49.png)

And we get our password

![Alt text for the image](Screensho_2025-05-26_16-56-49.png)

## Mitigation: 
