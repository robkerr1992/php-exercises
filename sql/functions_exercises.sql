SELECT COUNT(*) FROM employees WHERE (first_name IN ('Irena') OR first_name IN ('Vidya') OR first_name IN ('Maya')) AND gender IN ('M') ORDER BY first_name ASC;
SELECT COUNT(*) FROM employees WHERE (first_name IN ('Irena') OR first_name IN ('Vidya') OR first_name IN ('Maya')) AND gender IN ('F') ORDER BY first_name ASC;
SELECT CONCAT(first_name, ' ', last_name) as 'full_name' FROM employees WHERE last_name LIKE ('e%e');
SELECT DATEDIFF(hire_date, CURDATE()) as 'days_working_at_company' FROM employees WHERE hire_date LIKE ('199%') AND birth_date LIKE ('%%%%-12-25') ORDER BY birth_date DESC, hire_date ASC;
SELECT CONCAT(first_name,' ' ,last_name) as full_name, count(*) FROM employees WHERE last_name LIKE '%q%' AND last_name NOT LIKE '%qu%' GROUP BY full_name;



