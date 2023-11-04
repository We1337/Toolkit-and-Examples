-- Table: student_marks
-- Description: This table stores information about students, including their names, group, faculty, class, and marks for 16 weeks.

-- Table Structure:
CREATE TABLE student_marks (
    student_id INT AUTO_INCREMENT PRIMARY KEY, -- Unique identifier for each student's record
    student_full_name VARCHAR(50) NOT NULL, -- Full name of the student, should not be empty
    student_group VARCHAR(20) DEFAULT NULL, -- Student's group (optional, can be null)
    student_faculty VARCHAR(30) DEFAULT NULL, -- Student's faculty (optional, can be null)
    student_subject VARCHAR(100) DEFAULT NULL, -- Subject for which the student's marks are recorded (optional, can be null)

    -- Weekly marks from week1 to week16
    week1 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 1 marks, default to 0
    week1_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 1

    week2 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 2 marks, default to 0
    week2_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 2

    week3 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 3 marks, default to 0
    week3_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 3

    week4 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 4 marks, default to 0
    week4_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 4

    week5 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 5 marks, default to 0
    week5_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 5

    week6 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 6 marks, default to 0
    week6_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 6

    week7 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 7 marks, default to 0
    week7_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 7

    week8 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 8 marks, default to 0
    week8_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 8

    week9 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 9 marks, default to 0
    week9_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 9

    week10 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 10 marks, default to 0
    week10_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 10

    week11 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 11 marks, default to 0
    week11_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 11

    week12 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 12 marks, default to 0
    week12_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 12

    week13 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 13 marks, default to 0
    week13_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 13

    week14 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 14 marks, default to 0
    week14_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 14

    week15 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 15 marks, default to 0
    week15_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 15

    week16 VARCHAR(10) NOT NULL DEFAULT '0', -- Week 16 marks, default to 0
    week16_status ENUM('absent', 'present', 'ill', 'reason') NOT NULL DEFAULT 'absent', -- Status for week 16

    results VARCHAR(10) NOT NULL DEFAULT '0' -- Overall results or grade for the student, should not be empty
) CHARACTER SET utf8 COLLATE utf8_general_ci;


-- Inserting data for a single student
INSERT INTO student_marks (
    student_full_name,
    student_group,
    student_faculty,
    student_subject,
    week1,
    week1_status,
    week2,
    week2_status,
    week3,
    week3_status,
    week4,
    week4_status,
    week5,
    week5_status,
    week6,
    week6_status,
    week7,
    week7_status,
    week8,
    week8_status,
    week9,
    week9_status,
    week10,
    week10_status,
    week11,
    week11_status,
    week12,
    week12_status,
    week13,
    week13_status,
    week14,
    week14_status,
    week15,
    week15_status,
    week16,
    week16_status,
    results
) VALUES (
    'John Doe',           -- Full name of the student
    'Group A',            -- Student's group
    'Engineering',        -- Student's faculty
    'Mathematics',        -- Subject for which the student's marks are recorded
    '90',                 -- Week 1 marks
    'present',            -- Status for week 1
    '85',                 -- Week 2 marks
    'present',            -- Status for week 2
    '92',                 -- Week 3 marks
    'present',            -- Status for week 3
    '88',                 -- Week 4 marks
    'present',            -- Status for week 4
    '89',                 -- Week 5 marks
    'present',            -- Status for week 5
    '91',                 -- Week 6 marks
    'present',            -- Status for week 6
    '87',                 -- Week 7 marks
    'present',            -- Status for week 7
    '86',                 -- Week 8 marks
    'present',            -- Status for week 8
    '90',                 -- Week 9 marks
    'present',            -- Status for week 9
    '88',                 -- Week 10 marks
    'present',            -- Status for week 10
    '92',                 -- Week 11 marks
    'present',            -- Status for week 11
    '89',                 -- Week 12 marks
    'present',            -- Status for week 12
    '91',                 -- Week 13 marks
    'present',            -- Status for week 13
    '85',                 -- Week 14 marks
    'present',            -- Status for week 14
    '86',                 -- Week 15 marks
    'present',            -- Status for week 15
    '90',                 -- Week 16 marks
    'present',            -- Status for week 16
    'A'                   -- Overall results or grade for the student
);
