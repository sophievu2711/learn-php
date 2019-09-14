/*---a) Name of departments of every school----*/
SELECT department_name, school_name
FROM DEPARTMENT
ORDER BY school_name;
/*---a) Name of departments of school "Computing and Information Technology"----*/
SELECT SCHOOL.school_name, SCHOOL.head_of_school as Head_of_school, 
		DEPARTMENT.department_name, DEPARTMENT.department_director as Department_director
FROM DEPARTMENT
JOIN SCHOOL ON SCHOOL.school_name = DEPARTMENT.school_name
WHERE DEPARTMENT.school_name= "Computing and Information Technology";

/*---b) Name of students of a course----*/
SELECT COURSE_ENROLMENT.course_code, COURSE.course_name, STUDENT.full_name, STUDENT.student_id
FROM COURSE_ENROLMENT
JOIN STUDENT
ON  COURSE_ENROLMENT.student_id = STUDENT.student_id
JOIN COURSE 
ON COURSE.course_code = COURSE_ENROLMENT.course_code;

/*---c) Name of professors of a specific school----*/
SELECT PROFESSOR.full_name, PROFESSOR.department_name, DEPARTMENT.school_name
FROM PROFESSOR
JOIN DEPARTMENT 
ON PROFESSOR.department_name = DEPARTMENT.department_name
ORDER BY DEPARTMENT.school_name;

/*---d) Number of students in each course----*/
SELECT COURSE.course_name, COURSE_ENROLMENT.course_code, COUNT(DISTINCT(COURSE_ENROLMENT.student_id)) as number_of_students
FROM COURSE
RIGHT JOIN COURSE_ENROLMENT 
ON COURSE.course_code = COURSE_ENROLMENT.course_code
group by COURSE_ENROLMENT.course_code;
 
 /*----e) Number of professors in each school -------*/
SELECT DEPARTMENT.school_name, count(PROFESSOR.full_name)
FROM PROFESSOR
JOIN DEPARTMENT 
ON PROFESSOR.department_name = DEPARTMENT.department_name
GROUP BY DEPARTMENT.school_name;

 /*----f) The name of students who have class with a specific professor. -------*/
SELECT STUDENT.full_name as student_name, SUBJECTS.subject_code, SUBJECTS.subject_name
FROM SUBJECT_ENROLMENT
JOIN STUDENT ON STUDENT.student_id = SUBJECT_ENROLMENT.student_id
JOIN SUBJECTS ON SUBJECTS.subject_code = SUBJECT_ENROLMENT.subject_code
WHERE SUBJECT_ENROLMENT.subject_code = (SELECT SUBJECTS.subject_code 
										FROM SUBJECTS
                                        WHERE SUBJECTS.coordinator = (SELECT PROFESSOR.email_name
																		FROM PROFESSOR
																		WHERE PROFESSOR.full_name = 'Mark Sifer'));
														
/* g) The number of students having enrolled in the classes offered by each school. 
	Note that, for instance, if one student has enrolled in three classes, he/she should be counted three times. */
SELECT SUBJECTS.subject_code, SUBJECTS.school_name, COUNT(SUBJECT_ENROLMENT.student_id)
FROM SUBJECT_ENROLMENT
JOIN SUBJECTS ON SUBJECTS.subject_code = SUBJECT_ENROLMENT.subject_code
GROUP BY SUBJECT_ENROLMENT.subject_code, SUBJECTS.school_name;


