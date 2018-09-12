Hasiera Core
============

About Hasiera
-------------

Hasiera is a Family Resources Manager, its goal is to help families with the daily life.

The main features are:

- A featureful task manager that includes user assignment, priorities, completion indicators...
- An economy planner that helps to see the family budget.
  - It includes a powerful `csv` importer to allow to feed bank data into the system.
  - It integrates seamlessly with the task manager.
  - And more...
- A student course planner allowing an easy management of:
  - Time schedules also with an integration into the task manaager,
  - Class diaries,
  - And subjects by allowing to create and tweak strategies for time planning.
- A home automation manager, because a family needs a home.
  - Supports many message queuing and bus/automation protocols.
  - Allows to define energy management policies and selects automatically or manually which one to 
  choose depending on energy consumption and/or energy bills.
  - And lots more...
- A powerful user management system allowing use either in small families or in collectivities like schools.

The Core
--------

### #1. Goals:

The goals of the core component is to provide the infrastructure to create the other components such as
interaction between them, request dispatching, automatic loading of components, and alike features.

### #2. Roadmap:

#### Version 0.1.0

- Component loading, this is a major point: to allow loading of any Hasiera component, a composer
plugin will be made and will register components.
- Request dispatching, this will allow to just call `Hasiera::init()` static method and start everything.

`TO BE CONTINUED`