Notes:

Laravel, VueJS, PostgreSQL

Task summary
- Create public git repo
- Note any included laravel ecosystem packages needed for frontend and backend
- Create Routes, Models and Migrations
- Create Controllers that the routes would point to
    - dont implement actual logic
- Create simple frontend using VueJS,
    - styling unimportant,
    - view needs to call routes correctly
- Create README.md describing process

Background
- Distributors places order
    - check stock levels before adding to checkout
- 10 staff members
    - Sales
    - Staff
    - mobile_type ( Android, iPhone )
- Coordinate shipping activities (emails, Excel documents, Trello board)
- No internal development team

Request

bespoke web-based platform to manage
- orders
- fulfilment
- shipping
- customer service requests

Spec

- Citruse - South African-based fruit shipping business ( oranges, lemons, limes)
- DB tables

- business ( Mauritius, Mozambique, Tanzania)
  - id
  - business_type (producer, distributor)
  - business_name
  - registered_address
  - country
  - vat_number
  - primary_sales_contact_id -> contact
  - primary_logistics_contact_id -> contact
    - stock
        - id
        - product_code
        - description
        - quantity
    - stock_price
        - id
        - stock_id
        - year
        - price
    - contact
        - id
        - name
        - email
        - telephone
    - users
        - id
        - username
        - password
        - role_id
    - roles
        - id
        - name ( admin, manager, sales )
        - description ( System Administrator, Purchasing Manager, Field Sales Associate)
    - orders
        - id
        - type ( POS, POD )
        - supplier_id
        - distributor_id
        - shipping_date
        - status (New, Accepted by Supplier, In Delivery, Delivered, Rejected by Supplier, Rejected by Distributor, Cancelled)
    -  order_details
        - id
        - order_id
        - stock_id
        - quantity
        - cost

- Purchase order workflow
    - Start
    - Distributor contacts their Purchasing Manager
        - A New Purchase Order from Distributor is raised
            - Purchase Order from Distributor document created
                - A Purchase Order from Supplier document created and delivery scheduled --------***
        - Purchasing Manager contacts the Field Sales Associate to confirm requirements
            - supplier can deliver?
                - yes
                    - A Purchase Order from Supplier document created and delivery scheduled ----***
                - No
                    - Field Sales Associate informs the Purchasing Manager and rejects the Purchase Order from Distributor

- CRUD (Suppliers, Distributors )
- Supplier Purchase Order
- Distributros Purchase Order
- Report
    - Distributors Purchase Order due ( 6 Months )
        - get PO by shipping_date between now and 6 Month for orders of status not complete
    - Suppliers Purchase order history
        - get all purchase orders by supplier id
    - Forcast demand target/stock
        - get list of order details where
            - fields (stock.name, sum(order_details.quantity) > stock.quantity)
            - orders are not complete status
- System Administrator
    - A backoffice user that is able to view and manage all aspects of the system
- Single role assignment per user
- Purchasing Manager
    - CRUD - Purchase Orders - Distributor
    - CRUD - Purchase Orders - Suppliers
- Field Sales Associate
    - R - Purchase Orders - Distributor
    - R - Purchase Orders - Suppliers
- Product list
    - ex-vat price per/kg set once a year
    - possible reminder once a year to set
    - list titles
        - Product Code	Description	2023 R/kg 2024 R/kg 2025 R/kg
- Purchase order
    - prefix with POS- or POD- based on type
    - add supplier or distributor details to order
    - product list
        - one line per product
        - product code
        - quantity measured in kg
        - delivery date
        - Total Rand value ex VAT

1. Database Design
   Draw up a database design to capture all of the information outlined in the requirements. Include tables for all entities (including Users), and define the relationships between them. This can be done as either:
    - A simple text file with table names, field names and types
    - A spreadsheet with table names, field names and types
    - A DDL export
    - Visualized in UML, or as a classic ERD

It’s preferable to use PostgreSQL's syntax for field types. When designing this database, bear in mind that it will be modified over time as the application evolves. Include your design documents in your repository.

2. Application Design
   The Laravel application will consist of Models, Views and Controllers. Create a new Laravel application, and within that, create the following:
    - Controllers to manage the information in this system
        * Within each controller, stub out the methods you’d add - just write the method names and brief comments on what you expect them to do
    - Models that are based on your database design
        * Include Eloquent relations and declare $fillable properties
        * If your model needs additional methods to implement business logic, stub those methods out.
    - View folders and files
        * Use whichever frontend scaffolding method you prefer
        * Build out the necessary components using HTML and VueJS
        * Include at least one frontend with a form, a local "ref" variable, and an axios call to a backend API
    - A Routes file with the CRUD endpoints you’ll need
        * These endpoints will need to respond to HTTP requests
        * The methods they call can simply return static responses, with brief comments about what would have happened with a real request