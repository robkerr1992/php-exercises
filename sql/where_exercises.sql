SELECT * FROM employees WHERE first_name IN ('Irena', 'Vidya', 'Maya');
SELECT * FROM employees WHERE last_name LIKE 'E%';
SELECT * FROM employees WHERE hire_date LIKE '199%';
SELECT * FROM employees WHERE birth_date LIKE '%%%%-12-25';
SELECT * FROM employees WHERE last_name LIKE '%q%';
SELECT * FROM employees WHERE first_name IN ('Irena') OR first_name IN ('Vidya') OR first_name IN ('Maya');
SELECT * FROM employees WHERE (first_name IN ('Irena') OR first_name IN ('Vidya') OR first_name IN ('Maya')) AND gender IN ('M');
SELECT * FROM employees WHERE last_name LIKE ('E%') OR last_name LIKE ('%E');
SELECT * FROM employees WHERE last_name LIKE ('E%') AND last_name LIKE ('%E');
SELECT * FROM employees WHERE hire_date LIKE '199%' AND birth_date LIKE '%%%%-12-25';
SELECT * FROM employees WHERE last_name LIKE '%q%' AND last_name NOT LIKE '%qu%';

