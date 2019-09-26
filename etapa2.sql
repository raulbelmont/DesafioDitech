SELECT d.dept_name AS Departamento, CONCAT(e.first_name," ", e.last_name) AS NomeCompleto,
datediff( de.to_date, de.from_date) AS DiasTrabalhados
FROM departments AS d, employees AS e, dept_manager AS de
WHERE e.emp_no = de.emp_no AND d.dept_no = de.dept_no ORDER BY de.from_date - de.to_date LIMIT 10;
