## Name: Natas Level 16 → Level 17

password:username ->
natas17:EqjHJbo7LFNb8vwhHb9s75hokh5TF0OC

## Vulnarability: command injection through blacklist bypass
Use the script I provided called "natas16.py" to crack the password for natas17

### The source code
![Alt text for the image](sourc_code_natas_16.png)

### The script running
to run the script

    python3 natas16.py
    
![Alt text for the image](password.png)

## Mitigation: 
To effectively mitigate command injection vulnerabilities that bypass blacklists, the most critical step is to shift from a blacklist approach to a whitelist approach. Instead of trying to filter out every potentially malicious input, only explicitly allow inputs that are known to be safe and conform to a strict, predefined format, such as alphanumeric characters for filenames. When external commands absolutely must be executed, always use safe API functions that separate the command from its arguments, preventing the operating system shell from interpreting user-supplied input as executable code. Furthermore, ensure your applications operate with the least possible privileges to minimize the impact if an injection were to occur, and implement robust input validation at all entry points to verify data types, lengths, and character sets.
