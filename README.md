# Sticky notes

- Install ```PHP```
- Install ```node.js```
- Install ```web server``` for example ```laragon``` or ```xampp```
- uncomment ```extension=pdo_mysql``` line in ```php.ini``` file in your web server application.

run:<br>
```npm install``` command to install all dependencies from ```package.json```
<br>
<br>
After all dependencies are installed download stable version of JqueryUI (<strong>version 1.12.1</strong>): <a href="https://jqueryui.com/download/all/">link</a>
<br><strong>Rename</strong> it as ```jqueryUI``` for better usage and put it to the root like so:
<br>

![stick](https://user-images.githubusercontent.com/41372194/137268733-7d1db3ec-dd30-413d-b6d4-3b4e7b332b1b.PNG)

<br>

To set up your DB and tables for it you have two options:
1) run following command ```php Seeds\run_DB.php``` in your terminal which will automatically create DB (with name ```stickers```) and 2 tables (```users & activities```) in your <i>localhost</i> and that's all.

2) Manually crete DB inside your localhost and use ```2do_projekt.sql``` file to generate tables inside your localhost. Next you have to edit credentials (<i>host, dbname, username, password and port</i>) in constructor in ```classes\DB.php``` according your localhost and DB. ![db](https://user-images.githubusercontent.com/41372194/139012078-d65eda0c-b636-4e33-bfd0-8b753c940a1b.PNG)

```[Optional]```<br>
To use some test data run following command: ```php Seeds\run_Seeds.php```. It will generate 6 users (every user has same password ```test123```) and their activities.
<br>

[![My GitHub Language Stats](https://github-readme-stats.vercel.app/api/top-langs/?username=Bravcoveoko&langs_count=8&theme=tokyonight)]()
