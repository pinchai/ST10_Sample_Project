```
1. Project Planning
+ Project Name: K2 Computer(B2C)
+ List core features
- product catalog
- cart
- checkout
- simple payment
- notification to telegram channel
- user registration
- track order processes
- admin panel
+ target users and competitors.
- target users: student
- competitors: cc computer

2. Requirement Analysis
+ Create feature list
- product list
- view product details
- search product (by category, tag)
- cart
- checkout
- simple payment
- notification to telegram channel
- user registration
- track order processes
- admin panel
+ Decide tech stack
- FrontEnd: HTML, CSS, JS, Bootstrap, VueJS
- BackEnd: Laravel version 12
- Database: Postgresql v17
- Hosting: ShareHosting
+ Prepare initial wireframes.

3. Database Design
+ table branch
- id (pk)
- name (varchar)*
- phone (varchar)*
- logo(varchar)*
- remark(varchar)
+ table users
- id (pk)
- name (varchar)*
- email (varchar)*
- phone (varchar)
- password (varchar)*
- type (varchar)
+ table category
- id (pk)
- name (varchar)*
- order (int) - 0
+ table tag
- id (pk)
- name (varchar)*
- order (int) - 0
    + table brand
- id (pk)
- name (varchar)*
- order (int) - 0
- logo (varchar)
+ table product
- id (pk)
- name (varchar)*
- old_price (decimal 10, 2)
- new_price (decimal 10, 2)
- cateogory_id (fk)*
- tag_id (fk)
- branch_id (fk)*
- image (varchar)
- remark (varchar)
+ table product spec
- id (pk)
- product_id (fk)*
- key (varchar)*
- value (varchar)*
- color (varchar)
+ table cart
- id(pk)
- user_id (fk)
- product_id (fk)
- qty (int)
+ table checkout
- id(pk)
- checkout_datetime
- total(decimal 10, 2)
- paid(10, 2)
- currency (usd, khr)
- payment_ref (json string)
```
# ST10_Sample_Project
