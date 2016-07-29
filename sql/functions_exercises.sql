SELECT COUNT(*) FROM employees WHERE (first_name IN ('Irena') OR first_name IN ('Vidya') OR first_name IN ('Maya')) AND gender IN ('M') ORDER BY first_name ASC;
SELECT COUNT(*) FROM employees WHERE (first_name IN ('Irena') OR first_name IN ('Vidya') OR first_name IN ('Maya')) AND gender IN ('F') ORDER BY first_name ASC;
SELECT CONCAT(first_name, ' ', last_name) as 'full_name' FROM employees WHERE last_name LIKE ('e%e');
SELECT DATEDIFF(hire_date, CURDATE()) as 'days_working_at_company' FROM employees WHERE hire_date LIKE ('199%') AND birth_date LIKE ('%%%%-12-25') ORDER BY birth_date DESC, hire_date ASC;
SELECT CONCAT(first_name,' ' ,last_name) as full_name, count(*) FROM employees WHERE last_name LIKE '%q%' AND last_name NOT LIKE '%qu%' GROUP BY full_name;



SELECT CONCAT(emp_no, ' - ', last_name,', ', first_name) AS full_name, birth_date AS DOB FROM employees LIMIT 10;



SELECT CONCAT(first_name, ' ', last_name) AS full_name, departments.dept_name
FROM employees
JOIN dept_emp
 ON dept_emp.emp_no = employees.emp_no
JOIN departments
 ON departments.dept_no = dept_emp.dept_no
WHERE departments.dept_no = 'd009';

-- 8.10.2 JOINING TABLES -----------------

SELECT departments.dept_name AS 'Department', CONCAT(first_name, ' ', last_name) as 'Department Manager'
FROM employees
JOIN dept_manager
 ON dept_manager.emp_no = employees.emp_no
JOIN departments
 ON departments.dept_no = dept_manager.dept_no
WHERE dept_manager.to_date LIKE '9999%';


SELECT departments.dept_name AS 'Department', CONCAT(first_name, ' ', last_name) as 'Department Manager'
FROM employees
JOIN dept_manager
 ON dept_manager.emp_no = employees.emp_no
JOIN departments
 ON departments.dept_no = dept_manager.dept_no
WHERE dept_manager.to_date LIKE '9999%' AND employees.gender = 'F';

SELECT title, count(*)
FROM titles
JOIN dept_emp
 ON dept_emp.emp_no = titles.emp_no AND dept_emp.to_date LIKE '9999%' AND titles.to_date LIKE '9999%'
WHERE dept_emp.dept_no = 'd009'
GROUP BY title;

SELECT CONCAT(first_name, ' ', last_name) as full_name, salary
FROM employees
JOIN dept_manager
 ON dept_manager.emp_no = employees.emp_no
JOIN salaries
 ON salaries.emp_no = dept_manager.emp_no
WHERE dept_manager.to_date LIKE '9999%' and salaries.to_date LIKE '9999%';

SELECT
  d.dept_name as 'Department Name',
  concat(e.first_name, ' ', e.last_name) as 'Name',
  s.salary as 'Salary'
FROM departments d
  JOIN dept_manager dm ON dm.dept_no = d.dept_no
  JOIN employees e ON e.emp_no = dm.emp_no
  JOIN salaries s ON s.emp_no = e.emp_no
WHERE s.to_date = '9999-01-01' AND dm.to_date = '9999-01-01';


SELECT CONCAT(e.first_name, ' ', e.last_name) AS 'Employee name', d.dept_name AS 'Department Name', CONCAT(ne.first_name, ' ', ne.last_name) AS 'Manager Name'
FROM employees e
  JOIN dept_emp de ON de.emp_no = e.emp_no
  JOIN departments d ON d.dept_no = de.dept_no
  JOIN dept_manager dm ON dm.dept_no = d.dept_no AND dm.to_date > CURDATE()
  JOIN employees ne ON ne.emp_no = dm.emp_no
WHERE de.to_date > CURDATE();


SELECT dept_name as 'Department',
((SELECT count(*)
  FROM dept_emp de
    JOIN departments d
      ON de.dept_no = d.dept_no AND de.to_date = '9999-01-01'
      WHERE d.dept_name = dept.dept_name)
      /
 (SELECT count(*)
  FROM employees e
    JOIN dept_emp de ON e.emp_no = de.emp_no AND de.to_date = '9999-01-01')) * 100 as 'employee percentage'
FROM departments dept;




