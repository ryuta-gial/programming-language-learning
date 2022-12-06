//1-1
CREATE database person_db DEFAULT CHARACTER SET utf8;

//1-2
grant all privileges on person_db. *to person_user@'localhost' identified by 'person_pass'  with grant option;

//1-3
CREATE TABLE person_tb (
  id int not null auto_increment primary key ,
  name varchar(20) not null,
  age int(11) not null ,
  language varchar(20) not null
);

//1-4
 desc  person_tb;

//1-5
INSERT INTO person_tb (
  name ,
  age  ,
  language 
) VALUES
('yamada',19 ,'PHP'),
('suzuki',22 ,'Java'),
('tanaka',18 ,'Rudy'),
('watanabe',25,'C'),
('satou',33,'Perl');

//1-6
select * from person_tb;

//1-7
select * from person_tb where age >= 20;

//1-8
UPDATE person_tb SET id = 23 , language = Python where name = suzuki;
UPDATE `person_tb` SET `age` = '23',`language` = 'Python' WHERE `id` =2;

//1-9
select SUM(age),AVG(age) from person_tb;


//4-1
SELECT 
    cus.customer_name  ,
    ord.order_id ,
    pro.product_name ,
    pro.price,
    detail.product_count ,
    pro.price * detail.product_count AS total
FROM 
    customer_tb cus
JOIN 
    order_tb ord 
ON
    cus.customer_id = ord.customer_id
JOIN 
    order_detail_tb detail
ON 
    ord.order_id = detail.order_id
JOIN
    product_tb pro
on
    detail.product_id = pro.product_id 
ORDER BY
    cus.customer_id ASC;


//4-2
SELECT 
    cus.customer_name  ,
    SUM( pro.price * detail.product_count  ) AS sales
FROM 
    customer_tb cus
JOIN 
    order_tb ord 
ON
    cus.customer_id = ord.customer_id
JOIN 
    order_detail_tb detail
ON 
    ord.order_id = detail.order_id
JOIN
    product_tb pro
ON
   detail.product_id = pro.product_id 
GROUP BY 
 cus.customer_id
ORDER BY 
 sales desc;

