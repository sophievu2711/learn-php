INSERT INTO PROFESSOR VALUES(
	'Department of Computer Science',
    'an007',
    'Anne Nealon' 
);

INSERT INTO PROFESSOR VALUES(
	'Department of Telecommunication',
    'tm379',
    'Tim Mcdonald'
);

INSERT INTO PROFESSOR VALUES(
	'Department of Telecommunication',
	'km365',
    'Katina Micheal'
);

INSERT INTO PROFESSOR VALUES(
	'Department of Information Technology',
    'ag874',
    'Aditya Ghose'	
);

INSERT INTO PROFESSOR VALUES(
	'Department of Computer Science',
	'jy847',
    'Jun Yan'
);

INSERT INTO PROFESSOR VALUES(
	'Department of Electrical',
	'js938',
    'Jun Shen'
);

INSERT INTO PROFESSOR VALUES(
	'Department of Computer',
	'mf497',
    'Mark Freeman'
);

INSERT INTO PROFESSOR VALUES(
	'Department of Information Systems',
	'ip288',
    'Ian Piper'
);

alter table SCHOOL 		add constraint fk1_head_of_school 
						foreign key (head_of_school)
						references PROFESSOR(email_name);
                    
alter table DEPARTMENT 	add constraint fk2_director
						foreign key (department_director)
						references PROFESSOR(email_name);