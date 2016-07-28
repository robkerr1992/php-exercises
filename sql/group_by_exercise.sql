SELECT DISTINCT title FROM titles;
SELECT DISTINCT title FROM titles ORDER BY title;
SELECT DISTINCT first_name, last_name FROM employees WHERE last_name LIKE ('e%e');
SELECT * FROM employees WHERE (last_name LIKE ('E%') AND last_name LIKE ('%E')) GROUP BY first_name;
SELECT * FROM employees WHERE last_name LIKE '%q%' AND last_name NOT LIKE '%qu%' GROUP BY last_name;