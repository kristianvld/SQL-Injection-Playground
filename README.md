# SQL-Injection-Playground
A simple sql-injection playground using docker, mysql, apache, and mysql.

To get started simply clone the repo and run:

    docker-compose up -d
(Remove the -d flag if you don't want to start in detach mode and monitor the consoles.)

Then simply connect to http://localhost:8001/ to get started.

There are two ports exposed with the containers:
**8001**: This is the default web port.
**3306**: This is the mysql port.

By default, both the web and the sql port is open, so you can easily connect to the MySQL server and have a look around on how that works in the backend, what data is stored and explore further on how your injections are working and so on.

**Warning:** It is recommended that you have a go and try getting into the services before looking to much at the backend SQL data. Some of the challenges are based upon not knowing the layout of the backend database.

If you want to host this for another group of people, e.g. a mini-hackaton or crash-course on SQL Injections, then it is recommended to block the SQL port for obvious to keep the game more fun.
