create table SCHOOL(
    school_name 		varchar(255)	NOT NULL,
    head_of_school		varchar(10)		NOT NULL,
    constraint school_name		primary key (school_name)
);

create table DEPARTMENT(
	school_name			varchar(255)	NOT NULL,
    department_name		varchar(255)	NOT NULL,
    department_director	varchar(50)		NOT NULL,
    constraint department_id 	primary key (department_name),
    constraint fk1_school_name	foreign key(school_name)
								references SCHOOL(school_name)
);

create table PROFESSOR(
    department_name		varchar(255)		NOT NULL,
	email_name			varchar(50)		NOT NULL,
    full_name			varchar(50) 	NOT NULL,
    constraint pf_professor				primary	key (email_name),
	constraint fk2_work_in_department 	foreign key(department_name)
										references DEPARTMENT(department_name)
);

create table COURSE(
    coordinator			varchar(50)		NOT NULL,
	department_name		varchar(255)	NOT NULL,
	course_code			varchar(10)		NOT NULL,
    course_name			varchar(255) 	NOT NULL,
    constraint course_code		 	primary key(course_code),
    constraint fk1_offer_by_dept	foreign key(department_name)
									references DEPARTMENT(department_name),
	constraint fk2_coordinator		foreign key(coordinator)
									references PROFESSOR(email_name)
);

create table SUBJECTS(
	school_name			varchar(255)	NOT NULL,
    department_name		varchar(255)	NOT NULL,
    coordinator			varchar(50) 	NOT NULL,
    subject_code		varchar(10)		NOT NULL,
    subject_name		varchar(255)	NOT NULL,
    constraint subject_code 			primary key (subject_code),
    constraint fk1_subject_coordinator	foreign key(coordinator)
										references PROFESSOR(email_name),
	constraint fk2_offer_by_school 		foreign key(school_name)
										references SCHOOL(school_name),
	constraint fk3_belong_department	foreign key(department_name)
										references DEPARTMENT(department_name)
);

create table STUDENT(
	student_id			int(10)			NOT NULL,
    full_name			varchar(255)	NOT NULL,
    constraint pk_student primary key (student_id)
);

create table COURSE_ENROLMENT(
	course_code			varchar(10)		NOT NULL,
    student_id			int(10)			NOT NULL,
    constraint pk_course_enrolment 	primary key(course_code, student_id),
    constraint fk1_course			foreign key(course_code)
									references COURSE(course_code),
	constraint fk2_student			foreign key(student_id)
									references STUDENT(student_id)
);

create table SUBJECT_ENROLMENT(
	subject_code		varchar(10)		NOT NULL,
    student_id			int(10)			NOT NULL,
    enrolment_number	int(10)			NOT NULL,
    study_session		varchar(10)		NOT NULL,
    constraint pk_subject_enrolment primary key(subject_code, student_id, enrolment_number),
	constraint fk1_subject_enrol	foreign key(subject_code)
									references SUBJECTS(subject_code),
	constraint fk2_student_enrol	foreign key(student_id)
									references STUDENT(student_id),
);

