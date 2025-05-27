
## Name: Natas Level 12 → Level 13

password:username ->
natas13:

## The Trick: 

The core trick in Natas12 is to bypass the web application's assumed file type filtering for uploads. Although the challenge presents an image upload feature, the server-side code likely only checks the file extension of the uploaded file name provided by the user. This means you can upload a PHP file containing a simple webshell, like <?php passthru($_GET['cmd']); ?>, while still manipulating the provided filename to appear as if it has an image extension (e.g., image.php). Once uploaded, you can then directly access this PHP file via its URL on the server and use the cmd GET parameter to execute arbitrary commands, ultimately allowing you to read the password for the next level.

## Vulnarability: file upload with an insecure file extension filter, leading to remote code execution.



![Alt text for the image](Screenshot_2025-05-26_16-56-49.png)

## Mitigation: 
