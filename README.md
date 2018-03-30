# CBC
This is where we will be submitting all of our work for the CBC project

How to use the new MVC structure
--------------------------------
- If the code is displaying something that the end-user sees (primarily HTML and CSS)
  - If the code is standardized and used in many places
    - It's a view partial
  - Else
    - It's a view
  
- If the code does the business logic or accesses objects (primarily PHP)
  - If the code is standardized and used in many places
    - It's a controller partial
  - Else
    - It's a controller
  
- If the code is an object that relates to the database (primarily PHP objects/classes)
  - It's a model
