## Name: Natas Level 8 → Level 9

password:username ->
natas9:ZE1ck82lmdGIoErlhQgWND6j2Wzz6b6t 

## The Trick
When you examine the source code for Natas 8, you'll find a function, encodeSecret, and a predefined $encodedSecret variable. The application expects you to submit the original secret, which it then encodes using encodeSecret and compares to $encodedSecret.

The encodeSecret function performs a series of encoding steps in a specific order:

    base64_encode($secret)
    strrev(...) (string reverse)
    bin2hex(...) (binary to hexadecimal)

The $encodedSecret variable on the server is the result of these three steps applied to the actual secret for Natas 9. To get the password, you need to reverse these encoding steps in the exact opposite order on the provided $encodedSecret.

## Vulnarability: misunderstanding and reversing a multi-stage encoding scheme

First lets take a look at the source code!

![Alt text for the image](natas9.png)

If you check "The Trick" it explains the steps of what the code is doing. Now we will reverse engineer the secret by reversing the processe!

In the natas8 irectory theres the script "script.php", it will decode the secret for us.
You can run this code inside a php sandbox (https://onlinephp.io/).

This will output the secret for us

![Alt text for the image](natas9_1.png)

Then input the secret into the prompt and voila the password for natas9!

![Alt text for the image](natas9_2.png)

## Mitigation: 
To mitigate the Natas 8 vulnerability, which stems from relying on custom, reversible encoding for secrets, the fundamental principle is to never implement your own security-sensitive encoding or encryption algorithms. Instead, always use standard, peer-reviewed cryptographic libraries for tasks like password hashing (employing strong, one-way algorithms like Argon2 or bcrypt) or secure secret storage (keeping sensitive data outside the web root and accessing it via secure server-side mechanisms or dedicated secret management services), thereby avoiding any security by obscurity.
