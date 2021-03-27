-- สร้างฐานข้อมูล 
-- 1.save docker-compose.yml ใน เครื่อง
-- 2.cd เข้าไปในโฟลเดอร์ที่เก็บไฟล์นี้
-- 3.ใช้คำสั่ง docker-compose up -d ใน command prompt
-- 4.เข้าไปใน phpmyadmin ด้วย http://localhost:8001/ 
-- 5. สร้างฐานข้อมูล ชื่อ Blog 



--------CREATE TABLE

CREATE TABLE Category(
  category_id INT AUTO_INCREMENT NOT NULL,
  category VARCHAR(45) NOT NULL,
  PRIMARY KEY (category_id)
) Engine=InnoDB;

CREATE TABLE Blog(
  blog_id INT AUTO_INCREMENT NOT NULL,
  heading VARCHAR(120),
  author_name VARCHAR(45),
  category_id INT,
  article TEXT,
  date TIMESTAMP,
  head_photo MEDIUMBLOB,
  blog_photo MEDIUMBLOB,
  PRIMARY KEY (blog_id),
  FOREIGN KEY(category_id) REFERENCES Category(category_id)
)Engine=InnoDB;




--------INSERT

INSERT INTO Category VALUES('1','ท่องเที่ยว');
INSERT INTO Category VALUES('2','ศิลปะ');
INSERT INTO Category VALUES('3','อาหารและเครื่องดื่ม');

INSERT INTO Blog VALUES('1','เกาะล้าน','เจ้าโลมา','1','เกาะล้าน  ทะเลแสนสวยน้ำใสแห่งพัทยา ที่อยู่ใกล้กรุงเทพเพียง 2 ชั่วโมง',CURRENT_TIMESTAMP,'','');
INSERT INTO Blog VALUES('2','ต้มยำกุ้ง','Baitoey','3','ต้มยำกุ้ง เป็นอาหารประเภทแกง เป็นอาหารคาวที่รับประทานกับข้าวสวย',CURRENT_TIMESTAMP,'','');
