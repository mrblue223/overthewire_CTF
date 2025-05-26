## Name: Natas Level 5 → Level 6

password:username ->
natas6:0RoJwHdSKWFTYR5WuiAewauSuNaBXned

## Vulnarability: 

First we are prompted to a web page saying the following:

![Alt text for the image](natas6.png)

We can intercept the traffic with burpsuite to change some infromation.

![Alt text for the image](natas6_1.png)

Change Cookie loggedin=0 -> Cookie loggedin=1 and forward the traffic.

![Alt text for the image](natas6_2.png)

This will give us the password for natas6.

![Alt text for the image](natas6_3.png)

## Mitigation: 
