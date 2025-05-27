## Name: Natas Level 11 → Level 12

password:username ->
natas12:yZdkjAYZRd3R7tq7T5kXMjMJlOIkzDeB

## The Trick

Natas11's vulnerability stems from its use of predictable XOR encryption for session cookies, allowing a known-plaintext attack. The website encrypts cookie data (like {"showpassword":"no", "bgcolor":"#ffffff"}) with a consistent XOR key. By knowing both the original plaintext and the encrypted ciphertext from the cookie, an attacker can easily derive the secret XOR key. Once the key is recovered, they can then craft a malicious plaintext (e.g., {"showpassword":"yes", ...}), encrypt it with the retrieved key, and send it back to the server, which will then decrypt and process the forged instruction, revealing the password for the next level.

## Vulnarability: Weak Cryptographic Implementation & Known-Plaintext Attack & Improper Handling of Sensitive Data (Sensitive Data Exposure)

Here is the web page (Hints that its zor encrypted)

![Alt text for the image](natas12_webpage.png)

More details on how to break the encryption here (https://en.wikipedia.org/wiki/XOR_cipher)

First lets look at the source code

![Alt text for the image](natas12_source_code.png)

This PHP code manages user settings like a "show password" option and a background color, storing them securely in a browser cookie. It loads existing preferences, decrypting and decoding them from the cookie, and then applies them, or uses defaults if no cookie exists. If a new valid background color is provided in the web request, it updates the preference and saves the modified (encrypted and encoded) settings back into the cookie.

Using the script "script.php" you can find your xor secret key make your cookie and upload it via your webtools in your browser or with burpsuite. 
This will give us the password for natas12!

![Alt text for the image](natas12_password.png)

## Mitigation: 
To mitigate the Natas11 vulnerability, the primary step is to avoid custom, insecure encryption like XOR for sensitive data in cookies. Instead, leverage PHP's built-in, cryptographically secure session management, which stores session data server-side and only sends a non-guessable session ID to the client via a cookie. Furthermore, always use HTTPS to encrypt all traffic, enable the HttpOnly cookie flag to prevent client-side script access, and utilize the Secure cookie flag to ensure cookies are only sent over HTTPS, significantly reducing the risk of cookie theft and manipulation.


