# Sticky notes


- Install Node.js

run:<br>
```npm install``` command to install all dependencies from ```package.json```
<br>
<br>
After all dependencies are installed download stable version of JqueryUI (<strong>version 1.12.1</strong>): <a href="https://jqueryui.com/download/all/">link</a>
<br><strong>Rename</strong> it as ```jqueryUI``` for better usage and put it to the root like so:
<br>

![stick](https://user-images.githubusercontent.com/41372194/137268733-7d1db3ec-dd30-413d-b6d4-3b4e7b332b1b.PNG)

When everything is installed do not forget edit credentials (<i>host, username, password and port</i>) in ```classes\DB.php``` then run following command ```php Seeds\run_DB.php``` in your terminal which will automatically create DB (with name ```stickers```) and 2 tables (```users & activities```) in your <i>localhost</i>

```[Optional]```<br>
To use some test data run following command: ```php Seeds\run_Seeds.php```. It will generate 6 users (every user has same password ```test123```)
<br>

[![My GitHub Language Stats](https://github-readme-stats.vercel.app/api/top-langs/?username=Bravcoveoko&langs_count=8&theme=tokyonight)]()
