# Server  

In this project we are using apache to host the server. This is a *free open-source* software made to build up server. So, unlike AWS or any other services this is free and hence preferred as this project is a free software.  

## Ubuntu
The codes for installing and setting up Apache, PHP, MySQL and phpMyAdmin is shown here.
The codes are written for Linux Environment (Ubuntu 20)

#### Apache 2
**_Write the below codes inside a terminal_**  
Press ```Alt + Ctrl + T``` to open terminal or search for terminal.
Type in the below codes

1.  Lets begin by updating package lists:
    
    ```shell
    sudo apt update
    ```
2.  Now install basic Apache 2 files by typing in the below code:
    
    ```shell
    $ sudo apt install apache2
    ```
3.  To verify if you have installed Apache type
    
    ```shell
    $ sudo systemctl status apache2
    ```  
      
    If you get an output like the one below, then your Apache is running.
    ``` console 
    ● apache2.service - The Apache HTTP Server
         Loaded: loaded (/lib/systemd/system/apache2.service; enabled; vendor pres>
        Active: active (running) since Mon 2021-04-12 00:17:32 IST; 2h 44min ago
          Docs: https://httpd.apache.org/docs/2.4/
        Process: 11972 ExecStart=/usr/sbin/apachectl start (code=exited, status=0/>
      Main PID: 11976 (apache2)
          Tasks: 6 (limit: 4653)
        Memory: 10.0M
        CGroup: /system.slice/apache2.service
                ├─11976 /usr/sbin/apache2 -k start
                ├─11977 /usr/sbin/apache2 -k start
                ├─11978 /usr/sbin/apache2 -k start
                ├─11979 /usr/sbin/apache2 -k start
                ├─11980 /usr/sbin/apache2 -k start
                └─11981 /usr/sbin/apache2 -k start

    Apr 12 00:17:32 sid-web systemd[1]: Starting The Apache HTTP Server...
    Apr 12 00:17:32 sid-web apachectl[11975]: AH00558: apache2: Could not reliably>
    Apr 12 00:17:32 sid-web systemd[1]: Started The Apache HTTP Server.
    ```
4.  To make the websites you make available from the internet, you have to open the ports 80(HTTP) and 443(HTTPS)
    Assuming you have firewall ufw:
    ```shell
    $ sudo ufw allow 'Apache Full'
    ```  
      
    To verify the open ports type:
    ```shell
    $ sudo ufw status
    ```  
      
    Output:
    ```console
    Status: active

    To                         Action      From
    --                         ------      ----
    22/tcp                     ALLOW       Anywhere
    Apache Full                ALLOW       Anywhere
    22/tcp (v6)                ALLOW       Anywhere (v6)
    Apache Full (v6)           ALLOW       Anywhere (v6)
    
    ```  
      
    _If your ufw status is inactive, then activate it by typing ``` $ sudo ufw enable``` and repeat from step 4._ 
    _Check out this link to know more about ufw [ubuntupit](https://www.ubuntupit.com/how-to-configure-firewall-with-ufw-on-ubuntu-linux/)._
      
    
5.  To verify if your Apache is all set type in your device IP address in the browser.

✨**_Hurray!!!! You have successfully set up Apache server_**🎉  
  
  
#### Installing PHP 7.4 with Apache
**If you have installed you can run below codes to install PHP now**

1.  Lets start by updating the repositories and the installing libraries necessary for php and Apache php module to work.  
    ``` shell
        $ sudo apt update
        $ sudo apt install php libapache2-mod-php
    ```  
      
2.  After installing package, restart Apache for PHP module to load:
    ```shell
    $ sudo systemctl restart apache2
    ```
3.   To check if you have installed it type ```php -version``` or  try creating a file ```index.php``` at ```/var/www/html``` directory.  
     Type this inside the file:
     ```php
     <?php
     phpinfo;
     ```
   Save the file. Open the browser and enter ```http://your-ip/info.php```.
    _(Do substitute your server ip address in the link above)_
    
   If you see this output, CHEERS 🍻 You have successfully installed php. ✨
   Output:
   ![image](https://user-images.githubusercontent.com/47484513/114323918-14444800-9b45-11eb-80b2-57fbbd68e506.png)


