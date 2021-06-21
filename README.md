## FBLA-Quiz-Project

My quiz project for FBLA-PBL 2020-2021 (Coding and Programming) Built with the MVC method and somewhat of a OOP coding style.

---
### ⚠️ Heads Up!
<p>This project will no longer be maintained when FBLA-PBL 2020-2021 ends. If you want to use this repo for personal use, everything should be stable and working for PHP 7.0+ . I would not recommend cloning this repo for an event, it could lead to getting disqualified.</p>

---

**Technologies Used:**
- [Atom IDE](https://atom.io/)
- Git
- [XAMPP Server](https://www.apachefriends.org/)
- [PHPmyAdmin](https://www.phpmyadmin.net/)
- jQuery
- GitHub
- [Materialize.css](https://materializecss.com/)
- [Google Material Design Specs](https://material.io/design/guidelines-overview)
- [MVC Method](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller)

**Languages:**
- PHP
- HTML
- JavaScript
- CSS
- MySQL

---

### Why PHP?
<p>Most people may question why I built this application using PHP, rather than C++ or Python. This is because the application can be easily deployed on a web server. Then, a user can easily access it through a URL. Also, many hosting services support PHP.

I built this application using the MVC method, along with a somewhat OOP coding style. The code should look neat and tidy, as well as easy to read.
</p>

---

### Key Features
Thses are some of the key features in our application.

#### Full User Syetem
There is login and register functionality in the application. The login and register proccess are kept safe from brute force attacks, XSS, and SQL injection. All user passwords are hashed with the PHP built in `password_hash()` function. All users can change there profile picture using [Gravatar](https://gravatar.com), which is a profile image API.
<br>
#### Cross-Compatable PWA 
Read more about PWA applications here: [Mozilla Article](https://developer.mozilla.org/en-US/docs/Web/Progressive_web_apps)

Our application provides a PWA app for Android, Iphone, Mac, Windows, and Linux. This lets the user use FBLa quiz on the go.
<br>
#### Security
The application is protected from SQL Injection, brute force attacks, and XSS. To stop brute force attacks, the application uses a time based honeypot to catch bots and prevent them from signing up or logging in.
<br>
#### Database Backup
The application admin can download a full databse backup at anytime through the user dashboard. It might be helpful to add a cron job for backups in the future.
<br>
#### Help Screen
The application provides a basic support screen on the user dashboard to help aid new people.
<br>
#### Install Wizard
To help deploy the apllication quickly, it provides an easy to use install wizard.
<br>
#### Simple & Mobile Ready
The application is designed to be fast and mobile ready, without any over-complicated features or bloat.
<br>
#### Badge System
To promote user engagement the application provides a badge system. The more quizes a user takes, the badge level increases. The badge levels are listed below.
1. Beginner
2. Average
3. Master
4. Ultra knowledge
5. ALL KNOWING

---

### How to deploy for development:

1. Make sure you have Xampp installed: https://www.apachefriends.org/index.html.
2. Once Xampp is done installing open the folder and navigate to xampp-control.exe.
3. Start the Apache module and the MySQL module.
4. Clone this repo into `htdocs` folder using: `https://github.com/Atom345/FBLA-Quiz-Project.git`
5. Visit your website URL to install. (http://localhost/)
6. Fill out the details required by the installer.
7. Once you are finished, you can go to `http://localhost/` and the project will be deployed there.
8. To login to the default account, go to `http://localhost/login` and user the login details below:
<ul>
<li>Email: admin@admin.com</li>
<li>Password: admin</li>
</ul>
