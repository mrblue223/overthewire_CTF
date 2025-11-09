### SSH / PORT: 
    behemoth.labs.overthewire.org / 2221
### Username and password
    behemoth0:behemoth0

# login to machine
You shouldent need my help for this if your doing behemoth :P

## move to the behemoth directory
        cd /behemoth/
## look at programs
        behemoth0@behemoth:/behemoth$ ls
        behemoth0  behemoth2  behemoth4  behemoth6         behemoth7
        behemoth1  behemoth3  behemoth5  behemoth6_reader
        behemoth0@behemoth:/behemoth$ 
## using ltrace we find the password or using gdb if you want to
## 🕵️ ltrace Output Analysis

| Line | Function Call | Return Value / Input | Description |
| :--- | :--- | :--- | :--- |
| `__libc_start_main(...)` | `__libc_start_main` | N/A | The program's initial startup function. |
| `printf("Password: ")` | `printf` | `= 10` | Prints the **"Password: "** prompt to the console. |
| `__isoc99_scanf(..., 0x804a020Password: blah)` | `__isoc99_scanf` | `= 1` | Reads the user's input, which was **"blah"**. |
| `strlen("OK^GSYBEX^Y")` | `strlen` | `= 11` | Calculates the length of a hardcoded string (11 characters). |
| `strcmp("blah", "eatmyshorts")` | `strcmp` | `= -1` | Compares the user input (**"blah"**) against the correct password (**"eatmyshorts"**). A non-zero result (`-1`) indicates the strings are **not equal**. |
| `puts("Access denied..")` | `puts` | `= 16` | Prints the **"Access denied.."** message due to the password mismatch. |
| `+++ exited (status 0) +++` | N/A | `(status 0)` | The program terminates successfully. |

### 🔑 Conclusion

The critical line is `strcmp("blah", "eatmyshorts")`, which reveals that the **correct password** for the program is **`eatmyshorts`**.

### Rerun only the program and enter the password we found
    password:eatmyshorts

        behemoth0@behemoth:/behemoth$ ./behemoth0 
        Password: eatmyshorts
        Access granted..
        $ whoami
        behemoth1
        $ cat /etc/behemoth_pass/behemoth1
        8YpAQCAuKf
        $ 


        
