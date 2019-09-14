alter table SCHOOL 
drop foreign key fk1_head_of_school;

alter table DEPARTMENT 
drop foreign key fk2_director;

drop table SUBJECT_ENROLMENT;
drop table COURSE_ENROLMENT;
drop table SUBJECTS;
drop table STUDENT;
drop table COURSE;
drop table PROFESSOR;
drop table DEPARTMENT;
drop table SCHOOL;

