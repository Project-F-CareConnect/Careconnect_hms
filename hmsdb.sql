

CREATE TABLE `Patient` (
    `patient_id` int AUTO_INCREMENT NOT NULL,
    `name` varchar(50) NOT NULL,
    `address` varchar(55) NOT NULL,
    `age` int(3) NOT NULL,
    `gender` ENUM('Female', 'Male', 'Other'),
    `admission_date` date ,
    `mobile_number` bigint(15) NOT NULL,
    `disease_id` int(10) NOT NULL,
    `doctor_id` int(10) NOT NULL,
    `room_id` int(10),
    PRIMARY KEY (`patient_id`)
);



INSERT INTO `Patient` (`name`, `address`, `age`, `gender`, `admission_date`, `mobile_number`, `disease_id`, `doctor_id`, `room_id`) VALUES
('Aakash KC', 'Butwal', 34, 'Male', '2023-07-06','9860565656', '10001', '9000', '103'),
('Sankalpa Tamrakar', 'Damauli', 55, 'Male','2023-07-23', '9870787878', '10002', '9004', '107'),
('Pramila Dhami', 'Baglung', 22, 'Female', '2023-07-26','9867675454', '10003', '9004', '103'),
('Ashwin Adhikari', 'Beni', 21, 'Male', '2023-07-16','9856544343', '10004', '9005', '101'),
('Rajan Gupta', 'Syangja', 23, 'Male', '2023-07-09','9867543434', '10005', '9000', '103'),
('Bibash Poudel', 'Lekhnath', 43, 'Male', '2023-07-29','9876668778', '10006', '9007', '102'),
('Ram Krishna Sharma', 'Chitwan', 56, 'Male', '2023-07-05', '9826436938', '10007', '9006', '107'),
('Bidhya Dhungana', 'Rajahar', 22, 'Female', '2023-06-06','986718772', '10008', '9000', '103'),
('Ali Khan', 'Pokhara', 32, 'Male', '2023-07-16','9865534329','10009', '9002','101'),
('Bhim Sharki', 'Bhairahawa', 12, 'Male', '2023-06-26','9876564332', '10010', '9006', '107');


CREATE TABLE `disease` (
    `disease_id` int AUTO_INCREMENT NOT NULL ,
    `disease_name` varchar(50)  NOT NULL ,
    `category` varchar(50)  NOT NULL ,
    PRIMARY KEY (
        `disease_id`
    )
);

ALTER TABLE `disease` AUTO_INCREMENT = 10000;




INSERT INTO `disease` (`disease_name`, `category`) VALUES
('Fever', 'General Physician'),
('Typhoid', 'Infectious Disease Specialist'),
('Dengue', 'Infectious Disease Specialist'),
('Burns', 'General Surgeon'),
('Kidney Stone', 'Urology'),
('Hand Fracture', 'General Surgeon'),
('Migraine', 'Neurology'),
('Blood Cancer', 'Oncology'),
('Syphilis', 'Sexual Health Specialist'),
('Head Injury', 'Neurology'),
('Cardiomyopathy', 'Cardiology'),
('AIDS', 'Sexual Health Specialist'),
('Breast Cancer', 'Oncology'),
('Hernias', 'General Physician');




CREATE TABLE `doctor` (
    `doctor_id` int AUTO_INCREMENT NOT NULL ,
    `name` varchar(50)  NOT NULL ,
    `specialization` varchar(55)  NOT NULL ,
    `phone_no` bigint(15)  NOT NULL ,
    PRIMARY KEY (
        `doctor_id`
    )
);

ALTER TABLE `doctor` AUTO_INCREMENT = 9000;


INSERT INTO `doctor` (`name`, `specialization`, `phone_no`) VALUES
('Kushal Sharma', 'General Physician', '9800000001'),
('Anukul Raute', 'Cardiology', '9811111111'),
('Amit Khanal', 'Dermatology', '9822222222'),
('Amrit Giri', 'Infectious Disease Specialist', '9833333333'),
('Kiran Subedi', 'General Surgeon', '9844444444'),
('Binayak Kuinkel', 'Sexual Health Specialist', '9855555555'),
('Mandakini Sapkota', 'Oncology', '9866666666'),
('Nishanta Chapagain', 'Urology', '9877777777'),
('Ankit Sapkota', 'Dermatology', '9888888888'),
('Monika Karki', 'Neurology', '9899999999');




CREATE TABLE `nurse` (
    `nurse_id` int AUTO_INCREMENT NOT NULL ,
    `name` varchar(50)  NOT NULL ,
    `phone_no` bigint(15)  NOT NULL ,
    `room_id` int(10)  NOT NULL ,
    PRIMARY KEY (`nurse_id`)
);

ALTER TABLE `nurse` AUTO_INCREMENT = 7000;



INSERT INTO `nurse` (`name`, `phone_no`, `room_id`) VALUES
('Anjali Neupane', 9876543210, 100),
('Bhuniya Tharu', 9876543211, 101),
('Akshata Maharjan', 9876543212, 102),
('Anisha Kharel', 9876543213, 103),
('Jayanti Thakur', 9876543214, 104),
('Barsha KC', 9876543215, 105),
('Nisha Ghimire', 9876543216, 106),
('Shanti Thapa', 9876543217, 107),
('Pragati Basnet', 9876543218, 108),
('Alija Bhujel', 9876543219, 109),
('Manjushree Sapkota', 9876555555, 110);




CREATE TABLE `ward_boys` (
    `wardboys_id` int AUTO_INCREMENT NOT NULL ,
    `name` varchar(50)  NOT NULL ,
    `phone_no` bigint(15)  NOT NULL ,
    `room_id` int(10)  NOT NULL ,
    PRIMARY KEY (
        `wardboys_id`
    )
);

ALTER TABLE `ward_boys` AUTO_INCREMENT = 8000;



INSERT INTO `ward_boys` (`name`, `phone_no`, `room_id`) VALUES
('Prabin Tiwari', 9876543201, 100),
('Kishan Sharma', 9876543202, 101),
('Arjun Sangroula', 9876543203, 102),
('Babu Pashwan', 9876543204, 103),
('Ankit Subedi', 9876543205, 104),
('Ankit Regmi', 9876543206, 105),
('Tshering Lepchan', 9876543207, 106),
('Aangitoba Limbu', 9876543208, 107),
('Lal Bahadur Bishwokarma', 9876543209, 108),
('Hary Dulal', 9876543210, 109);



CREATE TABLE `bill` (
    `bill_id` int AUTO_INCREMENT NOT NULL ,
    `billing_date` date  NOT NULL ,
    `patient_id` int  NOT NULL ,
    `Total_amount` int(10)  NOT NULL ,
    PRIMARY KEY (
        `bill_id`
    )
);


INSERT INTO `bill` (`billing_date`, `patient_id`, `Total_amount`) VALUES
('2023-08-05', 1, 2500),
('2023-08-05', 2, 3500),
('2023-08-05', 3, 4500),
('2023-08-05', 4, 5500),
('2023-08-05', 5, 6500);


CREATE TABLE `room` (
    `room_id` int AUTO_INCREMENT NOT NULL ,
    `type` varchar(20)  NOT NULL ,
    `capacity` int(2)  NOT NULL ,
    `charge_per_day` int  NOT NULL ,
    `nurse_id` int  NOT NULL ,
    `wardboys_id` int(10)  NOT NULL ,
    PRIMARY KEY (
        `room_id`
    )
);

ALTER TABLE `room` AUTO_INCREMENT = 100;

INSERT INTO `room` (`type`, `capacity`, `charge_per_day`, `nurse_id`, `wardboys_id`) VALUES
('ICU', 2, 5000, 7000, 8000),
('Emergency', 5, 4000, 7001, 8001),
('OT', 1, 2000, 7002, 8002),
('General', 6, 3000, 7003, 8003),
('ICU', 1, 5500, 7004, 8004),
('Emergency', 4, 4500, 7005, 8005),
('OT', 1, 2500, 7006, 8006),
('General', 8, 3500, 7007, 8007),
('Emergency', 5, 4000, 7009, 8008),
('OT', 1, 2000, 7010, 8009);



ALTER TABLE `Patient` ADD CONSTRAINT `fk_Patient_disease_id` FOREIGN KEY(`disease_id`)
REFERENCES `disease` (`disease_id`);

ALTER TABLE `Patient` ADD CONSTRAINT `fk_Patient_doctor_id` FOREIGN KEY(`doctor_id`)
REFERENCES `doctor` (`doctor_id`);

ALTER TABLE `Patient` ADD CONSTRAINT `fk_Patient_room_id` FOREIGN KEY(`room_id`)
REFERENCES `room` (`room_id`);

ALTER TABLE `bill` ADD CONSTRAINT `fk_bill_patient_id` FOREIGN KEY(`patient_id`)
REFERENCES `Patient` (`patient_id`);

ALTER TABLE `room` ADD CONSTRAINT `fk_room_nurse_id` FOREIGN KEY(`nurse_id`)
REFERENCES `nurse` (`nurse_id`);

ALTER TABLE `room` ADD CONSTRAINT `fk_room_wardboy_id` FOREIGN KEY(`wardboys_id`)
REFERENCES `ward_boys` (`wardboys_id`);



CREATE TABLE `logintb` (
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ;


INSERT INTO `logintb` (`username`, `password`) VALUES
('admin', 'admin123');










