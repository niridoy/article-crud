

## Install Instruction
- git init
- git remote add origin https://github.com/niridoy/article-crud.git
- git pull origin main 
- cp .env.example .env 
- update database configraiton to .env file
- php artisan key:generate
- php artisan migrate
- php artisan storage:link
- php artisan serve
-> Go to http://127.0.0.1:8000/
