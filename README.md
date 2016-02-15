[Go to WEB version](http://druid.esy.es)

Given tables:
===============
★ tasks (id, name, status, project_id)

★ projects (id, name)

Write the queries for:
-----------------------

1. get all statuses, not repeating, alphabetically ordered

    ```sql
    SELECT DISTINCT status
    FROM task
    ORDER BY status ASC;
    ```

2. get the count of all tasks in each project, order by tasks count descending

    ```sql
    SELECT DISTINCT project_id, count(id) AS projecsCount
    FROM task
    GROUP BY project_id
    ORDER BY projecsCount DESC;
    ```

3. get the count of all tasks in each project, order by projects names

    ```sql
    SELECT project.name, count(task.id)
    FROM project
    LEFT JOIN task ON project_id = project.id
    GROUP BY project_id
    ORDER BY project.name;
    ```

4. get the tasks for all projects having the name beginning with “N” letter

    ```sql
    SELECT *
    FROM task
    WHERE name LIKE 'N%';
    ```

5. get the list of all projects containing the ‘a’ letter in the middle of the name, and
show the tasks count near each project. Mention that there can exist projects without
tasks and tasks with project_id=NULL

    ```sql
    SELECT project.name, count(task.id)
    FROM project LEFT JOIN task ON task.project_id = project.id
    WHERE project.name LIKE '%a%'
    GROUP BY project_id;
    ```

6. get the list of tasks with duplicate names. Order alphabetically

    ```sql
    SELECT name
    FROM task
    GROUP BY name
    HAVING count(name)>1
    ORDER BY name ASC;
    ```

7. get the list of tasks having several exact matches of both name and status, from
the project ‘Garage’. Order by matches count

    ```sql
    SELECT name, count(name) AS mathces
    FROM task
    WHERE task.project_id = (SELECT project.id FROM project WHERE project.name LIKE 'Garage')
    GROUP BY task.name, task.status
    HAVING count(*) > 1
    ORDER BY mathces ASC;
    ```

8. get the list of project names having more than 10 tasks in status ‘completed’. Order
by project_id

    ```sql
    SELECT project.id, project.name, count(project_id) AS countoftasks
    FROM project
    LEFT JOIN task ON task.project_id = project.id
      WHERE task.status = 'completed'
    GROUP BY project_id
    HAVING countoftasks > 10
    ```