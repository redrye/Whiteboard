# Note: The 'if exists' which only works with MySQL 3.22 or later
drop database if exists userdb;
create database userdb;
use userdb;

CREATE TABLE user (
  id INT NOT NULL AUTO_INCREMENT,
  username varchar(20) NOT NULL,
  password varchar(20) NOT NULL DEFAULT 'password',
  PRIMARY KEY (username),
  KEY (password),
  KEY (id)
);

INSERT INTO user VALUES
('900252117', 'boudreauxr2', 'password'),
('900252118', 'aburezeqa2', 'password'),
('900252119', 'martinezl2', 'password'),
('900252120', 'mangumx2', 'password'),
('900252121', 'saeedf2', 'password'),
('600252111', 'changy', 'password'),
('600252112', 'zhangt', 'password');

INSERT INTO user (username) VALUES
("celepcikayo"),
("delavinae"),
("harrisc"),
("linh"),
("nikzada"),
("oberhoffk"),
("shastrid"),
("singhk"),
("soibamb"),
("xul"),
("yuans"),
("zakim");


CREATE TABLE student (
  id INT NOT NULL AUTO_INCREMENT,
  username varchar(20) NOT NULL,
  name_first TEXT,
  name_last TEXT,
  email TEXT,
  FOREIGN KEY (username) REFERENCES user(username),
  PRIMARY KEY (id),
  KEY (username)
);

INSERT INTO student(username) VALUES
("boudreauxr2"),
("saeedf2"),
('aburezeqa2'),
('martinezl2'),
('mangumx2');

CREATE TABLE instructor (
  id INT NOT NULL AUTO_INCREMENT,
  username varchar(20) NOT NULL,
  name_first TEXT,
  name_last TEXT,
  email TEXT,
  FOREIGN KEY (username) REFERENCES user(username),
  PRIMARY KEY (id),
  KEY (username)
);

INSERT INTO instructor(username, name_first, name_last) VALUES
("celepcikayo","Oner","Celepcikay"),
("changy","Yuchou","Chang"),
("delavinae","Ermelinda","Delavina"),
("harrisc","Cyril","Harris"),
("linh","Hong","Lin"),
("nikzada","Ali","Nikzad"),
("oberhoffk","Kenneth","Oberhoff"),
("shastrid","Dvijesh","Shastri"),
("singhk","Kulwant","Singh"),
("soibamb","Benjamin","Soibam"),
("xul","Ling","Xu"),
("yuans","Shengli","Yuan"),
("zakim","Marian","Zaki"),
("zhangt","Ting","Zhang");

CREATE TABLE course(
  name VARCHAR(100) NOT NULL,
  subject VARCHAR (4) NOT NULL,
  number INT NOT NULL,
  PRIMARY KEY(subject, number),
  KEY(name)
  );
  
INSERT INTO course VALUES
('English', 'ENG' ,2301),
('Software Engineering', 'CS', 3420),
('Philosophy', 'Phil' ,1301),
('Operating Systems', 'CS', 4315),
('Internet of Things', 'CS', 4390),
('Programming Language Concepts', 'CS',4303),
('Senior Seminar', 'CS', 4294),
("Intro to Computing w/ Python","CS",1311),
("Intro to CS with Visual Basic","CS",1408),
("Introduction to CS with C++","CS",1410),
("Intro to Computer Organization","CS",2301),
("Digital Logic","CS",2302),
("Data Structures & Algorithms","CS",2410),
("Object-Oriented Programming","CS",3300),
("Data & Information Structures","CS",3304),
("Theory of Computation","CS",3306),
("Computer Network Architecture","CS",3324),
("Network Security","CS",3326),
("Undergraduate Research","CS",3394),
("Web Programming","CS",4300),
("Theory DB & File Structures","CS",4318),
("Statistist. & Machine Learning","CS",4319),
("Field Experience in Comp. Sci.","CS",4380),
("Senior Project","CS",4395),
("Prog. Found. for Data Analytic","CS",5301),
("Information Visualization","CS",6301),
("Predictive Analytics","CS",6302),
("Field Experience","CS",6380),
("Directed Study","CS",6399);


CREATE TABLE class (
  crn int(5) NOT NULL,
  name varchar(50) NOT NULL,
  instructor varchar(50) NOT NULL,
  FOREIGN KEY (name) REFERENCES course(name),
  FOREIGN KEY (instructor) REFERENCES instructor(username),
  PRIMARY KEY (crn),
  key(name)
  
);

INSERT INTO class VALUES 
(20409, 'English', 'changy'),
(23924, 'Software Engineering','changy'),
(21820, 'Software Engineering', 'changy'),
(24015, 'Philosophy', 'changy'),
(21821, 'Operating Systems',  'changy'),
(23920, 'Internet of Things', 'zhangt'),
(23921, 'Programming Language Concepts',  'changy' ),
(21088, 'Senior Seminar',  'changy'),
(15168, "Intro to Computing w/ Python","xul"),
(11470, "Intro to CS with Visual Basic","singhk"),
(11593, "Intro to CS with Visual Basic","harrisc"),
(12272, "Intro to CS with Visual Basic","singhk"),
(11297, "Introduction to CS with C++","oberhoffk"),
(11598, "Introduction to CS with C++","nikzada"),
(12097, "Introduction to CS with C++","singhk"),
(12215, "Introduction to CS with C++","singhk"),
(14600, "Intro to Computer Organization","singhk"),
(14601, "Intro to Computer Organization","singhk"),
(14602, "Digital Logic","oberhoffk"),
(14603, "Digital Logic","harrisc"),
(15413, "Digital Logic","oberhoffk"),
(11542, "Data Structures & Algorithms","shastrid"),
(12967, "Data Structures & Algorithms","harrisc"),
(13670, "Data Structures & Algorithms","harrisc"),
(12273, "Object-Oriented Programming","soibamb"),
(11432, "Data & Information Structures","yuans"),
(12274, "Data & Information Structures","harrisc"),
(11429, "Theory of Computation","soibamb"),
(13671, "Theory of Computation","soibamb"),
(14645, "Software Engineering","changy"),
(15173, "Software Engineering","changy"),
(15174, "Computer Network Architecture","yuans"),
(13726, "Network Security","zakim"),
(15437, "Undergraduate Research","soibamb"),
(11444, "Senior Seminar","linh"),
(13963, "Senior Seminar","shastrid"),
(14605, "Web Programming","zhangt"),
(15472, "Web Programming","zhangt"),
(11442, "Programming Language Concepts","linh"),
(14606, "Programming Language Concepts","linh"),
(11567, "Operating Systems","xul"),
(15186, "Operating Systems","xul"),
(12275, "Theory DB & File Structures","yuans"),
(15187, "Theory DB & File Structures","yuans"),
(13727, "Statistist. & Machine Learning","celepcikayo"),
(15469, "Field Experience in Comp. Sci.","linh"),
(11544, "Senior Project","oberhoffk"),
(14647, "Prog. Found. for Data Analytic","linh"),
(14910, "Prog. Found. for Data Analytic","changy"),
(13422, "Information Visualization","zhangt"),
(15192, "Information Visualization","shastrid"),
(13651, "Predictive Analytics","soibamb"),
(14887, "Field Experience","delavinae"),
(14925, "Directed Study","soibamb"),
(14943, "Directed Study","linh"),
(15477, "Directed Study","changy"),
(15491, "Directed Study","shastrid");




CREATE TABLE register (
  crn int(5) NOT NULL,
  name VARCHAR(50) NOT NULL,
  student varchar(50) NOT NULL,
  FOREIGN KEY (crn) REFERENCES class(crn),
  FOREIGN KEY (name) REFERENCES class(name),
  FOREIGN KEY (student) REFERENCES student(username),
  KEY (crn),
  KEY (student)
);

INSERT INTO register VALUES
(20409, 'English', 'boudreauxr2'),
(23924, 'Software Engineering','aburezeqa2'),
(24015, 'Philosophy', 'martinezl2'),
(21820, 'Internet of Things' ,'mangumx2'),
(23920, 'Internet of Things' ,'saeedf2'),
(23921, 'Operating Systems', 'boudreauxr2'),
(21088, 'Senior Seminar', 'mangumx2'),
(21088, 'Senior Seminar', 'boudreauxr2'),
(21088, 'Senior Seminar', 'aburezeqa2'),
(21088, 'Senior Seminar', 'saeedf2'),
(21088, 'Senior Seminar', 'martinezl2');



CREATE TABLE grades (
  crn INT NOT NULL,
  assignment varchar(50) NOT NULL,
  grade float,
  weight double,
  student varchar(50) NOT NULL,
  FOREIGN KEY (crn) REFERENCES class(crn),
  FOREIGN KEY (student) REFERENCES register (student),
  PRIMARY KEY (crn, assignment, student)
);

INSERT INTO grades VALUES
(20409, 'Exam 1', 75, 0.15,  'boudreauxr2'),
(21088, 'Exam 2', 85, 0.15,  'boudreauxr2'),
(21088, 'Homework', 55, 0.10,  'boudreauxr2'),
(21088, 'Exam 1', 75, 0.15,  'aburezeqa2'),
(21088, 'Exam 2', 90, 0.15,  'aburezeqa2'),
(21088, 'Homework', 90, 0.10,  'aburezeqa2'),
(21088, 'Exam 1', 99, 0.15,  'martinezl2'),
(21088, 'Exam 2', 85, 0.15,  'martinezl2'),
(21088, 'Homework', 43, 0.10,  'martinezl2'),
(21088, 'Exam 1', 99, 0.15,  'saeedf2'),
(21088, 'Exam 2', 85, 0.15,  'saeedf2'),
(21088, 'Homework', 43, 0.10,  'saeedf2'),
(21088, 'Exam 1', 89, 0.15,  'mangumx2'),
(21088, 'Exam 2', 82, 0.15,  'mangumx2'),
(21088, 'Homework', 73, 0.10,  'mangumx2');

CREATE TABLE announcement (
    crn INT NOT NULL,
    instructor VARCHAR(20),
    message TEXT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (crn) REFERENCES class(crn),
    FOREIGN KEY (instructor) REFERENCES class(instructor),
    PRIMARY KEY (crn, date)
);

INSERT INTO announcement (crn, instructor, message) VALUES(21088, "changy", "This is a test of the announcment table");

/* CREATE VIEW menu AS SELECT name FROM register INNER JOIN class ON class.crn=register.crn; */

DELIMITER //
CREATE PROCEDURE gradebook(IN crn INT)
BEGIN
SET @sql=NULL;

SELECT
  GROUP_CONCAT(DISTINCT
    CONCAT(
      'ifnull(SUM(case when assignment = ''',
      assignment,
      ''' then grade end),0) AS `',
      assignment, '`'
    )
  ) INTO @sql
FROM
  grades;
SET @sql = CONCAT('SELECT student as Student, ', @sql, ' 
                  FROM grades WHERE crn=', crn, '
                   GROUP BY student');

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END //
DELIMITER ;

CALL gradebook('21088');

CREATE VIEW menu AS SELECT crn, name, instructor AS user FROM class UNION SELECT * FROM register;

